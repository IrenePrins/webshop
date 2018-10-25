<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\User;

class SearchController extends Controller
{
    public function search(Request $request){

        $messages = [
            'min' => 'The :attribute must be minimal :min characters long',
            'required' => 'The :attribute is required'
        ];

        $request->validate([
            'search' => 'required|min:3'
        ]);

        $search = $request->input('search');

        $results = DB::table('products')
                ->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->get();

        return view('search')->with('results', $results);
        
    }

    public function filter(Request $request){
        $categories = DB::table('categories')->get();

        return view('filter')->with('categories', $categories);
    }
}
