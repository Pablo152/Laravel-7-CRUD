@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Products</h1>
        <div>
            <a style="margin: 19px;" href="{{ route('products.create')}}" class="btn btn-primary">New Product</a>
            <a style="margin: 19px;" href="{{ route('print')}}" class="btn btn-success">Export PDF</a>
            <a style="margin: 19px;" href="{{ URL::to('/sendemail')}}" class="btn btn-success">Email PDF</a>
            </div>
        <table class="table table-striped">
            <thead>
                <tr>
                  <td>ID</td>
                  <td>Product Name</td>
                  <td>Product Details</td>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_details}}</td>
                    <td>
                    <a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                <td>
                    <form action="{{ route('products.destroy', $product->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="col-sm-12">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
    @endif
  </div>
@endsection
