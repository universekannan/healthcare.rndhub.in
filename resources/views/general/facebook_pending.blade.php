@extends('layout')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Facebook Pending List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Facebook Pending List</li>
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
            <div class="card">
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Expired Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($fbPending as $key=>$fbpendresult)
                        <tr>
                          <td>{{ $key + 1 }}</td>
                          <td><a href="{{ url('shoplistdashboard/'. $fbpendresult->id) }}">{{ $fbpendresult->first_name }}</a> <a target="_blank" href="{{ $fbpendresult->current_domain}}"  style="float:right"><i class="fas fa-external-link-alt"></i></a></td>
                          <td>{{ $fbpendresult->email }}</td>
                          <td>{{ date('Y-m-d',strtotime($fbpendresult->end_date))}}</td>
                          <td><button type="button" data-toggle="modal" data-target="#modal-default{{ $fbpendresult->id }}" class="btn btn-block btn-success">Update Data</button></td>
                        </tr>

                        <div class="modal fade" id="modal-default{{ $fbpendresult->id }}">
                          <form action="{{url('/facebook_update')}}" method="post">
                          {{ csrf_field() }}
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Facebook Data Update</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden" name="id" value="{{ $fbpendresult->aid }}"/>
                                  <input type="hidden" name="user_id" value="{{ $fbpendresult->user_id }}"/>
                                  <input type="text" class="form-control mb-3" name="facebook_app_id" value="{{ $fbpendresult->facebook_app_id }}" placeholder="Enter facebook App Id" required/>
                                  <input type="text" class="form-control mb-3" name="facebook_secret_id" value="{{ $fbpendresult->facebook_secret_id }}" placeholder="Enter facebook secret key" required/>
                                  <input type="url" class="form-control mb-3" name="facebook_callback_url" value="{{ $fbpendresult->facebook_callback_url }}" placeholder="Enter facebook callback url" required/>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
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