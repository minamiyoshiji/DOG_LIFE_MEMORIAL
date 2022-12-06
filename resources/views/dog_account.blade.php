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
    <div class="helo vh-100 d-flex align-items-center" id="home">
      <div class="container">
        <div class="row">
          <div class="mx-autu text-center">
            <h5 class="display-4">ようこそ！ {{ $dog_name }}ちゃん！</h5>
            <form action="{{ route('show_edit') }}" method="post">
              @csrf
              <input type="hidden" name="dog_id" value="{{ $dog_id }}">
              <button type="submit" class="btn btn-primary mt-5">名前・犬種の変更</button><br>
            </form>
            <form action="{{ route('show_calculation') }}" method="post">
              @csrf
              <input type="hidden" name="dog_id" value="{{ $dog_id }}">
              <button type="submit" class="btn btn-primary mt-5">食事量計算</button><br>
            </form>

            <form action="{{ route('show_dog_album') }}" method="post">
              @csrf
              <input type="hidden" name="dog_id" value="{{ $dog_id }}">
              <button type="submit" class="btn btn-primary mt-5">アルバムへ</button><br>
            </form>

            <!-- <a href="{{ route('show_dog_album') }}" class="btn btn-primary mt-5">アルバムへ</a> -->
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
