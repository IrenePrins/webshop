<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Search extends Model
{
    public function getSearchResults($search){

        $results = DB::table('products')
                ->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->get();

        return $results;
    }

    public function getFilterResults($filter){
        
        $results = DB::table('products')
                ->where('category', 'like', "%$filter%")
                ->get();

        return $results;
    }
}
