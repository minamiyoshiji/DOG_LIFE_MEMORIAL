<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>編集画面</title>
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
            <h2 class="display-4">名前・犬種の変更</h2>
            <form action="{{ route('update')}}" method="post">
              @csrf
              <div class="mb-3 mt-2">
                <label for="dog_name" class="form-label">名前</label>
                <input type="text" class="form-control" id="dog_name" name="dog_name" placeholder="{{ $dog->dog_name }}">
              </div>

              <div class="mb-3">
                <label for="breed" class="form-label">犬種</label>
                <input type="text" class="form-control" id="breed" name="breed" placeholder="{{ $dog->breed }}">
              </div>

              <input type="hidden" name="dog_id" value="{{ $dog_id }}">
              <input type="hidden" name="user_id" value="{{ $dog->user_id }}">
              <input type="hidden" name="birth" value="{{ $dog->birth }}">

              <button type="submit" class="btn btn-primary mt-2">　変更　</button>

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
