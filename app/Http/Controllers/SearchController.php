<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $title = 'Welcome to Laravel!';
        // return view('pages/index', compact('title'));
        return view('pages/index')->with('title', $title);
    }
}
