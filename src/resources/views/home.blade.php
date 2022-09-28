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
                    <h2 class="text-5xl">{{ Auth::user()->name }}のレビュー管理画面</h2>
                    <form action="{{ route('home') }}" method="post">
                        @csrf
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                            
                                @auth
                                @if (Auth::user()->id === 100)

                                <div class="form-group">
                                <label>店舗：</label>
                                <select class="form-select form-select-lg mb-3" aria-label="form-select form-select-lg mb-3" name="shop">
                                    <option value="1" @if( old('shop') === '1' ) selected @endif>イタリアン広島</option>
                                    <option value="2" @if( old('shop') === '2' ) selected @endif>フレンチ山口</option>
                                    <option value="3" @if( old('shop') === '3' ) selected @endif>レストラン岡山</option>
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
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1" {{ old('gender') === '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio">男性</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2" {{ old('gender') === '2' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio">女性</label>
                                    </div>  
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="3" {{ old('gender') === '3' ? 'checked' : '' }} checked>
                                        <label class="form-check-label" for="radio">すべて</label>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label>メール送信可否：</label>
                                    <div class="form-check form-check-inline">                
                                        <input class="form-check-input" type="radio" name="permission" id="inlineRadio1" value="1" {{ old('permission') === '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio">許可のみ</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="permission" id="inlineRadio2" value="2" {{ old('permission') === '2' ? 'checked' : '' }} checked>
                                        <label class="form-check-label" for="radio">全て</label>
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
                                <button type="submit" class="bg-blue-300 hover:bg-blue-400 text-white rounded px-4 py-2">検索</button>
                                <input type="reset" name="reset" class="bg-red-600 hover:bg-red-500 text-white rounded px-4 py-2" value="リセット" >
                                </div>
                                </div>
                            </form>
                            <div class="form-group">
                            <table width="800" class="border-width: 2px;">
                            @if (!$items->isEmpty())
                            <tbody>
                                <tr>
                                    <th>名前</th>
                                    <th>性別</th>
                                    <th>年代</th>
                                    <th>評価</th>
                                    <th>意見</th>
                                </tr>
                            </tbody> 
                                @foreach ($items as $item)
                            <tfoot>
                                <tr>
                                    <th>{{$item->name}}</th>
                                    <th>{{$item->gender}}</th>
                                    <th>{{$item->select}}</th>
                                    <th>{{$item->stars}}</th>
                                    <th>{{$item->opinion}}</th>
                                    <th><a href="{{ route('detail', ['id'=>$item->id]) }}" class="btn btn-primary">詳細</a></th>
                                </tr>
                            <tfoot>
                                @endforeach
                                <h4>合計件数：{{ $items->total() }}件中{{ $items->firstItem() }}~{{ $items->lastItem() }} {{ $items->links() }}</h4>
                                @else
                                <h4>検索条件に合致するレビューがありません
                            @endif
                            </table>
                            </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection