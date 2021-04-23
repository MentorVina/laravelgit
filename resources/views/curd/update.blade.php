@extends('layouts.app')
@section('title','Home')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-sm-4 offset-sm-4">
        @if(Session::get('success'))
          <span class="alert-alert-success">{{Session::get('success')}}</span>
        @endif
        @if(session::get('fail'))
          <span class="alert-alert-danger">{{Session::get('fail')}}</span> 
        @endif 
        <form action ="{{ route ('customers.update',$customer) }} " method="post">
          @csrf
          @method('PUT')
          <input type="hidden"  name = "id" value = "{{ $customer->id}}"> 
          <div class="card">
            <div class="card-header">Customer Edit</div>
            <div class="card-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="name"  value ="{{ $customer->name }}" class="form-control" id="name" placeholder="Enter Name" name="name"> 
                <span class="text-danger">@error('name'){{ $message }} @enderror </span>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="{{ $customer->email }}" class="form-control" id="email" placeholder="Enter Email" name="email">
                <span class="text-danger">@error('email'){{ $message }} @enderror </span>
              </div>
              <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="mobile"  value ="{{ $customer->mobile }}" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile">
                <span class="text-danger">@error('mobile'){{ $message }} @enderror </span>
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="address" value ="{{$customer->address}}" class="form-control" id="address" placeholder="Enter Address" name="address">
                <span class="text-danger">@error('address'){{ $message }} @enderror </span>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
 
@endsection



