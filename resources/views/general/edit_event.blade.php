@extends('layout')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Event</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Event</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible">
            <button style="color:#fff" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> {{session('success')}}</h5>
          </div>
        @endif
        <div class="row">
          <div class="col-12">
            <form action="{{url('/update_event' )}}" method="post">
            {{ csrf_field() }}
              <div class="card card-info">
                <input type="hidden" name="id" value="{{ $editevent->id }}">
                <div class="col-6">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Event Name</label>
                      <input type="text" class="form-control" name="event_name" value="{{ $editevent->event_name }}" placeholder="Enter First Name" required>
                    </div>
                    <div class="form-group">
                      <label>Event Date</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="event_date" value="{{ $editevent->event_date }}" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Start Date" required>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                      <label>Event Time</label>
                      <div class="input-group date" id="timepicker" data-target-input="nearest">
                        <input type="text" name="event_time" value="{{ $editevent->event_time }}" class="form-control datetimepicker-input" data-target="#timepicker">
                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                    <button style="float:right" data-toggle="modal" data-target="#event-delete{{ $editevent->id }}" type="button" class="btn btn-danger">Delete</button>

                  </div>
                </div>
              </div>
            </form>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  <div class="modal fade" id="event-delete{{ $editevent->id }}">
    <form action="{{url('/delete_event')}}" method="post">
    {{ csrf_field() }}
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Event Delete</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you Want to delete event &hellip;</p>
            <input type="hidden" name="delid" value="{{ $editevent->id }}"/>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-primary">Yes</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  @endsection