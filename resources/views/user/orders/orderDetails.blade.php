@extends('user.layouts.userLayout')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('user.index') }}">Home</a>
                    <a class="breadcrumb-item text-dark" href="{{ route('shop.show') }}">Shop</a>
                    <span class="breadcrumb-item active">Orders Details</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="container-fluid">
        @if($orderDetails != null )
            <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Products</th>
                            <th>color</th>
                            <th>size</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ( $orderDetails as $order )
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle"><img src="{{ asset('images/product'.'/'. $order->Product->img) }}" alt="" style="width: 50px;">
                                {{ $order->Product->name }}</td>
                            <td class="align-middle">{{ $order->color }}</td>
                            <td class="align-middle">{{ $order->size }}</td>
                            <td class="align-middle">{{ $order->quantity }} </td>
                            <td class="align-middle">${{ $order->unit_price }} </td>
                            <td class="align-middle">${{ $order->unit_price*$order->quantity }} </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        @else
            <div class="d-flex align-items-center justify-content-center mt-2">
                <h5> You did not place any order </h5>
            </div>
        @endif
    </div>
    <!-- Cart End -->
@endsection
