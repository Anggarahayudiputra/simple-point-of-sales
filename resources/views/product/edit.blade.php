@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 bg-white p-4">
            <form action="{{ route('product.update', $product->id) }}" method="post">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control"  value="{{ $product->price }}">
                </div>
                <button type="submit" class="btn btn-block btn-primary">Update Product</button>
            </form>
        </div>
    </div>
</div>
@endsection
