@extends('layouts.app')


@section('content')

    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}
    <h3>Search result</h3>
    <p>Search result is {{ request()->input('search')}}</p>
    @if(count($results) > 0)
        @foreach($results as $result)
        <div class="card col-md-3">
                {{-- <img class="card-img-top" src="/storage/product_images/{{$result->image}}" alt="Image of the product"> --}}
                <div class="card-body">
                    <img style='width : 100%'src="/storage/product_images/{{$result->image}}"/>
                    <h5 class="card-title">{{$result->title}}</h5>
                    <p class="card-text">{{$result->description}}</p>

                  {{-- <a href="/products/{{$product->id}}" class="btn btn-primary">Details</a> --}}
                </div>
              </div>
        @endforeach
    @else
        <p>No products found</p>
    @endif
    <p>HALLO SEARCH</p>
@endsection