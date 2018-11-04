<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\User;
use App\Search;

class SearchController extends Controller
{

    public function __construct(Search $model){
        $this->model = $model;

    }

    public function search(Request $request){

        //personalised messages for searchbar
        $messages = [
            'min' => 'The :attribute must be minimal :min characters long',
            'required' => 'The :attribute is required'
        ];

        //validate for required and minimal of 3 characters.
        $request->validate([
            'search' => 'required|min:3'
        ]);

        //get input
        $search = $request->input('search');

        //get search results
        $results = $this->model->getSearchResults($search);

        //return view with results
        return view('search')->with('results', $results);
        
    }

    public function filter(Request $request){
        //get filter input
        $filter = $request->input('filter');

        //get filter results
        $results = $this->model->getFilterResults($filter);
                
        //return view with filter results
        return view('filter')->with('results', $results);
    }
}
