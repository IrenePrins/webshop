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
        //call middleware method
        $this->middleware('auth');

        //model
        $this->model = $model;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //define user_id
        $user_id = auth()->user()->id;

        //get user send user_id with
        $user = $this->model->getUser($user_id);

        //return view with the products of the user
        return view('dashboard')->with('products', $user->products);
    }

    /**
     * @param  int  $id
     */
    public function status($id)
    {
        //get product
        $product = $this->model->getProduct($id);

        //change status
        $product->status = !$product->status;

        //save status
        $product->save();

        //return redirect to dashboardcontroller index method
        return redirect()->action('DashboardController@index');
    }
}
