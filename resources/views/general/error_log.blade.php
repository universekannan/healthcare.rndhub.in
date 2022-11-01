
@extends('layout')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Error Log</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Error Log</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="container-fluid mb-3">
              <form action="{{ url('error_log/') }}" method="get"> 
                <div class="row">
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="date" <?php if(isset($_GET['date'])){echo 'value="'.$_GET['date'].'"';} ?> class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Date">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-3">
                    <input type="text" name="domain_name"  class="form-control" <?php if(isset($_GET['domain_name'])){echo 'value="'.$_GET['domain_name'].'"';} ?> placeholder="Domain Name">
                  </div>
                  <div class="col-12 col-sm-6 col-md-3">
                    <input type="text" name="status_code"  class="form-control" <?php if(isset($_GET['status_code'])){echo 'value="'.$_GET['status_code'].'"';} ?> placeholder="Status Code">
                  </div>
                  <!-- <div class="col-12 col-sm-6 col-md-3">
                    <input type="text" name="domain_name"  class="form-control" <?php //if(isset($_GET['domain_name'])){echo 'value="'.$_GET['domain_name'].'"';} ?> placeholder="domain name">
                  </div> -->
                  <div class="col-12 col-sm-6 col-md-3">
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            
            <div class="card">
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Domain Name</th>
                    <th>Message</th>
                    <th>Status Code</th>
                    <th>Created Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($errorLog as $key=>$errLog)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $errLog->domain_name }}</td>
                        <td>{{ $errLog->message }}</td>
                        <td>{{ $errLog->code }}</td>
                        <td>{{ $errLog->created_at }}</td>
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