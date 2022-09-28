@extends('layout')

@section('content')
<input type="hidden" name="id" value="{{ $detail->id }}"
<div class="flex items-center justify-center p-12">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="mx-auto w-full max-w-[550px]">
<h1>詳細</h1>

<table>
    <tr>
        <th>ID</th>
        <th>{{ $detail->id }}</th>
    </tr>
    <tr>
        <th>名前</th>
        <th>{{ $detail->name }}</th>
    </tr>
    <tr>
        <th>性別</th>
        <th>{{ $detail->gender }}</th>
    </tr>
    <tr>
        <th>年代</th>
        <th>{{ $detail->select }}</th>
    </tr>
    <tr>
        <th>メールアドレス</th>
        <th>{{ $detail->mail }}</th>
    </tr>
    <tr>
        <th>メール送信可否</th>
        <th>{{ $detail->permission }}</th>
    </tr>
    <tr>
        <th>評価</th>
        <th>{{ $detail->stars }}</th>
    </tr>
    <tr>
        <th>意見</th>
        <th>{{ $detail->opinion }}</th>
    </tr>
    <tr>
        <th>登録日</th>
        <th>{{ $detail->created_at }}</th>
    </tr>
</table>
<div class="flex flex-reverse">
<a href="{{ route('home') }}" class="bg-blue-300 hover:bg-blue-400 text-white rounded px-4 py-2 ml-10">
                一覧へ戻る
</a>
<form action="{{ route('destroy', ['id'=>$detail->id]) }}" method="POST">
    @csrf
    <button type="submit" class="bg-blue-300 hover:bg-blue-400 text-white rounded px-4 py-2 ml-10">削除</button>
</form>
</div>
</div>
</div>
@endsection