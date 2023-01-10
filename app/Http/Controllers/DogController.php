<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Dog;
use App\Models\User;
use App\Models\Dog_date;



class DogController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function main() {

    $dogs = Dog::where('user_id', \Auth::user()->id)->get();

    return view('main', ['dogs' => $dogs]);
  }

  // 愛犬登録画面
  public function show_dog_register() {
    return view('dog_register');
  }

  // 愛犬アカウント画面
  public function show_dog_account(Request $request) {

    $dog_id = $request->input('dog_id');

    $dog_name = Dog::where('id', $dog_id)->value('dog_name');
    return view('dog_account',
    [
      'dog_name' => $dog_name,
      'dog_id' => $dog_id
    ]);
  }

  // 愛犬登録機能
  public function dog_register(Request $request) {

    $user_id = Auth::id();

    $dog = Dog::create(
      [
        'dog_name' => $request->input('dog_name'),
        'user_id' => $user_id,
        'birth' => $request->input('birth'),
        'breed' => $request->input('breed'),
      ]
    );

    $dogs = Dog::where('user_id', \Auth::user()->id)->get();

    return view('main', ['dogs' => $dogs]);
  }

  // 愛犬計算画面
  public function show_calculation(Request $request) {
    $dog_id = $request->input('dog_id');

    return view('calculation', ['dog_id' => $dog_id]);
  }

  public function calculation(Request $request)
  {


    // アップロードされたファイル名を取得
    $image = $request->file('image');

    // 画像がアップロードされていれば、storageに保存
    if($request->hasFile('image')) {
      $path = \Storage::put('/public', $image);
      $path = explode('/', $path);
    }else{
      $path = null;
    }

    $weight = $request->input('weight');
    $coeffcient = $request->input('coeffcient');
    $calorie = $request->input('calorie');
    $age = $request->input('age');

    $weight3 = pow($weight, 3);
    $sqrt_weight = sqrt($weight3);

    $BM = sqrt($sqrt_weight) * 70 * $coeffcient;

    $amount_n = $BM / $calorie * 100;

    $amount = round($amount_n, 1);


    // ファイル情報をDBに保存
    $Dog_date = new Dog_date();
    // $image->name = $file_name;
    // $image->dog_id = $dog_id;
    $Dog_date->image = $path[1];
    $Dog_date->weight = $weight;
    $Dog_date->coeffcient = $coeffcient;
    $Dog_date->calorie = $calorie;
    $Dog_date->age = $age;
    $Dog_date->food = $amount;
    $Dog_date->dog_id = $request->input('dog_id');
    $Dog_date->save();

    $dog_name = Dog::where('id', $Dog_date->dog_id)->value('dog_name');


    return view('dog_result',
    [
      'amount' => $amount,
      'dog_id' => $Dog_date->dog_id,
      'dog_name' => $dog_name
    ]);
  }

  //愛犬アルバム画面
  public function show_dog_album(Request $request) {
    $dog_id = $request->input('dog_id');
    $dog_name = Dog::where('id', $dog_id)->value('dog_name');
    $dog_breed = Dog::where('id', $dog_id)->value('breed');
    $dog_dates = Dog_date::where('dog_id', $dog_id)->get();

    return view('dog_album',
    [
      'dog_id' => $dog_id,
      'dog_name' => $dog_name,
      'dog_dates' => $dog_dates
      // 'twitter_url' => $twitter_url
    ]);
  }

  //検索機能
  public function dog_serach(Request $request)
      {
          //検索フォームに入力された値を取得
          $age = $request->input('age');
          $weight = $request->input('weight');

          $query = dog_date::query();

          if(!empty($age)) {
              $query->where('age', 'LIKE', $age);
          }

          if(!empty($weight)) {
              $query->where('weight', 'LIKE', $weight);
          }

          $items = $query->get();

          return view('dog_serach', compact('items'));
      }

  // デリート機能
  public function dog_delete(Request $request)
  {
    $Dog_date = new Dog_date();

    $id = $request->get('date_id');
    Dog_date::find($id)->delete();
    $dog_id = $request->get('dog_id');
    $dog_name = Dog::where('id', $dog_id)->value('dog_name');
    $dog_dates = Dog_date::where('dog_id', $dog_id)->get();


    return view('dog_album',
    [
      'dog_id' => $dog_id,
      'dog_name' => $dog_name,
      'dog_dates' => $dog_dates
    ]);

  }

  public function twitter(Request $request) {
    $id = $request->get('date_id');
    $dog_id = $request->get('dog_id');
    $dog_age = $request->get('date_age');
    $dog_weight = $request->get('date_weight');
    $dog_food = $request->get('date_food');

    $dog_name = $request->get('dog_name');
    $dog_breed = Dog::where('id', $dog_id)->value('breed');


    $aryTwitter = [];
    $aryTwitter['text'] = "$dog_name ちゃんは $dog_age 歳の $dog_weight  kgで　1日の食事量は $dog_food gです。";
    $aryTwitter['url'] = 'https://doglifememorial.com/';
    $aryTwitter['hashtags'] = "$dog_breed,食事管理"; //省略可

    $twitter_url = 'https://twitter.com/share?';
    $twitter_url .= implode('&', array_map(function($key, $value){return $key.'='.$value;}, array_keys($aryTwitter), array_values($aryTwitter)));

    return view('twitter',
    [
      'dog_id' => $dog_id,
      'dog_name' => $dog_name,
      'twitter_url' => $twitter_url
    ]);
  }

  public function show_edit(Request $request)
  {
    $dog_id = $request->get('dog_id');
    $dog = Dog::find($dog_id);

    return view('edit', compact('dog','dog_id'));
  }

  public function update(Request $request)
  {
    // xss対策
    $dog_id = $request->input('dog_id');
    $dog_name = htmlspecialchars($request->input('dog_name'), ENT_QUOTES, "UTF-8");
    $breed = htmlspecialchars($request->input('breed'), ENT_QUOTES, "UTF-8");
    $birth = htmlspecialchars($request->input('birth'), ENT_QUOTES, "UTF-8");
    $user_id = htmlspecialchars($request->input('user_id'), ENT_QUOTES, "UTF-8");
    $info = Dog::find($dog_id);
    $info->dog_name = $dog_name;
    $info->breed = $breed;
    $info->birth = $birth;
    $info->user_id = $user_id;
    $info->save();

    return view('dog_account', compact('dog_id', 'dog_name'));
  }



}
