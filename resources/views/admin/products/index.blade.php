@extends('admin.layout')
@section('content')
    <div class="container">
        <div class='table' style="overflow: auto;">
            <div class='table_header'>
                <h2> Products</h2>
                <div class='table-tabe'>
                    <div>
                        <a href='/dashboard'>Dashboard</a>
                        <a href='/'>Home</a>- <span>Products</span>
                    </div>
                    <div>
                        <a href="{{ route('admin.product.create') }}"  style="color: #ffffff;"  type="button" class="btn btn-primary">add</a>
                    </div>
                </div>
            </div>
            <div class='table_body'>
                <table>
                    <thead>
                        <tr>
                            <th>{{ '#' }}</th>
                            <th>name</th>
                            <th>price</th>
                            <th>image</th>
                            <th>rating</th>
                            {{-- <th>small_desc</th> --}}
                            <th>Category Name</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Product as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td> {{ $p->name }}</td>
                                <td>{{ $p->price }}</td>
                                <td>{{ $p->img }}</td>
                                <td>{{ $p->rating }}</td>
                                {{-- <td>{{ $p->small_desc }}</td> --}}
                                <td>{{ $p->category_id }}</td>
                                <td><a type="button" class="btn btn-info" href="{{ route('admin.product.edit',$p->id ) }}" >edit</a>
                                    <a type="button" class="btn btn-danger" href="{{ route('admin.product.delete',$p->id ) }}" >Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
