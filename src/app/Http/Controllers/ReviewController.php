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
        $img = $request->file('path');
        if(!empty($img)){
            $path = $img->store('img','public');
        }
        else{
            $path = NULL;
        }
        
        $contacts = $request->all();
        //$path = $request->file('path')->store('img','public');
        return view('review.confirm',compact('contacts', 'path'));
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
        $review->path = $request->path;
        $review->save();

        return view('review.complete');
    }
}