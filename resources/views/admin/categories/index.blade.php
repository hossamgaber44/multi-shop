@extends('admin.layout')
@section('content')
    <div class="container">
        <div class='table' style="overflow: auto;" >
            <div class='table_header'>
                <h2>Categories</h2>
                <div class='table-tabe'>
                    <div>
                        <a href='/dashboard'>Dashboard</a>
                        <a href='/'>Home</a>- <span>Categories</span>
                    </div>
                    <div>
                        <a href="{{ route('admin.categories.create') }}" style="color: #ffffff;" type="button" class="btn btn-primary">add</a>
                    </div>
                </div>
            </div>
            <div class='table_body'>
                <table>
                    <thead>
                        <tr>
                            <th>{{ '#' }}</th>
                            <th>name</th>
                            <th>image</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $c)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->img }}</td>
                                <td><a type="button" class="btn btn-info" href="{{ route('admin.categories.edit',$c->id ) }}" >edit</a>
                                    <a type="button" class="btn btn-danger" href="{{ route('admin.categories.delete',$c->id ) }}" >Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
