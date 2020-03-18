@extends('layouts/admin')
@section('content')
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_text">
                <h4><i class="fa fa-gg-circle"></i>View User Information</h4>
              </div>
              <div class="col-md-4 card_header_i text-right">
                <a href="#" class="btn btn-xs btn-primary"><i class="fa fa-th"></i>add user</a>
              </div>
              <div class="clr"></div>
            </div>
          </div>
          <div class="card-body">
             <div class="row">
               <div class="col-md-1"></div>
               <div class="col-md-10">
                 <table class="table table-bordered table-hover table-striped view_custom">
                   <tr>
                      <td>Name</td>
                      <td>:</td>
                      <td>{{$data->name}}</td>
                   </tr>
                   <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td>{{$data->email}}</td>
                   </tr>
                   <tr>
                      <td>Time</td>
                      <td>:</td>
                      <td>{{$data->created_at}}</td>
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
