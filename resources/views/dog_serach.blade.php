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

            <table>
              @foreach($items as $item)
              <tr>
                <td>
                  <img src="{{ '/storage/' . $item->image }}" class="rounded mx-auto d-block" alt="...">
                </td>
                <td>
                  <div class="container mt-3 text-bg-light p-2">
                    <h5 class="koumoku">年齢</h5>
                    <p class="naiyou"> {{ $item->age }}歳</p>
                  </div>
                  <div class="container mt-3 text-bg-light p-2">
                    <h5 class="koumoku">体重</h5>
                    <p class="naiyou"> {{ $item->weight }}kg</p>
                  </div>
                  <div class="container mt-3 text-bg-light p-2">
                    <h5 class="koumoku">1日のご飯の量</h5>
                    <p class="naiyou"> {{ $item->food }}g</p>
                  </div>

                @endforeach
              </td>
            </tr>
          </table>

        </div>

      </div>

    </div>


  </main>

</body>
</html>
