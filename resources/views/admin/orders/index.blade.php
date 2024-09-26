@extends('admin.layout')
@section('content')
    <div class="container">
        <div class='table' style="overflow: auto;">
            <div class='table_header'>
                <h2> Orders</h2>
                <div class='table-tabe'>
                    <div>
                        <a href='/dashboard'>Dashboard</a>
                        <a href='/'>Home</a>- <span>Orders</span>
                    </div>
                </div>
            </div>
            <div class='table_body'>
                <table>
                    <thead>
                        <tr>
                            <th>{{ '#' }}</th>
                            <th>user_name</th>
                            <th>address</th>
                            <th>total_price</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $order->User->name }}</td>
                                <td> {{ $order->address }}</td>
                                <td> {{ $order->total_price }}</td>
                                <td>
                                    @if ($order->status !== 'processing')
                                        <a href="{{ route('admin.orders.processingOrder', [$order->id]) }}"
                                            type="button" class="btn btn-danger">processing</a>
                                    @endif
                                    @if ($order->status !== 'shipped')
                                        <a type="button" class="btn btn-info"
                                            href="{{ route('admin.orders.shippedOrder', [$order->id]) }}">shipped</a>
                                    @endif
                                </td>
                                <td>
                                    <a type="button" class="btn btn-info" href="{{ route('admin.order.details',$order->id ) }}" >Order Details</a>
                                    <a type="button" class="btn btn-danger" href="{{ route('admin.order.delete',$order->id ) }}" >Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
