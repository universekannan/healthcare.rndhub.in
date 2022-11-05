@extends('layout')
@section('content')
<div class="content-wrapper">
   <section class="content">
    <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">All Users</a>
                  </li>

                  <div class="col-sm-6">
                   <center> <div class="nav-link">User List</div></center>
                    </div>
                    <div class="col-sm-4" style="padding-top: calc(.5rem + 0px);">
                        <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Customer Full Name">
                    </div>
                    <div class="col-sm-1" style="padding-top: calc(.5rem + 0px);">
                        <td>

<button type="button" class="btn btn-block btn-outline-danger btn-xs" data-toggle="modal" data-target="#adduser"><i class="fa fa-plus"> </i> Add</button>
</td>
                    </div>
                </ul>
              </div>
              <div class="card-body">
                 @if(session()->has('success'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" style="color:white !important" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> {{ session('success') }} </strong>
            </div>
        @endif
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                <table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
                    <th>#ID</th>
                    <th>User Type</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($manageusers as $key=>$manageuserslist)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $manageuserslist->user_types_name }}</td>
                        <td>{{ $manageuserslist->full_name }}</a></td>
                        <td>{{ $manageuserslist->gender }}</td>
                        <td>{{ $manageuserslist->email }}</td>
                        <td>{{ $manageuserslist->mobile_number }}</td>
                        @if($manageuserslist->status == 1)
                          <td>Active</td>
                        @else
                          <td>Inactive</td>
                        @endif
                        <td>
                          @if($manageuserslist->user_types_id !=1 )
                            
                           <div class="btn-group dropdown">

<button type="button" class="btn btn-default btn-outline-danger btn-xs fa fa-eye" data-toggle="dropdown">
</button>
<button type="button" class="btn btn-default btn-outline-danger btn-xs">Action</button>

<div class="dropdown-content">
<a href="" data-toggle="modal" data-target="#edit{{ $manageuserslist->userID }}">Edit Profile</a>
<a href="{{url('/users/attendance/'.$manageuserslist->userID)}}" > Attendance</a>
</div>
</div>
                       
                          @endif
                        </td>
                        <div class="modal fade" id="edit{{ $manageuserslist->userID }}">
                            <form action="{{url('/edit_user')}}" method="post">
                            {{ csrf_field() }}
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                    <h4 class="modal-title">Edit User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                  
                                    <div class="modal-body">
                                      <div class="row">
                                         <div class="col-md-6">   
                  <input type="hidden" class="form-control" name="id" value="{{ $manageuserslist->userID }}"/>

                  <input value="{{ $manageuserslist->first_name }}" type="text" class="form-control mb-3" name="first_name" placeholder="Enter First Name"/>

                  <input value="{{ $manageuserslist->email }}"type="email" class="form-control mb-3" name="email" placeholder="Enter Email"/>
                          <div class="form-group">
  <select name="gender" class="form-control">
                                            <option value="Male" <?php if($manageuserslist->gender == 1){ echo "selected"; }?>>Male</option>
                                            <option value="Female" <?php if($manageuserslist->gender == 0){ echo "selected"; }?>>Female</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                  <select name="user_types_id" class="form-control">
                   @foreach($userrole as $key=>$userroles)
                                                 <option value="{{ $userroles->id }}" <?php if($userroles->id == $manageuserslist->user_types_id){ echo "selected"; }?>>{{ $userroles->user_types_name }}</option>
                                             @endforeach
                                        </select>

                   </div>
                </div>
                <div class="col-md-6">   
                  <input value="{{ $manageuserslist->last_name }}" type="text" class="form-control mb-3" name="last_name" placeholder="Enter Last Name"/>

                  <input value="{{ $manageuserslist->mobile_number }}" type="text" class="form-control mb-3" name="mobile_number" placeholder="Enter Mobile Number"/>
  <div class="form-group">
    <select name="status" class="form-control">
                                            <option value="1" <?php if($manageuserslist->status == 1){ echo "selected"; }?>>Active</option>
                                            <option value="0" <?php if($manageuserslist->status == 0){ echo "selected"; }?>>Inactive</option>
                                        </select>
 </div>
                  <textarea name='address' class="form-control" rows="3" placeholder="Enter Address..." >{{ $manageuserslist->address }}</textarea>
                </div>  
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
                         </tr>
                       

                      @endforeach

</tbody>
</table>
                  </div>
                </div>
              </div>

<div class="modal fade" id="adduser">
<form action="{{url('/add_user')}}" method="post">
{{ csrf_field() }}
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Add User</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
            <div class="modal-body">
                <div class="row">
                <div class="col-md-6">   
                  <input type="text" class="form-control mb-3" name="first_name" placeholder="Enter First Name"/>

                  <input onkeyup="duplicateEmail(0)" id="email" type="email" class="form-control mb-3" name="email" placeholder="Enter Email"/>
                  <span id="dupemail" style="color:red;font-size: 12px;"></span>

                  <input type="password" class="form-control mb-3" name="password" placeholder="Enter Password"/>

                 <select  class="form-control mb-3" name="user_types_id">
                      <option value="">Select User Type</option>
                   @foreach($userrole as $key=>$userrole)
                      <option value="{{ $userrole->id }}">{{ $userrole->user_types_name }}</option>
                  @endforeach
                  </select>
                   <select class="form-control mb-3" name="gender">
                    <option>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <div class="col-md-6">   
                  <input type="text" class="form-control mb-3" name="last_name" placeholder="Enter Last Name"/>

                  <input type="text" class="form-control mb-3" name="mobile_number" placeholder="Enter Mobile Number"/>

                  <input type="text" class="form-control mb-3" name="check_password" placeholder="Enter Conform Password"/>
                  <textarea name='address' class="form-control" rows="3" placeholder="Enter Address..." ></textarea>
                </div>      
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="save" type="submit" class="btn btn-primary">Submit</button>
        </div>
</div>
</div>
</div>
 </form>
</div>
                      
    
              <!-- /.card -->
            </div>
          </div>
    </section>
    <!-- /.content -->
 

  </div>
@endsection

