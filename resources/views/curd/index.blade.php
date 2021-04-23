@extends('layouts.app')
@section('title','Home')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-sm-4 offset-sm-4">
        @if(Session::get('success'))
          <span class="alert-alert-success" style="color:green">{{Session::get('success')}}</span>
        @endif
        @if(session::get('fail'))
          <span class="alert-alert-danger" style="color:red">{{Session::get('fail')}}</span> 
        @endif 
        <form action ="{{ route('customers.store') }} " method="post">
          @csrf
          <div class="card">
            <div class="card-header">Customer Add</div>
            <div class="card-body">
              <div class="form-group">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="name" class="form-control" id="name"  value="{{old('name')}}" placeholder="Enter Name" name="name">
                  <span class="text-danger">@error('name'){{ $message }} @enderror </span>
                </div>
                
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email"  class="form-control" id="email"  value="{{old('email')}}" placeholder="Enter Email" name="email">
                <span class="text-danger">@error('email'){{ $message }} @enderror </span>
              </div>
              <div class="form-group">
                <label for ="mobile">Mobile</label>
                <input type ="mobile"  class="form-control" id="mobile"  value="{{old('mobile')}}" placeholder="Enter Mobile" name="mobile">
                <span class="text-danger">@error('mobile'){{ $message }} @enderror </span>
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="address"  class="form-control" id="address"  value="{{old('address')}}" placeholder="Enter Address" name="address">
                <span class="text-danger">@error('address'){{ $message }} @enderror </span>
              </div>
            </div>
            
              <button type="submit" class="btn btn-primary">Submit</button>
            
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <h3>Customer List</h3>
      <table class="table table-hovered table-stripped">
        <thead>
          <tr>
            <th>SNo.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php $i = 1 @endphp
          @foreach($customers as $data)

          <tr>
            <td>{{ $i }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->mobile }}</td>
            <td>{{ $data->address }}</td>
            <td>
              <a type="button" href="{{route('customers.edit',$data) }}" class="btn btn-primary">Edit</a>

              <form action = "{{route('customers.destroy',$data) }}" method="post" style="display:inline-block">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick = "return confirm('Sure to delete !!!')">Delete</button>
              </form>
            </td>
            @php $i++ @endphp
          </tr>
          @endforeach
        </tbody>
      </table>
    <div>
    <div class="col-sm-1"></div>
  </div>
@endsection


