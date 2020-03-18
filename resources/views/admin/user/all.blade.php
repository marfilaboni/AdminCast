@extends('layouts/admin')
@section('content')
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_text">
                <h4><i class="fa fa-gg-circle"></i>All User Information</h4>
              </div>
              <div class="col-md-4 card_header_i text-right">
                <a href="{{url('admin/user/add')}}" class="btn btn-xs btn-primary"><i class="fa fa-th"></i>add user</a>
              </div>
              <div class="clr"></div>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped table_custom">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>User Role</th>
                  <th>Time</th>
                  <th>Manage</th>
                </tr>
              </thead>
              <tbody>
                 @foreach($allUser as $data)
                <tr>
                  <td>{{$data->name}}</td>
                    <td>{{$data->phone}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->userRole->role_name}}</td>
                  <td>{{$data->created_at->format('d M, Y | h:i:s')}}</td>
                  <td>
                    <a href="{{url('admin/user/view'.$data->id)}}" title="view"><i class="fa fa-plus-square fa-lg"></i></a>
                    <a href="#" title="edit"><i class="fa fa-pencil-square fa-lg"></i></a>
                    <a href="#" title="delete"><i class="fa fa-trash fa-lg"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
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
