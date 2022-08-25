@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">お問い合わせ内容確認</div>

                <div class="card-body">
                    <form action="{{ route('review.confirm') }}" method="post">
                        @csrf
                        <input type="hidden" name="name" value="{{ $contacts['name'] }}">
                        <div class="row">
                            <label for="email" class="col-md-3 text-md-right">氏名:</label>
                            <div class="col-md-9">
                                {{ $contacts['name'] }}
                            </div>
                        </div>
                        <div class="row">
                            <label for="contact" class="col-md-3 text-md-right">性別:</label>
                                <div class="col-md-9">
                                    {{ $contacts['gender'] }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="contact" class="col-md-3 text-md-right">年代:</label>
                                <div class="col-md-9">
                                    {{ $contacts['select'] }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="contact" class="col-md-3 text-md-right">メール:</label>
                                <div class="col-md-9">
                                    {{ $contacts['mail'] }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="contact" class="col-md-3 text-md-right">評価:</label>
                                <div class="col-md-9">
                                    {{ $contacts['stars'] }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-md-1 col-md-3">
                            <a href="{{ route('review.create') }}" class="btn btn-info">戻る</a> 
                        </div>

                        <div class="col-md-2 offset-md-6">
                            <button type="submit" class="btn btn-primary">
                                    送信
                            </button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection