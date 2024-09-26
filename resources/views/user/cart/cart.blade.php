@extends('user.layouts.userLayout')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('user.index') }}">Home</a>
                    <a class="breadcrumb-item text-dark" href="{{ route('shop.show') }}">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="container-fluid">
        @if($cart != null )
            <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                        @if (session()->has('success'))
                            <div style="width: 80%; margin:2px auto 12px;" class="alert alert-success" >{{ session('success') }}</div>
                        @endif
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>color</th>
                            <th>size</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ( $cart->items as $item )
                        <tr>
                            <td class="align-middle"><img src="{{ asset('images/product'.'/'. $item['image']) }}" alt="" style="width: 50px;">
                                {{ $item['name'] }}</td>
                            <td class="align-middle">@if($item['color'] == '') null @else {{ $item['color'] }} @endif </td>
                            <td class="align-middle">@if($item['size'] == '') null @else {{ $item['size'] }} @endif </td>
                            <td class="align-middle">${{ $item['price'] - $item['price']*$item['descount']/100 }} </td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <a href="{{ route('cart.decreaseItem', $item['id'] ) }}" class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                    </div>
                                    <input type="text"
                                        class="form-control form-control-sm bg-secondary border-0 text-center"
                                        value="{{ $item['qty'] }}">
                                    <div class="input-group-btn">
                                        <a href="{{ route('cart.increaseItem',$item['id']) }}"  class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">${{ $item['qty'] *($item['price'] - $item['price']*$item['descount']/100)  }}</td>
                            <td class="align-middle"><a href="{{ route('cart.remove',$item['id']) }}" class="btn btn-sm btn-danger"><i
                                class="fa fa-times"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                        Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>${{ $cart->totalPrice }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>${{ $cart->totalPrice + 10 }}</h5>
                        </div>
                        <a href="{{ route('checkout.show') }}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
            </div>
        @else
            <div class="d-flex align-items-center justify-content-center mt-2">
                <h5> the cart is empty </h5>
            </div>
        @endif
    </div>
    <!-- Cart End -->
@endsection
