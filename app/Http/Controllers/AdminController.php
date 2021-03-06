<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Admin;
use App\Product;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Admin $model)
    {
        $this->middleware('auth:admin');
        $this->model = $model;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = DB::select('SELECT users.name, COUNT(products.user_id) AS numberOfProducts FROM products INNER JOIN users ON users.id = products.user_id GROUP BY products.user_id');
        $users = $this->model->getProductsPerUser();
        return view('admin.adminDashboard', ['users' => $users]);
    }
}
?>