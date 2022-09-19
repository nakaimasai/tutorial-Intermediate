<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $user_id = Auth::id();
        $shops = User::get();
        if($user_id == 100)
        {
            $items = Review::get();
        }else{
            $items = Review::where('shop_id', $user_id)->get();
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
        }elseif(!empty($select == 7))
        {
            $all = Review::where('select', "20代")
                                ->orwhere('select', "30代")
                                ->orwhere('select', "40代")
                                ->orwhere('select', "50代")
                                ->orwhere('select', "60代")
                                ->where('shop_id', $shop_id);
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
        }

        $items = $all->get();
        return view('home', compact('items', 'shops', 'shop_id'));




        }else //権限分け
        {
        $all = Review::where('shop_id', $user_id);
        $name = $request->input('name');

        $gender = $request->input('gender');
        if(!empty($gender == 1))
        {
            $all = Review::where('gender', '男性')
            ->where('shop_id', $user_id);
        }elseif(!empty($gender == 2))
        {
            $all = Review::where('gender', '女性')
            ->where('shop_id', $user_id);
        }elseif(!empty($gender == 3))
        {
            $all = Review::where('gender', '男性')
                                ->orwhere('gender', '女性')
                                ->where('shop_id', $user_id);
        }


        $select = $request->input('select');
        if(!empty($select == 1)) {
            $all = Review::where('select', "10代")
            ->where('shop_id', $user_id);
        }elseif(!empty($select == 2))
        {
            $all = Review::where('select', "20代")
            ->where('shop_id', $user_id);
        }elseif(!empty($select == 3))
        {
            $all = Review::where('select', "30代")
            ->where('shop_id', $user_id);
        }elseif(!empty($select == 4))
        {
            $all = Review::where('select', "40代")
            ->where('shop_id', $user_id);
        }elseif(!empty($select == 5))
        {
            $all = Review::where('select', "50代")
            ->where('shop_id', $user_id);
        }elseif(!empty($select == 6))
        {
            $all = Review::where('select', "60代")
            ->where('shop_id', $user_id);
        }elseif(!empty($select == 7))
        {
            $all = Review::where('select', "20代")
                                ->orwhere('select', "30代")
                                ->orwhere('select', "40代")
                                ->orwhere('select', "50代")
                                ->orwhere('select', "60代")
                                ->where('shop_id', $user_id);
        }


        $due_date = $request->input('due_date');
        $end_date = $request->input('end_date');
        if(!empty($due_date) && !empty($end_date)) {
            $all = Review::whereBetween('created_at', [$due_date, $end_date])
            ->where('shop_id', $user_id);
        }


        $keyword = $request->input('keyword');
        if(!empty($keyword)) {
            $all = Review::where('opinion', 'LIKE', "%{$keyword}%")
            ->where('shop_id', $user_id);
        }

        //$all = $selectall + $genderall;

        $items = $all->get();
        //$items = $all = Review::where('shop_id', $user_id)->get();
        return view('home', compact('items'));
       }
    }

    public function detail($id)
    {
        $detail = Review::find($id);

        return view('detail', compact('detail'));
    }
}
