@extends('user.layouts.userLayout')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('user.index') }}">Home</a>
                    <a class="breadcrumb-item text-dark" href="{{ route('shop.show') }}">Shop</a>
                    <span class="breadcrumb-item active">Orders</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="container-fluid">
        @if($orders != null )
            <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>address</th>
                            <th>total_price</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ( $orders as $order )
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $order->address }}</td>
                            <td class="align-middle">{{ $order->total_price }}</td>
                            <td class="align-middle">{{ $order->status }}</td>
                            <td class="align-middle">
                                <a href="{{ route('order.details',$order->id) }}" class="btn btn-info " type="button">
                                    order Details
                                </a>
                            </td>
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
