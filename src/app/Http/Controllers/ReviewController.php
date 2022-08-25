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
        
        //$contact = [
        //    ["name", $request->input('name')],
        //    ["mail", $request->input('mail')],
        //    ["gender", $request->input('gender')],
        //    ["select", $request->input('select')],
        //    ["stars", $request->input('stars')],
            
        //];
        $contacts = $request->all();
        return view('review.confirm',compact('contacts'));
    }
}