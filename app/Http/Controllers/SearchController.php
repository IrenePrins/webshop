<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\User;

class SearchController extends Controller
{
    public function search(Request $request){

        $results = DB::table('products')
                ->where('title', 'like', '%$search%')
                ->get();

        return view('search')->with('results', $results);
    }
}
