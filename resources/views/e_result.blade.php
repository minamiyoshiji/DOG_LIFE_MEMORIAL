<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>お試し計算画面</title>
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
            <h2 class="display-4">計算結果</h2>
            <div class="container mt-5 text-bg-light p-3">
              <p>1日の食事量は</p>
              <p> {{ $amount }} gです。</p>
              <p>※ワンちゃんの体質、健康状態に応じて調整して下さい。</p>
            </div>
            <a href="{{ route('login') }}" class="btn btn-primary mt-5">ログイン</a>
            <a href="{{ route('register') }}" class="btn btn-primary mt-5">新規登録</a>

          </div>
        </div>

      </div>

    </div>


  </main>

</body>
</html>
