@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">
          <div class="panel-heading">お店一覧</div>
          <div class="list-group">
            @foreach($folders as $folder)
            {{ $folder->title }}
            <img src="{{ asset('img/'. $folder->path) }}" alt="">
              <form action="{{ route('review.create', ['id' => $folder->id]) }}" class="list-group-item">
              <input type="hidden" name="folder_name" value="{{ $folder->title }}">
              <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                <input type="submit" value="レビューする">
              </form>
            @endforeach
          </div>
        </nav>
      </div>
      <div class="column col-md-8">
        <!-- ここにタスクが表示される -->
      </div>
    </div>
  </div>
  @endsection