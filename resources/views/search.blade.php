@extends('layouts.app')


@section('content')

    <h3>Search results</h3>
    <p>{{$results->count()}} Search Result(s) for {{ request()->input('search')}}</p>
    @if(count($results) > 0)
        @foreach($results as $result)
        <div class="card col-md-3">
                {{-- <img class="card-img-top" src="/storage/product_images/{{$result->image}}" alt="Image of the product"> --}}
                <div class="card-body">
                    <img style='width : 100%'src="/storage/product_images/{{$result->image}}"/>
                    <h5 class="card-title">{{$result->title}}</h5>
                    <p class="card-text">{{str_limit($result->description, 80)}}</p>
                    <a href="/products/{{$result->id}}" class="btn btn-primary">Details</a>
                    <span>{{ $errors->first('search')}}</span>
                  {{-- <a href="/products/{{$product->id}}" class="btn btn-primary">Details</a> --}}
                </div>
              </div>
        @endforeach
    @else
        <p>No products found</p>
    @endif
@endsection