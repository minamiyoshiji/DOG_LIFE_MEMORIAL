<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ホーム画面</title>
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
      <div class="container">
        <div class="row">
          <div class="mx-autu text-center">
            <h2 class="display-3">Dog Life Memorial</h2>
            <h2 class="display-10">愛するワンちゃんの食事管理しながら</h2>
            <h2 class="display-10 mb-5">思い出に残してアルバムに</h2>
            <img src="img/top_sec04_img01.jpeg" class="rounded mx-auto d-block" alt="...">
            <a href="{{ route('login') }}" class="btn btn-primary mt-5">ログイン</a>
            <a href="{{ route('register') }}" class="btn btn-primary mt-5">新規登録</a>
            <a href="/experience" class="btn btn-primary mt-5">お試し計算</a>
          </div>
        </div>
        <a href="{{ route('admin_login') }}" class="btn text-right mt-5">管理者用ログイン</a>
      </div>

    </div>


  </main>

</body>
</html>
