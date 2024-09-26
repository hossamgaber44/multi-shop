@extends('admin.layout')
@section('content')
    <div class="container">
        <div class='table'>
            <div class='table_header'>
                <h2> Order Details</h2>
                <div class='table-tabe'>
                    <div>
                        <a href='/dashboard'>Dashboard</a>
                        <a href='/'>Home</a>- <span>Order Details</span>
                    </div>
                </div>
            </div>
            <div class='table_body'>
                <table>
                    <thead>
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
                    <tbody>
                        @foreach ( $orderDetails as $order )
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle"><span style="width: 50px; display: inline-block;" ><img src="{{ asset('images/product'.'/'. $order->Product->img) }}" alt=""></span>
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
    </div>
@endsection
