<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  <link rel="stylesheet" href="{{asset('/css/style.css')}}">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">ToDo App</a>
  </nav>
</header>
<main>
  <div class="container">
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">
          <div class="panel-heading">お店一覧</div>
          <div class="list-group">
            @foreach($folders as $folder)
            {{ $folder->title }}
            <img src="{{ asset('img/'. $folder->path) }}" alt="">
              <a href="{{ route('review.create', ['id' => $folder->id]) }}" class="list-group-item">
                レビューする
              </a>
            @endforeach
          </div>
        </nav>
      </div>
      <div class="column col-md-8">
        <!-- ここにタスクが表示される -->
      </div>
    </div>
  </div>
</main>
</body>
</html>