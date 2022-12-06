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
    <div class="helo d-flex align-items-center" id="home">
      <div class="sum container">
        <div class="row">
          <div class="mx-autu text-center">
            <h2 class="display-4">食事量計算</h2>
            <div class="container text-bg-light p-3">
              <h3>食事計算式</h3>
              <p>4√ (体重 x 体重 x 体重) x 70 x 活動係数 ＝ 1日の必要カロリー</p>
              <p>必要カロリー ÷ 100gあたりのカロリー x 100 ＝ 1日の食事量</p>
            </div>
            <form action="{{ route('calculation')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3 mt-2">
                <label for="weight" class="form-label">体重(kg)</label>
                <input type="weight" class="form-control" id="weight" name="weight">
              </div>
              <div class="mb-3">
                <label for="coeffcient" class="form-label">活動係数</label>
                <!-- <input type="coeffcient" class="form-control" id="coeffcient"> -->
                <select class="form-select" id="coeffcient" name="coeffcient" aria-label="Default select example">

                  <option selected>当てはまる項目を選んでください。</option>
                  <option value="3.0">生後4か月までの幼犬</option>
                  <option value="2.0">生後4か月から１年までの幼犬</option>
                  <option value="1.6">避妊・去勢済みの成犬</option>
                  <option value="1.8">避妊・去勢なしの成犬</option>
                  <option value="1.2">7歳以上で避妊・去勢済みの中高齢犬</option>
                  <option value="1.4">7歳以上で避妊・去勢なしの中高齢犬</option>
                  <option value="1.1">肥満傾向の成犬</option>

                </select>
              </div>

              <div class="mb-3">
                <label for="calorie" class="form-label">100gあたりのカロリー(kcol)</label>
                <input type="calorie" class="form-control" id="calorie" name="calorie">
              </div>

              <div class="mb-3 mt-2">
                <label for="age" class="form-label">年齢</label>
                <input type="age" class="form-control" id="age" name="age" placeholder="歳">
              </div>

              <div class="mb-3 mt-2">
              <input type="file" name="image" id="image">
              </div>

              <input type="hidden" name="dog_id" value="{{ $dog_id }}">

              <button type="submit" class="btn btn-primary mt-2">　計算　</button>

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
