@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Add a Product</h1>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br  />
    @endif
    <form method="post" action="{{ route('products.store') }}">
    @csrf
    <div class="form-group">
        <label for="product_name">Product name: </label>
        <input type="text" name="product_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="product_details">Product details: </label>
        <input type="text" name="product_details" class="form-control">
    </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
@endsection