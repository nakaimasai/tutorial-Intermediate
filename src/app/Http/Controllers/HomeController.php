<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection; 
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $paginate = [
		'limit' => 3 // 1ページに表示するデータ件数
	];
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Review::get(['id']);
        $user_id = Auth::id();
        $shops = User::get();
        if($user_id == 100)
        {
            $items = Review::Paginate(5);
        }else{
            $items = Review::where('shop_id', $user_id)->Paginate(5);
        }
        
        //$items = Review::get();
        return view('home', compact('items', 'shops'));
        
    }

    public function search(Request $request)
    {
        $user_id = Auth::id();
        $shops = User::get();
        if($user_id == 100)
        {
            $shop_id = $request->input('shop');
            /*
            $name = $request->input('name');
            $gender = $request->input('gender');
        if(!empty($gender == 1))
        {
            $all = Review::where('gender', "男性")
            ->where('shop_id', $shop_id);
        }elseif(!empty($gender == 2))
        {
            $all = Review::where('gender', "女性")
            ->where('shop_id', $shop_id);
        }elseif(!empty($gender == 3))
        {
            $all = Review::where('gender', "男性")
                                ->orwhere('gender', "女性")
                                ->where('shop_id', $shop_id);
        }


        $select = $request->input('select');
        if(!empty($select == 1)) {
            $all = Review::where('select', "10代")
            ->where('shop_id', $shop_id);
        }elseif(!empty($select == 2))
        {
            $all = Review::where('select', "20代")
            ->where('shop_id', $shop_id);
        }elseif(!empty($select == 3))
        {
            $all = Review::where('select', "30代")
            ->where('shop_id', $shop_id);
        }elseif(!empty($select == 4))
        {
            $all = Review::where('select', "40代")
            ->where('shop_id', $shop_id);
        }elseif(!empty($select == 5))
        {
            $all = Review::where('select', "50代")
            ->where('shop_id', $shop_id);
        }elseif(!empty($select == 6))
        {
            $all = Review::where('select', "60代")
            ->where('shop_id', $shop_id);
        }/*elseif(!empty($select == 7))
        {
            $all = Review::where('select', "20代")
                                ->where('shop_id', $user_id)
                                ->orwhere('select', "30代")
                                ->where('shop_id', $user_id)
                                ->orwhere('select', "40代")
                                ->where('shop_id', $user_id)
                                ->orwhere('select', "50代")
                                ->where('shop_id', $user_id)
                                ->orwhere('select', "60代")
                                ->where('shop_id', $user_id);
        }


        $due_date = $request->input('due_date');
        $end_date = $request->input('end_date');
        if(!empty($due_date) && !empty($end_date)) {
            $all = Review::whereBetween('created_at', [$due_date, $end_date])
            ->where('shop_id', $shop_id);
        }

        $keyword = $request->input('keyword');
        if(!empty($keyword)) {
            $all = Review::where('opinion', 'LIKE', "%{$keyword}%")
            ->where('shop_id', $shop_id);
        }*/
        $gender = $request->input('gender');
        if(!empty($gender == 1))
        {
            $g = ['男性'];
        }elseif(!empty($gender == 2))
        {
            $g = ['女性'];
        }elseif(!empty($gender == 3))
        {
            $g = ['女性', '男性'];
        }


        $select = $request->input('select');
        if(!empty($select == 1)) {
            $s = ['10代'];
        }elseif(!empty($select == 2))
        {
            $s = ['20代'];
        }elseif(!empty($select == 3))
        {
            $s = ['30代'];
        }elseif(!empty($select == 4))
        {
            $s = ['40代'];
        }elseif(!empty($select == 5))
        {
            $s = ['50代'];
        }elseif(!empty($select == 6))
        {
            $s = ['60代'];
        }elseif(!empty($select == 7))
        {
            $s = ['10代','20代','30代','40代','50代','60代'];
        }
        $due_date = $request->input('due_date');
        $end_date = $request->input('end_date');
        if(empty($due_date) && empty($end_date)) {
            $due_date = '2000-01-01';
            $end_date = '3000-01-01';
        }
        $permission = $request->input('permission');
        if(!empty($permission == 1)) {
            $p = ['許可'];
        }else{
            $p = ['許可', '拒否'];
        }
        $keyword = $request->input('keyword');
        if(!empty($keyword)) {
            $k = $keyword;
        }else{
            $k = '';
        }
        $keyword = $request->input('keyword');
        if(!empty($keyword)) {
            $all = Review::where('opinion', 'LIKE', "%{$keyword}%")
            ->where('shop_id', $user_id);
        }else{
            $all = Review::where('shop_id', $user_id);
        }
        $all = Review::whereIn('gender', $g)
        ->whereIn('select', $s)
        ->whereBetween('created_at', [$due_date, $end_date])
        ->whereIn('permission', $p)
        ->where('opinion', 'LIKE', "%{$k}%")
        ->where('shop_id', $shop_id);
        $items = $all->orderBy("id", "desc")->Paginate(5);

        return view('home', compact('items', 'shops', 'shop_id'));




        }else //権限分け
        {
        $all = Review::where('shop_id', $user_id);
        $name = $request->input('name');

        $all = Review::all();
        $gender = $request->input('gender');
        if(!empty($gender == 1))
        {
            $g = ['男性'];
        }elseif(!empty($gender == 2))
        {
            $g = ['女性'];
        }elseif(!empty($gender == 3))
        {
            $g = ['女性', '男性'];
        }


        $select = $request->input('select');
        if(!empty($select == 1)) {
            $s = ['10代'];
        }elseif(!empty($select == 2))
        {
            $s = ['20代'];
        }elseif(!empty($select == 3))
        {
            $s = ['30代'];
        }elseif(!empty($select == 4))
        {
            $s = ['40代'];
        }elseif(!empty($select == 5))
        {
            $s = ['50代'];
        }elseif(!empty($select == 6))
        {
            $s = ['60代'];
        }elseif(!empty($select == 7))
        {
            $s = ['10代','20代','30代','40代','50代','60代'];
        }
        $due_date = $request->input('due_date');
        $end_date = $request->input('end_date');
        if(empty($due_date) && empty($end_date)) {
            $due_date = '2000-01-01';
            $end_date = '3000-01-01';
        }
        $permission = $request->input('permission');
        if(!empty($permission == 1)) {
            $p = ['許可'];
        }else{
            $p = ['許可', '拒否'];
        }
        $keyword = $request->input('keyword');
        if(!empty($keyword)) {
            $k = $keyword;
        }else{
            $k = '';
        }
        $keyword = $request->input('keyword');
        if(!empty($keyword)) {
            $all = Review::where('opinion', 'LIKE', "%{$keyword}%")
            ->where('shop_id', $user_id);
        }else{
            $all = Review::where('shop_id', $user_id);
        }
        $all = Review::whereIn('gender', $g)
        ->whereIn('select', $s)
        ->whereBetween('created_at', [$due_date, $end_date])
        ->whereIn('permission', $p)
        ->where('opinion', 'LIKE', "%{$k}%")
        ->where('shop_id', $user_id);
        $items = $all->orderBy("id", "desc")->Paginate(5);
        return view('home', compact('items'));
       }
    }

    public function detail($id)
    {
        $detail = Review::find($id);

        return view('detail', compact('detail'));
    }
    public function destroy($id)
    {
        // Booksテーブルから指定のIDのレコード1件を取得
        $review = Review::find($id);
        // レコードを削除
        $review->delete();
        // 削除したら一覧画面にリダイレクト
        return view('destroy');
    }
}
