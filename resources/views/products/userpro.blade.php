@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col mx-auto">
        <div class="card">
          <div class="card-header">
            products
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <th>Id</th>
                <th>Owner</th>
                <th>Contact</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Description</th>
              </thead>
              <tbody>
                @foreach($products as $product)
                <tr>
                  <td>{{$product->id}}</td>
                  <td>{{$product->user->name}}</td>
                  <td>{{$product->user->email}}</td>
                  <td>{{$product->name}}</td>
                  <td>{{$product->price}}</td>
                  <td>
                    <img src="{{asset('storage/'.$product->image)}}"  style="width:50px" alt="">

                  </td>
                  <td>{{$product->description}}</td>
                  @auth
                  @if(auth()->user()->id===$product->user_id)
                  <td><a class="btn btn-warning" href="{{route('products.edit',$product->id)}}">Edit</a></td>
                  <td>
                  <form class="" action="{{route('products.destroy',$product->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                     <button type="submit" class="btn btn-danger">Delete</button>

                  </form>
                  </td>
                  @endif
                  @endauth
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
          <div class="card-footer">
            {{$products->links()}}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
