<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\CreateReview;

class ReviewController extends Controller
{
    public function showCreateForm(Request $request)
    {
        $name = request('folder_name');
        $id = request('folder_id');
        return view('review.create', compact('name', 'id'));
    }
    public function ConfirmationForm()
    {
        return view('review/confirm');
    }
    public function create(CreateReview $request)
    {
        
        //$contact = [
        //    ["name", $request->input('name')],
        //    ["mail", $request->input('mail')],
        //    ["gender", $request->input('gender')],
        //    ["select", $request->input('select')],
        //    ["stars", $request->input('stars')],
            
        //];
        //$contacts = $request->session()->get('name', 'gender', 'select', 'mail', 'stars');
        //$name = $request->session()->get('name');
        //$gender = $request->session()->get('gender');
        //$select = $request->session()->get('select');
        //$mail = $request->session()->get('mail');
        //$stars = $request->session()->get('stars');
        //$request->session()->put('name', 'name');
        //$request->session()->put('gender', 'gender');
        //$request->session()->put('select', 'select');
        //$request->session()->put('mail', 'mail');
        //$request->session()->put('stars', 'stars');
        $contacts = $request->all();
        return view('review.confirm',compact('contacts'));
    }
    public function complete(Request $request)
    {
        $review = new Review();
        $review->shop_id = $request->shop_id;
        $review->name = $request->name;
        $review->gender = $request->gender;
        $review->select = $request->select;
        $review->mail = $request->mail;
        $review->permission = $request->permission;
        $review->stars = $request->stars;
        $review->opinion = $request->opinion;
        $review->save();

        return view('review.complete');
    }
}