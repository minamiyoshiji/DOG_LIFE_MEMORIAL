<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>管理者画面</title>
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
            <h2 class="display-4">　管理者画面　</h2>
            <table class="table text-bg-light">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">name</th>
                  <th scope="col">email</th>
                  <th scope="col">role</th>
                  <th scope="col"></th>

                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->role }}</td>
                  <td>
                    <form action="{{ route('delete') }}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $user->id }}">
                      <button type="submit" id='delete' class="btn btn-primary mt-3" onclick="return confirm('本当に削除しますか？')">削除</button>
                    </form>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>

          </div>
        </td>
      </tr>
    </table>
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
