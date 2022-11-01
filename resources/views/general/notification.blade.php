@extends('layout')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Notification List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">All Notification List</li>
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
                    <th>Shop Name</th>
                    <th>Comments</th>
                    <th>Read Note</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($notificationList as $key=>$notiList)
                      @if($notiList->comments == 'Domain Request')
                        <tr>
                          <td>{{ $key + 1 }}</td>
                          <td>{{ $notiList->shop_name }}</td>
                          <td>{{ $notiList->comments }}</td>
                          @if( $notiList->status == 0)
                            <td>Yes</td>
                          @else
                            <td>No</td>
                          @endif
                          <td>{{ $notiList->created_at }}</td>
                          <td>
                            <a href="{{ url('notification_update/domainrequest/'.$notiList->id) }}">
                              <button type="button" class="btn btn-block btn-success"><i class="fa fa-eye"> View</i></button>
                            </a>
                          </td>
                        </tr>
                      @elseif($notiList->comments == 'Domain Expired')
                          <tr>
                          <input type="hidden" name="shop_id" value="{{ $notiList->shop_id }}"/>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $notiList->shop_name }}</td>
                            <td>{{ $notiList->comments }}</td>
                            @if( $notiList->status == 0)
                              <td>Yes</td>
                            @else
                              <td>No</td>
                            @endif
                            <td>{{ $notiList->created_at }}</td>
                            <td>
                              <a href="{{ url('notification_update/domainexpired/'.$notiList->id) }}">
                                <button type="button" class="btn btn-block btn-success"><i class="fa fa-eye"> View</i></button>
                              </a>
                            </td>
                          </tr>
                      @elseif($notiList->comments == 'Facebook Pending')
                          <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $notiList->shop_name }}</td>
                            <td>{{ $notiList->comments }}</td>
                            @if( $notiList->status == 0)
                              <td>Yes</td>
                            @else
                              <td>No</td>
                            @endif
                            <td>{{ $notiList->created_at }}</td>
                            <td>
                              <a href="{{ url('notification_update/facebook/'.$notiList->id) }}">
                                <button type="button" class="btn btn-block btn-success"><i class="fa fa-eye"> View</i></button>
                              </a>
                            </td>
                          </tr>
                      @elseif($notiList->comments == 'Google Pending')
                          <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $notiList->shop_name }}</td>
                            <td>{{ $notiList->comments }}</td>
                            @if( $notiList->status == 0)
                              <td>Yes</td>
                            @else
                              <td>No</td>
                            @endif
                            <td>{{ $notiList->created_at }}</td>
                            <td>
                              <a href="{{ url('notification_update/google/'.$notiList->id) }}">
                                <button type="button" class="btn btn-block btn-success"><i class="fa fa-eye"> View</i></button>
                              </a>
                            </td>
                          </tr>
                        @elseif($notiList->comments == 'Tickets')
                          <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $notiList->shop_name }}</td>
                            <td>{{ $notiList->comments }}</td>
                            @if( $notiList->status == 0)
                              <td>Yes</td>
                            @else
                              <td>No</td>
                            @endif
                            <td>{{ $notiList->created_at }}</td>
                            <td>
                              <a href="{{ url('notification_update/tickets/'.$notiList->id) }}">
                                <button type="button" class="btn btn-block btn-success"><i class="fa fa-eye"> View</i></button>
                              </a>
                            </td>
                          </tr>
                      @endif
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