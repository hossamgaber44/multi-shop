@extends('admin.layout')
@section('content')
    <div class="container">
        <div class='table' style="overflow: auto;">
            <div class='table_header'>
                <h2> Users</h2>
                <div class='table-tabe'>
                    <div>
                        <a href='/dashboard'>Dashboard</a>
                        <a href='/'>Home</a>- <span>Users</span>
                    </div>
                </div>
            </div>
            <div class='table_body'>
                <table>
                    <thead>
                        <tr>
                            <th>{{ '#' }}</th>
                            <th>name</th>
                            <th>email</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a type="button" class="btn btn-danger" href="{{ route('admin.user.delete',$user->id ) }}" >Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
