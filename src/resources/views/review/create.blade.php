<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Review App</title>
  <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
  <header>
    <nav class="my-navbar">
      <a class="my-navbar-brand" href="/">Review App</a>
    </nav>
  </header>
  <main>
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
            <div class="panel-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            <form action="{{ route('review.confirm') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h4>{{$name}}へのご意見をお聞かせください</h4>
            <input type="hidden" name="shop_id" value="{{$id}}">
                <div class="form-group">
                    <label for="name">氏名：</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label>性別：</label>
                        <div class="form-check form-check-inline">                
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="男性">
                            <label class="form-check-label" for="radio">男性</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="女性">
                            <label class="form-check-label" for="radio">女性</label>
                        </div>  
                    </div>
                <div class="form-group">
                    <label>年代：</label>
                    <select class="form-select form-select-lg mb-3" aria-label="form-select form-select-lg mb-3" name="select">
                        <option value="" hidden>選択してください</option>
                        <option value="10代" @if( old('select') === '10代' ) selected @endif>１０代</option>
                        <option value="20代" @if( old('select') === '20代' ) selected @endif>２０代</option>
                        <option value="30代" @if( old('select') === '30代' ) selected @endif>３０代</option>
                        <option value="40代" @if( old('select') === '40代' ) selected @endif>４０代</option>
                        <option value="50代" @if( old('select') === '50代' ) selected @endif>５０代</option>
                        <option value="60代" @if( old('select') === '60代' ) selected @endif>６０代</option>
                    </select>
                </div>
                <div>
                    <div class="row">
                    <label for="colFormLabelLg" class="col-sm-2 col-form-label">メール</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="colFormLabel" name="mail">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>メール送信可否：</label>
                    <div class="form-check form-check-inline">                
                        <input class="form-check-input" type="radio" name="permission" id="inlineRadio1" value="許可">
                        <label class="form-check-label" for="radio">許可</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="permission" id="inlineRadio2" value="拒否" checked>
                        <label class="form-check-label" for="radio">拒否</label>
                    </div>  
                    </div>
                </div>
                <div class="form-group">
                    <label>評価：</label>
                    <select class="form-select form-select-lg mb-3" aria-label="form-select form-select-lg mb-3" name="stars">
                        <option value="" hidden>選択してください</option>
                        <option value="1">星１</option>
                        <option value="2">星２</option>
                        <option value="3">星３</option>
                        <option value="4">星４</option>
                        <option value="5">星５</option>
                    </select>
                </div>
                <div class="form-group">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">ご意見</label>
                    <input type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" name="opinion" value="{{ old('opinion') }}"></textarea>
                </div>
                <div>
                    <span class="btn btn-primary">
                        Choose File
                        <input type="file" name="path">
                    </span>
                </div>
                <div id="star">
                    <star-rating v-model="rating"></star-rating>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">確認</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </main>
</body>
</html>