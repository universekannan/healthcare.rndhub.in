@extends('layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Total SMS & Email</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Total SMS & Email</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid mb-3">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{ url('sms_email/yesterday') }}"><button type="button" class="btn btn-block btn-danger">Yesterday</button></a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{ url('sms_email/today') }}"><button type="button" class="text-white btn btn-block btn-warning">Today</button></a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{ url('sms_email/month') }}"><button type="button" class="btn btn-block btn-success">This Month</button></a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <button id="custom" type="button" class="btn btn-block btn-info">Custom</button>
          </div>
        </div>
      </div>
        <div class="container-fluid mb-3" id="showCustom" style="display:none">
          <form action="{{ url('sms_email/custom') }}" method="get"> 
            <div class="row">
              <div class="col-3">
              </div>
              <div class="col-3">
                <div class="input-group mb-3">
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                      <input type="text" name="start_date" <?php if(isset($_GET['start_date'])){echo 'value="'.$_GET['start_date'].'"';} ?> class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Start Date" required>
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="input-group mb-3">
                  <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                      <input type="text" name="end_date" <?php if(isset($_GET['end_date'])){echo 'value="'.$_GET['end_date'].'"';} ?>  class="form-control datetimepicker-input" data-target="#reservationdate1" placeholder="End Date" required>
                      <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-3">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>

      <div class="container-fluid">
        <div class="row">
        <div class="col-12 col-sm-6 col-md-3"></div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-comment"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total SMS</span>
                <span class="info-box-number">{{ $result['smsCount'] }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Email</span>
                <span class="info-box-number">{{ $result['emailCount'] }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Shop Name</th>
                    <th>Total SMS</th>
                    <th>Total Email</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($result['totaluser'] as $key=>$totuser)
                      <?php 
                        if($result['filter'] == 'all') {

                          $smsCount = DB::table('shop_otp')->where('shop_id', $totuser->id)->orderBy('id','DESC')->count(); 
                          $emailCount = DB::table('shop_mail')->where('shop_id', $totuser->id)->orderBy('id','DESC')->count();

                        } else if($result['filter'] == 'yesterday') {

                          $yesterday = date('Y-m-d',strtotime("-1 days"));
                          $smsCount = DB::table('shop_otp')->where('shop_id', $totuser->id)->orderBy('id','DESC')->whereDate('created_at',$yesterday)->count(); 
                          $emailCount = DB::table('shop_mail')->where('shop_id', $totuser->id)->orderBy('id','DESC')->whereDate('created_at',$yesterday)->count();
                
                        } else if($result['filter'] == 'today') {

                          $currentDate = date('Y-m-d');
                          $smsCount = DB::table('shop_otp')->where('shop_id', $totuser->id)->orderBy('id','DESC')->whereDate('created_at',$currentDate)->count(); 
                          $emailCount = DB::table('shop_mail')->where('shop_id', $totuser->id)->orderBy('id','DESC')->whereDate('created_at',$currentDate)->count();

                        } else if($result['filter'] == 'month') {

                          $now = carbon\Carbon::now();
                          $monthStartDate = $now->startOfMonth()->format('Y-m-d');
                          $monthEndDate = $now->endOfMonth()->format('Y-m-d');
                          $smsCount = DB::table('shop_otp')->where('shop_id', $totuser->id)->orderBy('id','DESC')->whereBetween('created_at', [$monthStartDate, $monthEndDate])->count(); 
                          $emailCount = DB::table('shop_mail')->where('shop_id', $totuser->id)->orderBy('id','DESC')->whereBetween('created_at', [$monthStartDate, $monthEndDate])->count();

                        } else if($result['filter'] == 'custom') {

                          $fromDate = $_GET['start_date'];
                          $toDate = $_GET['end_date'];
                          $smsCount = DB::table('shop_otp')->where('shop_id', $totuser->id)->orderBy('id','DESC')->whereBetween('created_at', [$fromDate, $toDate])->count(); 
                          $emailCount = DB::table('shop_mail')->where('shop_id', $totuser->id)->orderBy('id','DESC')->whereBetween('created_at', [$fromDate, $toDate])->count();

                        }
                      ?>
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><a href="{{ url('shoplistdashboard/'. $totuser->id) }}">{{ $totuser->first_name }}</a> <a target="_blank" href="https://{{ $totuser->shop_name}}.platinum24.net"  style="float:right"><i class="fas fa-external-link-alt"></i></a></td>
                        <td>{{ $smsCount }}</td>
                        <td>{{ $emailCount }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
