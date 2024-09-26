@extends('user.layouts.userLayout')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('user.index') }}">Home</a>
                    <a class="breadcrumb-item text-dark" href="{{ route('shop.show') }}">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('images/product' . '/' . $product->img) }}"
                                alt="Image">
                        </div>
                        @foreach ($product->ProductImages as $image)
                            <div class="carousel-item ">
                                <img class="w-100 h-100" src="{{ asset('images/product' . '/' . $image->img) }}"
                                    alt="Image">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-7 h-auto mb-30">
                @if (session()->has('success'))
                    <div style="width: 80%; margin:2px auto 12px;" class="alert alert-success" >{{ session('success') }}</div>
                @endif
                <div class="h-100 bg-light p-30">
                    <h3>{{ $product->name }}</h3>
                    <h3 class="font-weight-semi-bold mb-4">${{ $product->price - ($product->price *($product->descount / 100 ))}}</h3>
                    <p class="mb-4">{{ $product->small_desc }}</p>
                    <form action="{{ route('cart.addItemInfoToCart') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <div class="d-flex mb-3">
                            <strong class="text-dark mr-3">Sizes:</strong>
                            @foreach ($product->ProductSize as $size)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-{{ $loop->iteration }}"
                                        value="{{ $size->size }}" name="size">
                                    <label class="custom-control-label"
                                        for="size-{{ $loop->iteration }}">{{ $size->size }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex mb-4">
                            <strong class="text-dark mr-3">Colors:</strong>
                            @foreach ($product->ProductColor as $color)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-{{ $loop->iteration }}"
                                        value="{{ $color->color }}" name="color">
                                    <label class="custom-control-label"
                                        for="color-{{ $loop->iteration }}">{{ $color->color }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('color')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                        @error('size')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                        <div class="d-flex align-items-center mb-4 pt-2">
                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input id="valOfCart" type="text" name="qty" class="form-control bg-secondary border-0 text-center"
                                    value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                                Cart</button>
                        </div>
                    </form>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <p>{{ $product->information }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->
@endsection
@section('script')
    <script>
        document.getElementById('CartBtn').addEventListener('click', function(event) {
            console.log('fff');
            event.preventDefault();
        });
    </script>
@endsection
