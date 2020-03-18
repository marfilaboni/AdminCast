@extends('layouts/admin')
@section('content')
 <div class="container">
   <div class="row">
    <div class="col-md-12">
      <form method="post" action="{{url('admin/banner/submit')}}" enctype="multipart/form-data">
        @csrf
       <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_text">
                <h4><i class="fa fa-gg-circle"></i>Upload Banner Information</h4>
              </div>
              <div class="col-md-4 card_header_i text-right">
                <a href="{{url('admin/banner')}}" class="btn btn-xs btn-primary"><i class="fa fa-plus-circle"></i>all banner</a>
              </div>
              <div class="clr"></div>
            </div>
          </div>
          <div class="card-body">
            @if(Session::has('success'))
                <script>
                    swal({ title: "Success!", text: "Banner upload Success.", timer:5000, icon: "success",});
                </script>
              @endif
              @if(Session::has('error'))
                <script>
                    swal({ title: "Opps!", text: "Banner upload failed.", timer:5000, icon: "warning",});
                </script>
              @endif
            <div class="form-group row form_custom {{$errors->has('title')? ' has-error':''}}">
              <label for="inputPassword" class="col-sm-3 col-form-label">Banner Title:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                @if($errors->has('title'))
                 <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title')}}</strong>
                 </span>
                @endif
              </div>
            </div>
            <div class="form-group row form_custom">
              <label for="inputPassword" class="col-sm-3 col-form-label">Banner Subtitle:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="subtitle" value="{{old('subtitle')}}">
              </div>
            </div>
            <div class="form-group row form_custom {{$errors->has('btn')? ' has-error':''}}">
              <label for="inputPassword" class="col-sm-3 col-form-label">Banner Button:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="btn" value="{{old('btn')}}">
                @if($errors->has('btn'))
                 <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('btn')}}</strong>
                 </span>
                @endif
              </div>
            </div>
            <div class="form-group row form_custom">
              <label for="inputPassword" class="col-sm-3 col-form-label">Banner URL:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="url" value="{{old('url')}}">
              </div>
            </div>
            <div class="form-group row form_custom">
              <label for="inputPassword" class="col-sm-3 col-form-label">Banner Photo:</label>
              <div class="col-sm-7">
                <input type="file"  name="pic"  onchange="readURL(this);">
                <img id="upload-image" width="100" height="100" src="{{asset('uploads/avatar.png')}}" alt="image" />
              </div>
            </div>
          </div>
          <div class="card-footer text-center">
             <button type="submit" class="btn btn-info btn-xs">UPLOAD</button>
          </div>
      </div>
    </form>
     </div>
   </div>
 </div>
@endsection
