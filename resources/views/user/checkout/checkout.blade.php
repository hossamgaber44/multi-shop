@extends('user.layouts.userLayout')

@section('content')
   <!-- Breadcrumb Start -->
   <div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ route('user.index') }}">Home</a>
                <a class="breadcrumb-item text-dark" href="{{ route('shop.show') }}">Shop</a>
                <span class="breadcrumb-item active">Checkout</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Checkout Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
            <form action="{{ route('cart.pay') }}" method="POST" class="bg-light p-30 mb-5">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" type="text" placeholder="John">
                        @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" name="email"  type="text" placeholder="example@email.com">
                        @error('email')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input class="form-control" name="mobile" type="text" placeholder="+123 456 789">
                        @error('mobile')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address</label>
                        <input class="form-control" name="address" type="text" placeholder="123 Street">
                        @error('address')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Country</label>
                        <select class="custom-select" name="country" >
                            <option value="United States" selected>United States</option>
                            <option value="Afghanistan" >Afghanistan</option>
                            <option value="Albania" >Albania</option>
                            <option value="Algeria" >Algeria</option>
                            <option value="Egypt" >Egypt</option>
                        </select>
                        @error('country')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>City</label>
                        <input class="form-control" name="city" type="text" placeholder="New York">
                        @error('city')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>State</label>
                        <input class="form-control" name="state" type="text" placeholder="New York">
                        @error('state')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>ZIP Code</label>
                        <input class="form-control" name="ZIPCode" type="text" placeholder="123">
                        @error('ZIPCode')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 form-group mt-5">
                    <button class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                </div>
            </form>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
            @if($cart != null )
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">
                    <h6 class="mb-3">Products</h6>
                    @foreach ( $cart->items as $item )
                        <div class="d-flex justify-content-between">
                            <p>{{  $item['name'] }}</p>
                            <p>${{ $item['qty'] *($item['price'] - $item['price']*$item['descount']/100) }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="border-bottom pt-3 pb-2">
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
                        <h5>${{ $cart->totalPrice +10 }}</h5>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- Checkout End -->

@endsection
