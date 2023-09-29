@extends('shop')

@section('content')

<div class="row">
    @foreach($products as $product)
        <div class="col-md-3 col-6 mb-4">
            <div class="card">
                <img src="{{asset('images') }}/{{ $product->picture }}"
                class="card-img-top" alt="product-img"/>
                <div class="card-body">
                    <h4 class="card-title">{{ $product->title }}</h4>
                    <small>{{ $product->description }}</small>
                        <p class="card-text">
                        <strong>Price: </strong>
                        ${{ $product->price }}</p>
                    <p class="btn-holder">
                    <a href="{{ route('addproduct.to.cart', $product->id) }}"
                        class="btn btn-outline-danger">Add to cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
