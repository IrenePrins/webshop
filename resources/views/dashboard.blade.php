@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <!--Ik wil hier eigenlijk wel de producten zien die je al hebt toegevoegd en
                        dan like 3 ofzo in een 3 rechthoeken naast elkaar-->   
                        <table class="table">
                            <tr>
                                <th>Your Products</th>
                                <th></th>
                                <th></th>   	
                            </tr>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->title}}</td>
                                <td>{{$product->description}}</td>
                                <td><a href="/products/{{$product->id}}/edit" class="btn btn-primary">Edit</a>
                                    {!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                            @endforeach
                        </table>             
                </div>
                
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">New Product</h5>
              <h6 class="card-subtitle mb-2 text-muted">Add new products</h6>
              <p class="card-text">Your new product has to have a title and a description.</p>
              <a href="/products/create" role="button" class="card-link btn btn-info">Create new product</a>
            </div>
          </div>
    </div>
</div>
@endsection
