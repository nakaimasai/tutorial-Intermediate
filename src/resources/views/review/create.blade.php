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
            <form action="{{ route('review.confirm') }}" method="post">
            @csrf
                <div class="form-group">
                    <label for="name">氏名：</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label>性別：</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="男"{{ is_array(old("gender")) && in_array("男", old("gender"), true)? ' checked' : '' }} id="flexCheckDefault" name="gender[]">
                        <label class="form-check-label" for="flexCheckDefault">
                            男
                        </label>
                        <input class="form-check-input" type="checkbox" value="女"{{ is_array(old("gender")) && in_array("女", old("gender"), true)? ' checked' : '' }} id="flexCheckChecked" name="gender[]">
                        <label class="form-check-label" for="flexCheckChecked">
                            女
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>年代：</label>
                    <select class="form-select form-select-lg mb-3" aria-label="form-select form-select-lg mb-3" name="select">
                        <option value="" hidden>選択してください</option>
                        <option value="1" @if( old('select') === '1' ) selected @endif>１０代</option>
                        <option value="2" @if( old('select') === '2' ) selected @endif>２０代</option>
                        <option value="3" @if( old('select') === '3' ) selected @endif>３０代</option>
                        <option value="4" @if( old('select') === '4' ) selected @endif>４０代</option>
                        <option value="5" @if( old('select') === '5' ) selected @endif>５０代</option>
                        <option value="6" @if( old('select') === '6' ) selected @endif>６０代</option>
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
                    <div class="form-check">
                        <label>メール送信可否：</label>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                            登録したメールアドレスにメールマガジンをお送りしてよろしいですか？
                        </label>
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
                    <input type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{ old('opinion') }}"></textarea>
                    </div>
                    <span class="btn btn-primary">
                        Choose File
                        <input type="file" style="display:none">
                    </span>
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