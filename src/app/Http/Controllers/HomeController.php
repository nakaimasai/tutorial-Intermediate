<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;

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
        $items = Review::get();
        return view('home', compact('items'));
    }

    public function search(Request $request)
    {
        $name = $request->input('name');
        $gender = $request->input('gender');
        if(!empty($gender == 1))
        {
            $all = Review::where('gender', '男性');
        }elseif(!empty($gender == 2))
        {
            $all = Review::where('gender', '女性');
        }elseif(!empty($gender == 3))
        {
            $all = Review::where('gender', '男性')
                                ->orwhere('gender', '女性');
        }


        $select = $request->input('select');
        if(!empty($select == 1)) {
            $all = Review::where('select', "10代");
        }elseif(!empty($select == 2))
        {
            $all = Review::where('select', "20代");
        }elseif(!empty($select == 3))
        {
            $selectall = Review::where('select', "30代");
        }elseif(!empty($select == 4))
        {
            $all = Review::where('select', "40代");
        }elseif(!empty($select == 5))
        {
            $selectall = Review::where('select', "50代");
        }elseif(!empty($select == 6))
        {
            $all = Review::where('select', "60代");
        }elseif(!empty($select == 7))
        {
            $all = Review::where('select', "20代")
                                ->orwhere('select', "30代")
                                ->orwhere('select', "40代")
                                ->orwhere('select', "50代")
                                ->orwhere('select', "60代");
        }


        $due_date = $request->input('due_date');
        $end_date = $request->input('end_date');
        if(!empty($due_date) && !empty($end_date)) {
            $all = Review::whereBetween('created_at', [$due_date, $end_date]);
        }
        //else if(empty($dateall)){
        //    $all = "Not Found";
        //}


        $keyword = $request->input('keyword');
        if(!empty($keyword)) {
            $all = Review::where('opinion', 'LIKE', "%{$keyword}%");
        }
        $reviews = Review::get();

        //$all = $selectall + $genderall;

        $items = $all->get();

        return view('home', compact('items'));
    }

    public function detail($id)
    {
        $detail = Review::find($id);

        return view('detail', compact('detail'));
    }
}
