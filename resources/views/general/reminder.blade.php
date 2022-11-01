@extends('layout')
  @section('content')
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Reminder List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Reminder List</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2 mb-3">
                <button style="color:#fff" type="button" data-toggle="modal" data-target="#modal-event" class="btn btn-block btn-info">Add Event</button>
            </div>
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-body p-0">
                  <div id="calendar"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <div class="modal fade" id="modal-event">
      <form action="{{url('/add_event')}}" method="post">
      {{ csrf_field() }}
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Event</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="text" class="form-control" name="event_name" placeholder="Enter Event Name" required/>
            </div>
            <div class="modal-body">
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <input type="text" name="event_date" value="<?php echo date('Y-m-d');?>" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Start Date" required>
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
            </div>
            <div class="modal-body">
              <div class="input-group date" id="timepicker" data-target-input="nearest">
                <input type="text" name="event_time" value="<?php echo date('H:i:s');?>" class="form-control datetimepicker-input" data-target="#timepicker">
                <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  @endsection

  <script src="{!! asset('plugins/jquery/jquery.min.js') !!}"></script>


<script>
  $(function () {

    // var reminder_data = <?php //echo $jenco;?>

    // console.log(reminder_data);

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------


    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: 'calandar_data',
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
     //$('#calendar').fullCalendar()
   
  })
</script>
