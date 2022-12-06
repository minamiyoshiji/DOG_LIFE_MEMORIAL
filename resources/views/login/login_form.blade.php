<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ログインフォーム</title>
  <script src="{{ asset('build/assets/app.737b6a57.js') }}" defer>
  </script>
  <link href="{{ asset('build/assets/app.525f5899.css') }}" rel="stylesheet">
  <!-- <link href="{{ asset('css/signin.css') }}" rel="stylesheet"> -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
</head>
<body>

  <main>
    <!-- class="form-signin w-100 m-auto"> -->

    @include("include.header")
    <div class="helo vh-100 d-flex align-items-center" id="home">
      <div class="sum container">
        <div class="row">
          <div class="mx-autu text-center">
            <div class="container mt-5 text-bg-light p-3">

            <form method="post" action="{{ route('login') }}">
              @csrf
              <h1 class="h3 mb-3 fw-normal">ログイン</h1>
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif

              @if (session('login_error'))
              <div class="alert alert-danger">
                {{ session('login_error') }}
              </div>
              @endif


              <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">メールアドレス</label>
              </div>
              <div class="form-floating mt-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">パスワード</label>
              </div>

              <button class="mt-3 btn btn-lg btn-primary" type="submit">ログイン</button>
              <a href="/signup" class="btn btn-lg btn-primary mt-3">新規登録</a>

            </form>
          </div>

          </div>
        </div>

      </div>

    </div>

  </main>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
</body>
</html>
