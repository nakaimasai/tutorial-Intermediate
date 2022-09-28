<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $all = DB::table('folders')  
        ->LeftJoin('reviews', 'folders.id', '=', 'reviews.shop_id')
        ->select('folders.id', 'folders.title', 'folders.path', 'folders.detail', DB::raw("truncate(avg(reviews.stars),1) as avg"))
        ->whereNull('reviews.shop_id')
        ->groupBy('folders.id');

        $folders = DB::table('folders')  
        ->Join('reviews', 'folders.id', '=', 'reviews.shop_id')
        ->select('folders.id', 'folders.title', 'folders.path', 'folders.detail', DB::raw("truncate(avg(reviews.stars),1) as avg"))
        ->groupBy('folders.id')
        ->union($all)
        ->get();

        return view('tasks/index', compact('folders'));
    }
}