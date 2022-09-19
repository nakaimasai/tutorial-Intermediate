<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Review;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $all = Folder::all();
        $all = Review::select('shop_id')
         ->selectRaw('AVG(stars) as star')
         ->groupBy('shop_id');

         $folders = $all->get();
        return view('tasks/index', compact('folders'));
    }
}