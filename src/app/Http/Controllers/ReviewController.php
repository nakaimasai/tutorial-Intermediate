<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\CreateReview;

class ReviewController extends Controller
{
    public function showCreateForm()
    {
        return view('review/create');
    }
    public function ConfirmationForm()
    {
        return view('review/confirm');
    }
    public function create(CreateReview $request)
    {
        // フォルダモデルのインスタンスを作成する
        //$review = new Review();
        // タイトルに入力値を代入する
        //$review->name = $request->name;
        //$review->gender = $request->gender;
        //$review->select = $request->select;
        //$review->mail = $request->mail;
        // インスタンスの状態をデータベースに書き込む
        //$review->save();
        //ここを確認画面へのパスを設定すればいいかも
        //$name = $request->name;
        //$input_data = [
        //    'name' => $name,
        //];
        //return redirect()->route('review.confirm', $input_data);
        $contact = $request->all();
        return view('review.confirm',compact('contact'));
    }
}
