@extends('layouts/admin')
@section('content')
 <div class="container">
   <div class="row">
    <div class="col-md-12">
      <form method="post" action="{{url('/admin/user/submit')}}" enctype="multipart/form-data">
        @csrf
       <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_text">
                <h4><i class="fa fa-gg-circle"></i>User Information</h4>
              </div>
              <div class="col-md-4 card_header_i text-right">
                <a href="{{url('admin/user')}}" class="btn btn-xs btn-primary"><i class="fa fa-plus-circle"></i>all user</a>
              </div>
              <div class="clr"></div>
            </div>
          </div>
          <div class="card-body">
            @if(Session::has('success'))
                <script>
                    swal({ title: "Successfully!", text: "User Registration Success.", timer:5000, icon: "success",});
                </script>
              @endif
              @if(Session::has('error'))
                <script>
                    swal({ title: "Opps!", text: "User Registration failed.", timer:5000, icon: "warning",});
                </script>
              @endif
            <div class="form-group row form_custom {{$errors->has('name')? ' has-error':''}}">
              <label for="inputPassword" class="col-sm-3 col-form-label">Name:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                @if($errors->has('name'))
                 <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name')}}</strong>
                 </span>
                @endif
              </div>
            </div>
            <div class="form-group row form_custom">
              <label for="inputPassword" class="col-sm-3 col-form-label">Phone:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
              </div>
            </div>
            <div class="form-group row form_custom {{$errors->has('email')? ' has-error':''}}">
              <label for="inputPassword" class="col-sm-3 col-form-label">Email:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="email" value="{{old('email')}}">
                @if($errors->has('email'))
                 <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email')}}</strong>
                 </span>
                @endif
              </div>
            </div>
            <div class="form-group row form_custom {{$errors->has('password')? ' has-error':''}}">
              <label for="inputPassword" class="col-sm-3 col-form-label">Password:</label>
              <div class="col-sm-7">
                <input type="password" class="form-control" name="password" value="">
                @if($errors->has('password'))
                 <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password')}}</strong>
                 </span>
                @endif
              </div>
            </div>
            <div class="form-group row form_custom">
              <label for="inputPassword" class="col-sm-3 col-form-label">Confirm Password:</label>
              <div class="col-sm-7">
                <input type="password" class="form-control" name="password_confirmation" value="{{old('name')}}">
              </div>
            </div>
            <div class="form-group row form_custom {{$errors->has('role')? ' has-error':''}}">
              <label for="inputPassword" class="col-sm-3 col-form-label">User Role:</label>
              <div class="col-sm-4">
                <select class="form-control" name="role">
                  @if($errors->has('role'))
                   <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('role')}}</strong>
                   </span>
                  @endif
                   <option value="">Select User Role</option>
                   @foreach($allRole as $urole)
                     <option value="{{$urole->role_id}}">{{$urole->role_name}}</option>
                   @endforeach
                 </select>
              </div>
            </div>
            <div class="form-group row form_custom">
              <label for="inputPassword" class="col-sm-3 col-form-label">Photo:</label>
              <div class="col-sm-7">
                <input type="file"  name="pic">
              </div>
            </div>
          </div>
          <div class="card-footer text-center">
             <button type="submit" class="btn btn-info btn-xs">RIGISTRATION</button>
          </div>
      </div>
    </form>
     </div>
   </div>
 </div>
@endsection
