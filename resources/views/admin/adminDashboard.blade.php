@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel">
                {{-- <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    <!--Ik wil hier eigenlijk wel de producten zien die je al hebt toegevoegd en
                        dan like 3 ofzo in een 3 rechthoeken naast elkaar-->  
                        You are logged in as admin 
                        <table class="table">
                            
                        </table>             
                </div> --}}
                @component('components.who')
                @endcomponent
                
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
