<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>愛犬計算画面</title>
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
    <div class="helo vh-100 d-flex align-items-center" id="home">
      <div class="sum container">
        <div class="row">
          <div class="mx-autu text-center">
            <h2 class="display-4"></h2>
            <a href="{{ $twitter_url }}" class="btn btn-primary mt-3">twitterに投稿</a>
            <form action="{{ route('show_dog_album') }}" method="post">
              @csrf
              <input type="hidden" name="dog_id" value="{{ $dog_id }}">
              <button type="submit" class="btn btn-primary mt-5">アルバムへ</button><br>
            </form>

          </div>
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" class="btn mt-5" value="ログアウト">
          </form>

        </div>

      </div>

    </div>


  </main>

</body>
</html>
