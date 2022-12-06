<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>愛犬登録フォーム</title>
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
              <div class="card-body">
                <form method="POST" action="{{ route('dog_register') }}">
                  @csrf
                  <h1 class="h3 mb-3 fw-normal">愛犬登録</h1>
                  <div class="row mb-3">
                    <label for="dog_name" class="col-md-4 col-form-label text-md-end">{{ __('名前') }}</label>

                    <div class="col-md-6">
                      <input id="dog_name" type="text" class="form-control @error('name') is-invalid @enderror" name="dog_name" value="{{ old('dog_name') }}" required autocomplete="dog_name" autofocus>

                      @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="birth" class="col-md-4 col-form-label text-md-end">{{ __('誕生日') }}</label>

                    <div class="col-md-6">
                      <input id="birth" type="date" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{ old('birth') }}" required autocomplete="birth">

                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="breed" class="col-md-4 col-form-label text-md-end">{{ __('犬種') }}</label>

                    <div class="col-md-6">
                      <input id="breed" type="text" class="form-control" name="breed" required autocomplete="breed">
                    </div>
                  </div>

                  <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                        {{ __('登録') }}
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" class="btn mt-5" value="ログアウト">
          </form>

        </div>

      </div>

    </main>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
  </body>
  </html>
