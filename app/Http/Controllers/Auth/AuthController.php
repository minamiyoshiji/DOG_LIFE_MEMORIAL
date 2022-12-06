<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
  /**
  * @return View
  **/
  public function home() {
    return view('home');
  }

  /**
  * @return View
  **/
  public function experience() {
    return view('experience');
  }

  public function result(Request $request){
    $weight = $request->input('weight');
    $coeffcient = $request->input('coeffcient');
    $calorie = $request->input('calorie');
    $weight3 = pow($weight, 3);
    $sqrt_weight = sqrt($weight3);

    $BM = sqrt($sqrt_weight) * 70 * $coeffcient;

    $amount_n = $BM / $calorie * 100;

    $amount = round($amount_n, 1);

    return view('e_result', compact('amount'));

  }

  /**
  * @return View
  **/
  public function main() {
    return view('main');
  }

  public function logout(Request $request)
  {
      Auth::logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      return redirect('/');
  }

  /**
  * @return View
  **/
  public function admin_login() {
    return view('admin_login');
  }

  public function admin(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);


    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $users = User::all();

        return view('admin', compact('users'));
    }

    return back();

}

public function delete(Request $request)
{
  $user = new User();

  $id = $request->get('id');
  User::find($id)->delete();
  $users = User::all();


  return view('admin',  ['users' => $users]);

}

}
