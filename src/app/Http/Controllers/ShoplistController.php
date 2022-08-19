<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Moldes\Folder;

class ShoplistController extends Controller
{
    $folders = Folder::all();

        return view('lists/index', [
            'folders' => $folders,
        ]);
}
