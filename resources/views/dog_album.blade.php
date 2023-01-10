<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>愛犬アルバム画面</title>
  <script src="{{ asset('build/assets/app.737b6a57.js') }}" defer>
  </script>
  <link href="{{ asset('build/assets/app.525f5899.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
</head>
<body>
  <!-- <img src="img/aozora.jpeg" class="img-fluid" alt=""> -->

  <main>
    @include("include.header")

    <!-- helo section -->
    <div class="helo d-flex align-items-center" id="home">
      <div class="sum container">
        <div class="row">
          <div class="mx-autu text-center">
            <h2 class="display-5 mt-3">{{ $dog_name }}ちゃんのアルバム</h2>
            <div class="search">
                <form action="{{ route('dog_serach') }}" method="get">
                    @csrf

                    <div class="form-group">
                      <div>
                          <label for="">年齢
                          <div>
                              <input type="text" name="age" >
                          </div>
                          </label>
                      </div>

                      <div>
                          <label for="">体重
                          <div>
                              <input type="text" name="weight" >
                          </div>
                          </label>
                      </div>

                        <div>
                            <input type="submit" class="btn btn-primary mt-5 mb-5" value="検索">
                        </div>
                    </div>
                </form>
            </div>

            <table>
              @foreach($dog_dates as $dog_date)
              <tr>
                <td>
                  <img src="{{ '/storage/' . $dog_date->image }}" class="rounded mx-auto d-block" alt="...">
                </td>
                <td>
                  <div class="container mt-3 text-bg-light p-2">
                    <h5 class="koumoku">年齢</h5>
                    <p class="naiyou"> {{ $dog_date->age }}歳</p>
                  </div>
                  <div class="container mt-3 text-bg-light p-2">
                    <h5 class="koumoku">体重</h5>
                    <p class="naiyou"> {{ $dog_date->weight }}kg</p>
                  </div>
                  <div class="container mt-3 text-bg-light p-2">
                    <h5 class="koumoku">1日のご飯の量</h5>
                    <p class="naiyou"> {{ $dog_date->food }}g</p>
                  </div>
                  <form action="{{ route('twitter') }}" method="post">
                    @csrf
                    <input type="hidden" name="dog_name" value="{{ $dog_name }}">
                    <input type="hidden" name="dog_id" value="{{ $dog_id }}">
                    <input type="hidden" name="date_id" value="{{ $dog_date->id }}">
                    <input type="hidden" name="date_age" value="{{ $dog_date->age }}">
                    <input type="hidden" name="date_weight" value="{{ $dog_date->weight }}">
                    <input type="hidden" name="date_food" value="{{ $dog_date->food }}">

                    <button type="submit" id='twitter' class="btn btn-primary mt-3">twitterに投稿</button>
                  </form>

                  <!-- <a href="" class="btn btn-primary mt-3">twitterに投稿</a> -->
                  <form action="{{ route('dog_delete') }}" method="post">
                    @csrf
                    <input type="hidden" name="dog_id" value="{{ $dog_id }}">
                    <input type="hidden" name="date_id" value="{{ $dog_date->id }}">
                    <button type="submit" id='delete' class="btn btn-primary mt-3" onclick="return confirm('本当に削除しますか？')">削除</button>
                  </form>

                  <!-- <a id='delete' class="btn btn-primary mt-3" href="/delete?id={{$dog_date->id}}" onclick="return confirm('本当に削除しますか？')">削除</a> -->
                </div>
                @endforeach
              </td>
            </tr>
          </table>
          <form action="{{ route('show_dog_account') }}" method="post">
            @csrf
            <input type="hidden" name="dog_id" value="{{ $dog_id }}">
            <button type="submit" class="btn btn-primary mt-5 mb-5">愛犬アカウントへ</button><br>

          </div>


        </div>

      </div>

    </div>


  </main>

</body>
</html>
