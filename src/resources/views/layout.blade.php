<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  @yield('styles')
  <link rel="stylesheet" href="{{asset('/css/style.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <!-- ブルーテーマの追加スタイルシート -->
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header>
  <nav class="my-navbar">
    
    @if(Auth::check())
        <a class="my-navbar-brand" href="{{ route('home') }}">Review App</a>
          @csrf
      @else
        <a class="my-navbar-brand" href="{{ route('tasks.index') }}">Review App</a>
      @endif
    <div class="my-navbar-control">
      @if(Auth::check())
        <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      @else
        <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
      @endif
    </div>
  </nav>
</header>
<main>
  @yield('content')
</main>
@if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
@endif
@yield('scripts')
</body>
</html>