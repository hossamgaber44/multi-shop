@extends('user.layouts.userLayout')
@section('content')
    <div class='SingleProduct'>
        <div class='SingleProduct-container'>
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                <br>
            @endif
            <div class='single-product-content'>
                <div class='img'>
                    <img src="{{ asset('images/product' . '/' . $productDetails->img) }}" />
                </div>
                <div class='single-product-info'>
                    <h5 class='brand'>brand :{{ $productDetails->brand }}</h5>
                    <h2>{{ $productDetails->name }}</h2>
                    <h4 class='data'>{{ $productDetails->desc }}</h4>
                    <div class='single-product-price'>
                        <b>{{ $productDetails->price }}</b>
                    </div>
                    <h3>Quantity : </h3>
                    <div class='addcategory'>
                        <a class="addToCart" href="{{ route('cart.add', $productDetails->id) }}">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
