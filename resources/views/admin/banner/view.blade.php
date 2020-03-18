@extends('layouts/admin')
@section('content')
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_text">
                <h4><i class="fa fa-gg-circle"></i>View Banner Information</h4>
              </div>
              <div class="col-md-4 card_header_i text-right">
                <a href="{{url('admin/banner/add')}}" class="btn btn-xs btn-primary"><i class="fa fa-th"></i>add banner</a>
              </div>
              <div class="clr"></div>
            </div>
          </div>
          <div class="card-body">
            @if(Session::has('success'))
                <script>
                    swal({ title: "Success!", text: "Upadate Banner Information.", timer:5000, icon: "success",});
                </script>
              @endif
             <div class="row">
               <div class="col-md-1"></div>
               <div class="col-md-10">
                 <table class="table table-bordered table-hover table-striped view_custom">
                   <tr>
                      <td>Banner Title</td>
                      <td>:</td>
                      <td>{{$data->ban_title}}</td>
                   </tr>
                   <tr>
                      <td>Banner Subtitle</td>
                      <td>:</td>
                      <td>{{$data->ban_subtitle}}</td>
                   </tr>
                   <tr>
                      <td>Banner Button</td>
                      <td>:</td>
                      <td>{{$data->ban_button}}</td>
                   </tr>
                   <tr>
                      <td>Banner URL</td>
                      <td>:</td>
                      <td>{{$data->ban_url}}</td>
                   </tr>
                   <tr>
                      <td>Banner Photo</td>
                      <td>:</td>
                      <td>
                        @if($data->ban_photo!='')
                          <img width="200" src="{{asset('uploads/'.$data->ban_photo)}}" alt="ban"/>
                        @else
                           <img width="200" src="{{asset('uploads/avatar.png')}}" alt="ban"/>
                        @endif
                      </td>
                   </tr>
                 </table>
               </div>
               <div class="col-md-1"></div>
             </div>
          </div>
          <div class="card-footer">
             <a class="btn btn-info btn-xs">Print</a>
             <a class="btn btn-warning btn-xs">CVS</a>
             <a class="btn btn-primary btn-xs">Excel</a>
             <a class="btn btn-success btn-xs">PDF</a>
          </div>
      </div>
     </div>
   </div>
 </div>
@endsection
