
@extends('layout')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Version Logs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">All Version Logs</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div  class="col-md-3"><button type="button" data-toggle="modal" data-target="#modal-default"  class="btn btn-block btn-success">Add Logs</button></div>
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h2>Platinum 24 Online Version History and Changelog :</h2>
                <hr style="border-bottom:1px solid #fff" >
                @foreach($versionLog as $key=>$verLog)
                  <p><?php echo $key + 1; ?> . <?php if($verLog->version_name == 1){ ?> New version <?php } else { ?> Old version <?php } ?>: Platinum 24 Online <?php echo $verLog->update_version;?> ( Updated : <?php echo date("M d , Y", strtotime($verLog->created_at));?> )</p>
                  <p style="margin-left:20px"><?php echo $verLog->version_reason; ?></p>
                @endforeach
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

  <div class="modal fade" id="modal-default">
        <form action="{{url('/version_logs_insert')}}" method="post">
        {{ csrf_field() }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Add Version Logs</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="name">Update Version</label>
                    <input class="form-control"  type="text" name="update_version" placeholder="Enter Update Version" required>
                  </div>

                  <div class="form-group">
                    <label for="name">Reason</label>
                    <textarea class="form-control" rows="5" type="text" name="update_reason" placeholder="Enter Reason" required></textarea>
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
        </form>
    </div>