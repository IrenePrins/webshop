@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <h3 class="card-title">Your Products</h3>
                    <!--Ik wil hier eigenlijk wel de producten zien die je al hebt toegevoegd en
                        dan like 3 ofzo in een 3 rechthoeken naast elkaar-->    
                        <p class="card-text">text </p>               
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
