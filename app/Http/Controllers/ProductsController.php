<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\CreateProductRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $products = Product::orderby('title', 'dsc')->paginate(10);
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
            //getfilename

        }else{
            $nofiletostore = 'noimage.jpg';
        }

        //IK MOET NOG FIXEN DAT HET TYPE IMAGE VERANDERD WORDT IN EEN STRING IPV EEN BLOB MET MIGRATIES WANT DAT IS BETER 

        // data valid
        $product = new Product;
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->user_id = auth()->user()->id; 
        $product->image = $request->input('image');
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
        //show all products
        $product = Product::find($id);
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
        $product = Product::find($id);

        //check correct user
        if(auth()->user()->id !== $post->user_id){
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
        //data valid en changed in db
        $product = Product::find($id);
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->user_id = auth()->user()->id; 
        $product->image = $request->input('image');
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
        $product = Product::find($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('/products');
        }

        $product->delete();

        return redirect('/products')->with('success', 'Your product is deleted!');
    }
}
