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
    public function __construct(User $model)
    {
        $this->middleware('auth');
        $this->model = $model;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = $this->model->getUser($user_id);

        return view('dashboard')->with('products', $user->products);
    }

    /**
     * @param  int  $id
     */
    public function status($id)
    {
        $product = $this->model->getProduct($id);
        $product->status = !$product->status;
        $product->save();

        return redirect()->action('DashboardController@index');
    }
}
