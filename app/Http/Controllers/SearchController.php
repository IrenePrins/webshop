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

        $messages = [
            'min' => 'The :attribute must be minimal :min characters long',
            'required' => 'The :attribute is required'
        ];

        $request->validate([
            'search' => 'required|min:3'
        ]);

        $search = $request->input('search');

        $results = $this->model->getSearchResults($search);

        return view('search')->with('results', $results);
        
    }

    public function filter(Request $request){
        $filter = $request->input('filter');

        $results = $this->model->getFilterResults($filter);
                
        return view('filter')->with('results', $results);
    }
}
