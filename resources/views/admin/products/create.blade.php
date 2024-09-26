@extends('admin.layout')
@section('content')
    <div class="padding_nav">
        <div class="container">
            <div class="my-3  d-flex justify-content-between ">
                <h3>Create Product</h3>
                <a href="{{ route('admin.category') }}" type="button" class="btn btn-primary">Back</a>
            </div>
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="staticName" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="staticName"
                            placeholder="Enter Your Category Name">
                        @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticName" class="col-sm-2 col-form-label">Product price</label>
                    <div class="col-sm-10">
                        <input type="number" name="price" class="form-control" id="staticName"
                            placeholder="Enter Your Category Title">
                        @error('price')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticName" class="col-sm-2 col-form-label">Product descount</label>
                    <div class="col-sm-10">
                        <input type="number" name="descount" class="form-control" id="staticName"
                            placeholder="Enter Your product descount">
                        @error('descount')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"  >
                    <label for="staticName" class="col-sm-2 col-form-label">Product Image </label>
                    <div class=" col-sm-10" id="formOfImage" >
                        <input type="file" name="img" class="form-control" id="staticName">
                        @error('img')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <span  onclick="addInput()" class="addImage">AddImage</span>
                </div>
                <div class="form-group row">
                    <label for="staticName" class="col-sm-2 col-form-label">Product rating</label>
                    <div class="col-sm-10">
                        <input type="text" name="rating" class="form-control" id="staticName"
                            placeholder="Enter Your Category Title">
                        @error('rating')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticName" class="col-sm-2 col-form-label">Product small_description</label>
                    <div class="col-sm-10">
                        <input type="text" name="small_desc" class="form-control" id="staticName"
                            placeholder="Enter Your Category Title">
                        @error('small_desc')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticName" class="col-sm-2 col-form-label">Product description</label>
                    <div class="col-sm-10">
                        <input type="text" name="description" class="form-control" id="staticName"
                            placeholder="Enter Your Category Title">
                        @error('description')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticName" class="col-sm-2 col-form-label">Product information</label>
                    <div class="col-sm-10">
                        <input type="text" name="information" class="form-control" id="staticName"
                            placeholder="Enter Your Category Title">
                        @error('information')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex form-group">
                    <label class="col-sm-2 col-form-label" for="category_id"> Select Category</label>
                    <select name="category_id" class="form-control" id="category_id">
                        @foreach ($Category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex mb-3" style="justify-content: start;">
                    <strong class="col-sm-2 col-form-label">Sizes:</strong>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input value="XS" name="size[XS]" type="checkbox" class="custom-control-input" id="size-1"
                            >
                        <label class="custom-control-label" for="size-1">XS</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input value="S" name="size[S]" type="checkbox" class="custom-control-input" id="size-2"
                            >
                        <label class="custom-control-label" for="size-2">S</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input value="M" name="size[M]" type="checkbox" class="custom-control-input"
                            id="size-3" >
                        <label class="custom-control-label" for="size-3">M</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input value="L" name="size[L]" type="checkbox" class="custom-control-input"
                            id="size-4" >
                        <label class="custom-control-label" for="size-4">L</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input value="XL" name="size[XL]" type="checkbox" class="custom-control-input"
                            id="size-5" >
                        <label class="custom-control-label" for="size-5">XL</label>
                    </div>
                </div>
                @error('size')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
                <div class="d-flex mb-3" style="justify-content: start;">
                    <strong class="col-sm-2 col-form-label">Colors:</strong>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" value="Black" name="color[Black]" class="custom-control-input"
                            id="color-1" name="color">
                        <label class="custom-control-label" for="color-1">Black</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" value="White" name="color[White]" class="custom-control-input"
                            id="color-2" name="color">
                        <label class="custom-control-label" for="color-2">White</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" value="Red" name="color[Red]" class="custom-control-input"
                            id="color-3" name="color">
                        <label class="custom-control-label" for="color-3">Red</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" value="Blue" name="color[Blue]" class="custom-control-input"
                            id="color-4" name="color">
                        <label class="custom-control-label" for="color-4">Blue</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" value="Green" name="color[Green]" class="custom-control-input"
                            id="color-5" name="color">
                        <label class="custom-control-label" for="color-5">Green</label>
                    </div>
                    @error('color')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-2">Confirm</button>
            </form>
        </div>
    </div>
@endsection


