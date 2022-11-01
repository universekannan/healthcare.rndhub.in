<style>
  .toaster-success {
    width:200px;
    height:20px;
    height:auto;
    position:absolute;
    right:0;
    margin-left:-100px;
    top:0;
    background-color: #35bc7a;
    color: #F0F0F0;
    font-family: Calibri;
    font-size: 20px;
    padding:10px;
    text-align:center;
    -webkit-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
    -moz-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
    box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
    z-index: 999;
}
.toaster-danger {
    width:200px;
    height:20px;
    height:auto;
    position:absolute;
    right:0;
    margin-left:-100px;
    top:0;
    background-color: #e74c3c;
    color: #F0F0F0;
    font-family: Calibri;
    font-size: 20px;
    padding:10px;
    text-align:center;
    -webkit-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
    -moz-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
    box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
    z-index: 999;
}
</style>

@extends('layout')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Domain Request List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Domain Request List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class='toaster-danger' style='display:none'>Domain Not Pointed</div>
    <div class='toaster-success' style='display:none'>Domain  Pointed</div>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @if(session('success'))
              <div class="alert alert-danger alert-dismissible">
                <button style="color:#fff" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> {{session('success')}}</h5>
              </div>
            @endif

            <div class="card">
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Shop Name</th>
                    <th>Current Domain</th>
                    <th>Request Domain</th>
                    <th>A Record</th>
                    <th>Created Date</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($domain as $key=>$domainList)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><a  href="{{ url('shoplistdashboard/'. $domainList->shop_id) }}">{{ $domainList->shop_name }}</a></td>
                        <td><a target="_blank" href="{{ $domainList->current_domain }}">{{ $domainList->current_domain}}</a></td>
                        <td><a target="_blank" href="https://{{ $domainList->shop_domain_name }}">{{ $domainList->shop_domain_name }}</a></td>
                        <td>
                          <div style="display:none" id="arecstatus<?php echo $domainList->scdID;?>"></div>
                          @if($domainList->arecord == 1)
                            <div id="arecsta<?php echo $domainList->scdID;?>">Yes</div>
                          @else
                            <div id="arecsta<?php echo $domainList->scdID;?>">No</div>
                          @endif
                        </td>
                        <td>{{ date('Y-m-d',strtotime($domainList->created_at))}}</td>
                        <td> 
                          <button style="display:none" type="button" data-toggle="modal" data-target="#modal-default{{ $domainList->scdID }}" class="btn btn-block btn-danger pendingButton<?php echo $domainList->scdID;?>">Pending</button>
                          @if($domainList->assign_status == 0 && $domainList->arecord == 1)
                            <button  type="button" data-toggle="modal" data-target="#modal-default{{ $domainList->scdID }}" class="btn btn-block btn-danger pendingButton<?php echo $domainList->scdID;?>">Pending</button>
                          @elseif($domainList->assign_status == 1)
                            <button style="color:#fff" type="button" data-toggle="modal" data-target="#modal-default{{ $domainList->scdID }}" class="btn btn-block btn-warning">Processing</button>
                          @elseif($domainList->assign_status == 2)
                            <button type="button" class="btn btn-block btn-success">Completed</button>
                          @endif
                          @if($domainList->assign_status == 0 && $domainList->arecord == 0)
                            <button  type="button" onclick="domainRefresh('<?php echo $domainList->scdID;?>','<?php echo $domainList->shop_domain_name; ?>')" class="btn btn-block btn-info refreshButton<?php echo $domainList->scdID;?>">Refresh <i class="fa fa-sync-alt"></i></button>
                          @endif
                        </td>
                      </tr>

                      <div class="modal fade" id="modal-default{{ $domainList->scdID }}">
                        <form action="{{url('/domainstatus_change')}}" method="post">
                        {{ csrf_field() }}
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Domain Request Status Change</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Are you Want to Change Status &hellip;</p>
                                <input type="hidden" name="id" value="{{ $domainList->scdID }}"/>
                                <input type="hidden" name="shop_id" value="{{ $domainList->shop_id }}"/>
                                <input type="hidden" name="shop_name" value="{{ $domainList->shop_name }}"/>
                                <input type="hidden" name="request_domain" value="{{ $domainList->shop_domain_name }}"/>

                                <?php 
                                    $superadmin = DB::table('users')->where('id',1)->first();
                                    $admin = auth()->user();
                                    //print_r($admin);die();
                                ?>

                                <select id="changeStatus" class="form-control" name="status_id" required>
                                  <option value="">Select Status</option>
                                  @if($superadmin->role_id == $admin->role_id)
                                    <option <?php if($domainList->assign_status == 0){ echo "selected"; } ?> value="0">Pending</option>
                                    <option <?php if($domainList->assign_status == 1){ echo "selected"; } ?> value="1">Processing</option>
                                  @else
                                    <option <?php if($domainList->assign_status== 2){ echo "selected"; } ?> value="2">Completed</option>
                                  @endif
                                </select>
                              </div>
                              <div class="modal-body">
                                <select id="role" class="form-control" name="role_id" style="<?php if($domainList->assign_status == 1 && $superadmin->role_id == $admin->role_id){ echo "display:block"; } else{ echo "display:none"; } ?>">
                                  <option value="">Select Developer</option>
                                  @foreach($developerRole as $devRole)
                                    <option <?php if($devRole->id == $domainList->dev_id){ echo "selected"; } ?> value="{{ $devRole->id }}">{{ $devRole->first_name }} {{ $devRole->last_name }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
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