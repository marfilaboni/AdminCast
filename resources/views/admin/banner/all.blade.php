@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
                <div class="col-md-8 card_header_text">
                    <h4><i class="fa fa-gg-circle"></i> All Banner Information</h4>
                </div>
                <div class="col-md-4 text-right card_header_btn_part">
                    <a href="{{url('admin/banner/add')}}" class="btn btn-xs btn-primary"><i class="fa fa-plus-circle"></i> Add Banner</a>
                </div>
                <div class="clr"></div>
            </div>
          </div>
          <div class="card-body">
            @if(Session::has('success'))
                <script>
                    swal({ title: "Success!", text: "Banner information delete.", timer:5000, icon: "success",});
                </script>
              @endif
              @if(Session::has('error'))
                <script>
                    swal({ title: "Opps!", text: "Banner information delete failed.", timer:5000, icon: "warning",});
                </script>
              @endif
              <table class="table table-bordered table-striped custom_table">
                  <thead>
                      <tr>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Button</th>
                        <th>Photo</th>
                        <th>Manage</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($allBanner as $data)
                      <tr>
                          <td>{{str_limit($data->ban_title,20)}}</td>
                          <td>{{str_limit($data->ban_subtitle,20)}}</td>
                          <td>{{$data->ban_button}}</td>
                          <td>
                            @if($data->ban_photo!='')
                              <img width="50" src="{{asset('uploads/'.$data->ban_photo)}}" alt="ban"/>
                            @else
                               <img width="50" src="{{asset('uploads/avatar.png')}}" alt="ban"/>
                            @endif
                          </td>
                          <td>
                              <a href="{{url('admin/banner/view'.$data->ban_slug)}}" title="view"><i class="fa fa-plus-square fa-lg"></i></a>
                              <a href="{{url('admin/banner/edit'.$data->ban_slug)}}" title="edit"><i class="fa fa-pencil-square fa-lg"></i></a>
                              <a href="#" id="softdelete" title="delete" data-toggle="modal" data-id="{{$data->ban_id}}" data-target="#softDelModal"><i class="fa fa-trash fa-lg"></i></a>
                          </td>
                     </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
          <div class="card-footer">
              <a class="btn btn-info btn-xs">Print</a>
              <a class="btn btn-warning btn-xs">CSV</a>
              <a class="btn btn-primary btn-xs">Excel</a>
              <a class="btn btn-success btn-xs">PDF</a>
          </div>
        </div>
      </div>
  </div>
</div>

<!-- soft delete start-->
<div class="modal fade" id="softDelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="{{url('admin/banner/softdelete')}}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="modal_id"/>
           Are you want to sure delete this information?
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Delete</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
