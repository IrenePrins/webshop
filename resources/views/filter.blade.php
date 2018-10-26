@extends('layouts.app')

@section('content')

<a class="btn btn-primary" href="{{ route('products.index')}}">Ga terug</a>

    <h3>Filter results</h3>
    <p>{{$results->count()}} Filter Result(s) for {{ request()->input('filter')}}</p>
    @if(count($results) > 0)
        @foreach($results as $result)
        <div class="card col-md-3">
                <div class="card-body">
                    <img style='width : 100%'src="/storage/product_images/{{$result->image}}"/>
                    <h5 class="card-title">{{$result->title}}</h5>
                    <p class="card-text">{{str_limit($result->description, 80)}}</p>
                    <a href="/products/{{$result->id}}" class="btn btn-primary">Details</a>
                </div>
              </div>
        @endforeach
    @else
        <p>No products found</p>
    @endif
@endsection