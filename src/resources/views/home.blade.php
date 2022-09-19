@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>{{ Auth::user()->name }}のレビュー管理画面</h2>
                    <form action="{{ route('home') }}" method="post">
                        @csrf
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                            
                                @auth
                                @if (Auth::user()->id === 100)

                                <div class="form-group">
                                <label>年代：</label>
                                <select class="form-select form-select-lg mb-3" aria-label="form-select form-select-lg mb-3" name="shop">
                                    <option value="1">イタリアン広島</option>
                                    <option value="2">フレンチ山口</option>
                                    <option value="3">レストラン岡山</option>
                                </select>
                                </div>

                                {{--
                                <div class="form-group">
                                <select class="form-select form-select-lg mb-3" aria-label="form-select form-select-lg mb-3" name="shop">
                                @foreach ($shops as $shop)
                                <option value="{{$shop->id}}" ) selected>{{$shop->name}}</option>
                                @endforeach
                                </select>
                                </div>
                                --}}
                                @endif
                                @endauth
                                <div class="form-group">
                                <label>性別：</label>
                                    <div class="form-check form-check-inline">                
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="radio">男性</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2">
                                        <label class="form-check-label" for="radio">女性</label>
                                    </div>  
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="3" checked>
                                        <label class="form-check-label" for="radio">すべて</label>
                                    </div> 
                                </div>
                            <div class="form-group">
                                <label>年代：</label>
                                <select class="form-select form-select-lg mb-3" aria-label="form-select form-select-lg mb-3" name="select">
                                    <option value="7" hidden>すべて</option>
                                    <option value="1" @if( old('select') === '10代' ) selected @endif>１０代</option>
                                    <option value="2" @if( old('select') === '20代' ) selected @endif>２０代</option>
                                    <option value="3" @if( old('select') === '30代' ) selected @endif>３０代</option>
                                    <option value="4" @if( old('select') === '40代' ) selected @endif>４０代</option>
                                    <option value="5" @if( old('select') === '50代' ) selected @endif>５０代</option>
                                    <option value="6" @if( old('select') === '60代' ) selected @endif>６０代</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="due_date">期間</label>
                                <input type="date" class="form-control" name="due_date" id="due_date" value="{{ old('due_date') }}" >
                            </div>
                            <div class="form-group">
                                <label for="end_date">〜</label>
                                <input type="date" class="form-control" name="end_date" id="end_date" value="{{ old('end_date') }}" >
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">キーワード</label>
                                <input type="text" class="form-control" id="exampleFormControlTextarea1" name="keyword" value="{{ old('keyword') }}"></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                            <button type="submit" class="btn btn-primary">確認</button>
                            </div>
                            </div>
                        </form>

                        <table>
                        @if (!$items->isEmpty())
                            <tr>
                                <th>名前</th>
                                <th>性別</th>
                                <th>年代</th>
                                <th>評価</th>
                                <th>意見</th>
                            </tr>
                            @foreach ($items as $item)
                            <tr>
                                <th>{{$item->name}}</th>
                                <th>{{$item->gender}}</th>
                                <th>{{$item->select}}</th>
                                <th>{{$item->stars}}</th>
                                <th>{{$item->opinion}}</th>
                                <th><a href="{{ route('detail', ['id'=>$item->id]) }}" class="btn btn-primary">詳細</a></th>
                            </tr>
                            @endforeach
                            @else
                            <h4>検索条件に合致するレビューがありません
                        @endif
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection