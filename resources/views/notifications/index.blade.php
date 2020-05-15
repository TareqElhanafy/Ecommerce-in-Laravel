@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col mx-auto">
        <div class="card">
          <div class="card-header">
            Notifications
          </div>

          <div class="card-body">
          <ul class="list-group">
            @foreach($notifications as $notification)
            <li class="list-group-item">
              @if($notification->type==='App\Notifications\AddedToCart')
              <p>your product <strong>{{$notification->data['product']['name']}}</strong> has been added to someone cart</p>
                <a href="{{route('userproducts')}}" class="btn btn-success">View Your Products</a>
                @endif
            </li>
            @endforeach
          </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
