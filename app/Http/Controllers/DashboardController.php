<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('dashboard')->with('products', $user->products);
    }

    /**
     * @param  int  $id
     */
    public function status($id)
    {
        $product = Product::find($id);
        $product->status = !$product->status;
        $product->save();
        return redirect()->action('DashboardController@index');
    }
}
