@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body ">
        <div class="row align-items-center">
          <div class="col-icon">
            <div class="icon-big text-center icon-primary bubble-shadow-small">
              <i class="fa fa-user"></i>
            </div>
          </div>
          <div class="col col-stats ml-3 ml-sm-0">
            <div class="numbers">
              <p class="card-category">Users</p>
               @php
                 $totalUser=App\User::count();
               @endphp
              <h4 class="card-title">
                 @if($totalUser<=9)
                   0{{$totalUser}}
                @else

                @endif
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-icon">
            <div class="icon-big text-center icon-info bubble-shadow-small">
              <i class="fas fa-newspaper"></i>
            </div>
          </div>
          <div class="col col-stats ml-3 ml-sm-0">
            <div class="numbers">
              <p class="card-category">Subscribers</p>
              <h4 class="card-title">1303</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-icon">
            <div class="icon-big text-center icon-success bubble-shadow-small">
              <i class="fas fa-chart-bar"></i>
            </div>
          </div>
          <div class="col col-stats ml-3 ml-sm-0">
            <div class="numbers">
              <p class="card-category">Sales</p>
              <h4 class="card-title">$ 1,345</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-icon">
            <div class="icon-big text-center icon-secondary bubble-shadow-small">
              <i class="fa fa-check-circle"></i>
            </div>
          </div>
          <div class="col col-stats ml-3 ml-sm-0">
            <div class="numbers">
              <p class="card-category">Order</p>
              <h4 class="card-title">576</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
