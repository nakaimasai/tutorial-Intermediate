@extends('layout')

@section('content')
<h1>詳細</h1>
<table>
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
<a href="{{ route('home') }}" class="btn btn-primary">
                一覧へ戻る
</a>
<form action="{{ route('destroy', ['id'=>$detail->id]) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">削除</button>
</form>
@endsection