@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card card-default">
          <div class="card-header">
            {{isset($product)?'Edit Your product':'Add new product'}}

          </div>
          <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
              <ul class="list-group">
                @foreach($errors->all() as $error)
                <li class="list-group-item">
                  {{$error}}
                </li>
                @endforeach
              </ul>
            </div>
            @endif
      <form class="" action="{{isset($product)?route('products.update',$product->id):route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
@if(isset($product))
@method('PUT')
@endif
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" value="{{isset($product)?$product->name:''}}" class="form-control" placeholder="product name">
        </div>
        @if(isset($product))
        <div class="form-group">
          <label for="name">Image</label>
          <br>
       <img src="{{asset('storage/'.$product->image)}}"  style="width:100px" alt="">
       <input type="file" name="image" class="form-control">
     </div>
        @else
        <div class="form-group">
          <label for="name">Image</label>
          <input type="file" name="image" class="form-control">
        </div>
        @endif
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" name="price" class="form-control" value="{{isset($product)?$product->price:''}}"  placeholder="product price">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" class="form-control" rows="8" cols="80">{{isset($product)?$product->description:''}}</textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success" name="button">{{isset($product)?'Update your product':'Add your product'}}</button>
        </div>

      </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
