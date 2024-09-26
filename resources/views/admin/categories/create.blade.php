@extends('admin.layout')
@section('content')
    <div class="padding_nav">
        <div class="container">
            <div class="my-3  d-flex justify-content-between ">
                <h3>Create Category</h3>
                <a href="{{ route('admin.category') }}" type="button" class="btn btn-primary">Back</a>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="POST"  enctype="multipart/form-data" >
                @csrf
                <div class="form-group row">
                    <label for="staticName" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="staticName"
                            placeholder="Enter Your Category Name">
                        @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticName" class="col-sm-2 col-form-label">Category Image </label>
                    <div class="col-sm-10">
                        <input type="file" name="img" class="form-control" id="staticName"
                            placeholder="Enter Your Category Image">
                        @error('img')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <button type="submit" class="btn btn-primary mb-2">Confirm</button>
            </form>
        </div>
    </div>
@endsection
