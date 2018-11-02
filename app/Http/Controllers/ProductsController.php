<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Support\Facades\DB;
use App\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Product $model)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->model = $model;
    }

    public function index()
    {
        // $products = Product::orderby('title', 'dsc')->paginate(10);
        $products = $this->model->getAllProducts();

        return view('products/index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
      
        //handle file upload
        if($request->hasFile('image')){
        //getfilename with extention
            $filenameWithExt = $request->file('image')->getClientOriginalName();
        //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
        //filename to store + timestamp -> original
            $filenameToStore = $filename. '_' .time(). '.' .$extension;
        //store in storage
            $path = $request->file('image')->storeAs('public/product_images', $filenameToStore);

        }else{
            $filenameToStore = 'noimage.jpg';
        };

        // data valid
        $product = new Product;
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->user_id = auth()->user()->id; 
        $product->image = $filenameToStore;
        $product->category = $request->input('category');
        $product->save();
        
        return redirect('/products')->with('success', 'New product created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show the products
        // $product = Product::find($id);
        $product = $this->model->showProduct($id);
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->model->showProduct($id);

        //check correct user
        if(auth()->user()->id !== $product->user_id){
            return redirect('/products')->with('error', 'Unauthorized page, no access');
        }
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, $id)
    {
        
        //handle file upload
        if($request->hasFile('image')){
            //getfilename with extention
                $filenameWithExt = $request->file('image')->getClientOriginalName();
            //get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
                $extension = $request->file('image')->getClientOriginalExtension();
            //filename to store + timestamp -> original
                $filenameToStore = $filename. '_' .time(). '.' .$extension;
            //store in storage
                $path = $request->file('image')->storeAs('public/product_images', $filenameToStore);
    
            }else{
                $filenameToStore = 'noimage.jpg';
            };

        //data valid
        $product = Product::find($id);
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->user_id = auth()->user()->id; 
        $product->image = $filenameToStore;
        $product->category = $request->input('category');
        $product->save();
        
        return redirect('/products')->with('success', 'Your product is updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->model->showProduct($id);

        if(auth()->user()->id !== $product->user_id){
            return redirect('/products');
        }

        $product->delete();

        return redirect('/products')->with('success', 'Your product is deleted!');
    }
}
