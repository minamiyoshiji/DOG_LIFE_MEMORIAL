<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>メイン画面</title>
  <script src="{{ asset('build/assets/app.737b6a57.js') }}" defer>
  </script>
  <link href="{{ asset('build/assets/app.525f5899.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>


  <main>
    @include("include.header")

    <!-- helo section -->
    <div class="helo d-flex align-items-center" id="home">
      <div class="container">
        <div class="row">
          <div class="mx-autu text-center">
            <h2 class="display-4 mt-3">ようこそ！　{{ Auth::user()->name }}　さん！</h2>
            <img src="img/top_sec04_img01.jpeg" class="rounded mx-auto d-block" alt="...">
            <form action="{{ route('show_dog_account') }}" method="post">
              @csrf
              <select id='dog_id' name='dog_id' class="form-control mt-5 w-75 m-auto">
                @foreach($dogs as $dog)
                <option value='{{ $dog->id }}'>{{ $dog->dog_name }}ちゃん</option>
                @endforeach
              </select>

              <button type="submit" class="btn btn-primary mt-1">愛犬選択</button><br>
            </form>

            <a href="/dog_register" class="btn btn-primary mt-5">愛犬登録</a>
          </div>
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" class="btn mt-3" value="ログアウト">
          </form>

        </div>

      </div>

    </div>


  </main>

</body>
</html>
