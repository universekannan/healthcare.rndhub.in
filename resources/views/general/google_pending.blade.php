@extends('layout')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Google Pending List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Google Pending List</li>
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
                    @foreach($googlePending as $key=>$gpendresult)
                        <tr>
                          <td>{{ $key + 1 }}</td>
                          <td><a href="{{ url('shoplistdashboard/'. $gpendresult->id) }}">{{ $gpendresult->first_name }}</a> <a target="_blank" href="{{ $gpendresult->current_domain}}"  style="float:right"><i class="fas fa-external-link-alt"></i></a></td>
                          <td>{{ $gpendresult->email }}</td>
                          <td>{{ date('Y-m-d',strtotime($gpendresult->end_date))}}</td>
                          <td><button type="button" data-toggle="modal" data-target="#modal-default{{ $gpendresult->id }}" class="btn btn-block btn-success">Update Data</button></td>
                        </tr>

                        <div class="modal fade" id="modal-default{{ $gpendresult->id }}">
                          <form action="{{url('/google_update')}}" method="post">
                          {{ csrf_field() }}
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Google Data Update</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden" name="id" value="{{ $gpendresult->aid }}"/>
                                  <input type="hidden" name="user_id" value="{{ $gpendresult->user_id }}"/>
                                  <input type="text" class="form-control mb-3" name="google_app_id" value="{{ $gpendresult->google_app_id }}"  placeholder="Enter google App Id" required/>
                                  <input type="text" class="form-control mb-3" name="google_secret_id" value="{{ $gpendresult->google_secret_id }}"  placeholder="Enter google secret key" required/>
                                  <input type="url" class="form-control mb-3" name="google_callback_url" value="{{ $gpendresult->google_callback_url }}"  placeholder="Enter google callback url" required/>
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