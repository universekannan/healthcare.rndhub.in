@extends('layout')
@section('content')
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 4px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.row-padded {
        background-color: #F7F7F7;
        padding: 1px;
        margin: 4px;
        border: 1px solid #DDD;
        height: 25px;
    }

    .row-color {
        background-color: greenyellow;
        padding: 1px;
        margin: 4px;
        border: 1px solid #DDD;
        height: 25px;
    }
</style>

<div class="content-wrapper">
   <section class="content">
    <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
				
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">All Users</a>
                  </li>
				  
					<div class="col-sm-6">
                   <center> <div class="nav-link">User Permission List</div></center>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Customer Full Name">
					</div>
					<div class="col-sm-1">
						<td>
          <button type="button" class="btn btn-block btn-outline-danger btn-xs" data-toggle="modal" data-target="#userrole"><i class="fa fa-plus"> </i> Add</button>

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
                     <table id="example1" class="table table-bordered table-hover">
<thead>
<tr>
					<th>UserId</th>
					<th>User Type</th>
					<th>Full Name</th>
					<th>Gender</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Status</th>
					<th>Actions</th>
</tr>
</thead>
<tbody>
 @foreach($manageusers as $key=>$manageuserslist)
                      <tr id="arrayorder_<?php echo $manageuserslist->id?>">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $manageuserslist->user_types_name }}</td>
                         <td><a href="" data-toggle="modal" data-target="#edit{{ $manageuserslist->userID }}" >{{ $manageuserslist->full_name }}</a></td>
                        <td>{{ $manageuserslist->gender }}</td>
                        <td>{{ $manageuserslist->email }}</td>
                        <td>{{ $manageuserslist->mobile_number}}</td>
                        @if($manageuserslist->status == 1)
                            <td>Active</td>
                        @else
                            <td>Inactive</td>
                        @endif     
						 <td>
						 	                           <div class="btn-group dropdown">
						 	                 <button type="button" class="btn btn-default btn-outline-danger btn-xs fa fa-eye" data-toggle="modal" data-target="#permissions{{ $manageuserslist->user_id }}">
</button>    	
                                <button type="button" class="btn btn-default btn-outline-danger btn-xs" data-toggle="modal" data-target="#permissions{{ $manageuserslist->user_id }}">Permission</button>

</div>
                           
                        </td>
<div class="modal fade" id="permissions{{ $manageuserslist->user_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
   <form action="{{url('/addroles')}}" method="post">
      {{ csrf_field() }}
	  
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Add Permission</h5>
		
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span></button>
            </div>
			   <div class="modal-body">
   <input type="hidden" class="form-control" name="user_id" value="{{ $manageuserslist->user_id }}"/>

         <div class="card card-success ">
            <div class="card-body ">

             <div class="row row-color">
            		<label class="col-sm-4">Dashboard</label>
            	</div>

            	<div class="row row-padded">
            		<label for="dashboard" class="col-sm-2">1</label>
            		<label for="dashboard" class="col-sm-8">Dashboard</label>
            			@if($manageuserslist->dashboard == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="dashboard" id="dashboard" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="dashboard" id="dashboard"></label>
            			@endif
            	</div>
               
               <div class="row row-color">
            		<label class="col-sm-4">Roles</label>
            	</div>

            	<div class="row row-padded">
            		<label for="roles" class="col-sm-2">2</label>
            		<label for="roles" class="col-sm-8">Roles</label>
            			@if($manageuserslist->roles == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="roles" id="roles" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="roles" id="roles"></label>
            			@endif
            	</div>

            	<div class="row row-padded">
            		<label for="addrole" class="col-sm-2">3</label>
            		<label for="addrole" class="col-sm-8">Add Role</label>
            			@if($manageuserslist->addrole == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="addrole" id="addrole" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="addrole" id="addrole"></label>
            			@endif
            	</div>

            	<div class="row row-padded">
            		<label for="editrole" class="col-sm-2">4</label>
            		<label for="editrole" class="col-sm-8">Edit Role</label>
            			@if($manageuserslist->editrole == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="editrole" id="editrole" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="editrole" id="editrole"></label>
            			@endif
            	</div>

            	<div class="row row-padded">
            		<label for="deleterole" class="col-sm-2">5</label>
            		<label for="deleterole" class="col-sm-8">Delete Role</label>
            			@if($manageuserslist->deleterole == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="deleterole" id="deleterole" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="deleterole" id="deleterole"></label>
            			@endif
            	</div>
                
                <div class="row row-color">
            		<label class="col-sm-4">Users</label>
            	</div>

            	<div class="row row-padded">
            		<label for="users" class="col-sm-2">6</label>
            		<label for="users" class="col-sm-8">Users</label>
            			@if($manageuserslist->users == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="users" id="users" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="users" id="users"></label>
            			@endif
            	</div>

            	<div class="row row-padded">
            		<label for="adduser" class="col-sm-2">7</label>
            		<label for="adduser" class="col-sm-8">Add User</label>
            			@if($manageuserslist->adduser == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="adduser" id="adduser" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="adduser" id="adduser"></label>
            			@endif
            	</div>

            	<div class="row row-padded">
            		<label for="edituser" class="col-sm-2">8</label>
            		<label for="edituser" class="col-sm-8">Edit User</label>
            			@if($manageuserslist->edituser == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="edituser" id="edituser" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="edituser" id="edituser"></label>
            			@endif
            	</div>

            	<div class="row row-padded">
            		<label for="deleteuser" class="col-sm-2">9</label>
            		<label for="deleteuser" class="col-sm-8">Delete User</label>
            			@if($manageuserslist->deleteuser == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="deleteuser" id="deleteuser" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="deleteuser" id="deleteuser"></label>
            			@endif
            	</div>
               
               <div class="row row-color">
            		<label class="col-sm-4">Patients</label>
            	</div>

            	<div class="row row-padded">
            		<label for="patients" class="col-sm-2">10</label>
            		<label for="patients" class="col-sm-8">Patients</label>
            			@if($manageuserslist->patients == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="patients" id="patients" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="patients" id="patients"></label>
            			@endif
            	</div>

            	<div class="row row-padded">
            		<label class="col-sm-2">11</label>
            		<label class="col-sm-8">Add Patient</label>
            			@if($manageuserslist->addpatient == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="addpatient" id="addpatient" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="addpatient" id="addpatient"></label>
            			@endif
            	</div>

            	<div class="row row-padded">
            		<label class="col-sm-2">12</label>
            		<label class="col-sm-8">Edit Patient</label>
            			@if($manageuserslist->editpatient == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="editpatient" id="editpatient" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="editpatient" id="editpatient"></label>
            			@endif
            	</div>

            	<div class="row row-padded">
            		<label class="col-sm-2">13</label>
            		<label class="col-sm-8">Delete Patient</label>
            			@if($manageuserslist->deletepatient == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="deletepatient" id="deletepatient" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="deletepatient" id="deletepatient"></label>
            			@endif
            	</div>
                
                <div class="row row-color">
            		<label class="col-sm-4">Blocks</label>
            	</div>

            	<div class="row row-padded">
            		<label class="col-sm-2">14</label>
            		<label class="col-sm-8">Blocks</label>
            			@if($manageuserslist->blocks == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="blocks" id="blocks" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="blocks" id="blocks"></label>
            			@endif
            	</div>

            	<div class="row row-padded">
            		<label class="col-sm-2">15</label>
            		<label class="col-sm-8">Add Block</label>
            			@if($manageuserslist->addblock == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="addblock" id="addblock" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="addblock" id="addblock"></label>
            			@endif
            	</div>

            	<div class="row row-padded">
            		<label class="col-sm-2">16</label>
            		<label class="col-sm-8">Edit Block</label>
            			@if($manageuserslist->editblock == 1)
            			<label class="col-sm-1"><input value="1" type="checkbox" name="editblock" id="editblock" checked></label>
            			@else
            			<label class="col-sm-1"><input value="1" type="checkbox" name="editblock" id="editblock"></label>
            			@endif
            	</div>
			   
			   <div class="row row-padded">
			   <label class="col-sm-2">17</label>
			   <label class="col-sm-8">Delete Block</label>
			@if($manageuserslist->deleteblock == 1)
			   <label class="col-sm-1"><input value="1" type="checkbox" name="deleteblock" id="deleteblock" checked></label>
            @else
			   <label class="col-sm-1"><input value="1" type="checkbox" name="deleteblock" id="deleteblock"></label>
            @endif
        </div>
            
            <div class="row row-color">
            		<label class="col-sm-4">Rooms</label>
            	</div>

          <div class="row row-padded">
			   <label class="col-sm-2">18</label>
			   <label class="col-sm-8">Rooms</label>
			@if($manageuserslist->rooms == 1)
			   <label class="col-sm-1"><input value="1" type="checkbox" name="rooms" id="rooms" checked></label>
            @else
			   <label class="col-sm-1"><input value="1" type="checkbox" name="rooms" id="rooms"></label>
            @endif
         </div>

           <div class="row row-padded">
			   <label class="col-sm-2">19</label>
			   <label class="col-sm-8">Add Room</label>
			@if($manageuserslist->addroom == 1)
			   <label class="col-sm-1"><input value="1" type="checkbox" name="addroom" id="addroom" checked></label>
            @else
			   <label class="col-sm-1"><input value="1" type="checkbox" name="addroom" id="addroom"></label>
            @endif
        </div>

        <div class="row row-padded">
			   <label class="col-sm-2">20</label>
			   <label class="col-sm-8">Edit Room</label>
			@if($manageuserslist->editroom == 1)
			   <label class="col-sm-1"><input value="1" type="checkbox" name="editroom" id="editroom" checked></label>
            @else
			   <label class="col-sm-1"><input value="1" type="checkbox" name="editroom" id="editroom"></label>
            @endif
        </div>

			<div class="row row-padded">
			<label class="col-sm-2">21</label>
			   <label class="col-sm-8">Delete Room</label>
			@if($manageuserslist->deleteroom == 1)
			   <label class="col-sm-1"><input value="1" type="checkbox" name="deleteroom" id="deleteroom" checked></label>
            @else
			   <label class="col-sm-1"><input value="1" type="checkbox" name="deleteroom" id="deleteroom"></label>
            @endif
        </div> 

        <div class="row row-color">
            		<label class="col-sm-4">Admission</label>
            	</div>

          <div class="row row-padded">
			<label class="col-sm-2">22</label>
			   <label class="col-sm-8">Admission</label>
			@if($manageuserslist->admission == 1)
			   <label class="col-sm-1"><input value="1" type="checkbox" name="admission" id="admission" checked></label>
            @else
			   <label class="col-sm-1"><input value="1" type="checkbox" name="admission" id="admission"></label>
            @endif
        </div>

        <div class="row row-color">
            		<label class="col-sm-4">Billing</label>
            	</div>

          <div class="row row-padded">
			<label class="col-sm-2">23</label>
			   <label class="col-sm-8">Billing</label>
			@if($manageuserslist->billing == 1)
			   <label class="col-sm-1"><input value="1" type="checkbox" name="billing" id="billing" checked></label>
            @else
			   <label class="col-sm-1"><input value="1" type="checkbox" name="billing" id="billing"></label>
            @endif
        </div>
        
        <div class="row row-color">
            		<label class="col-sm-4">Pharmacy</label>
            	</div>

      <div class="row row-padded">
			<label class="col-sm-2">24</label>
			   <label class="col-sm-8">Pharmacy</label>
			@if($manageuserslist->pharmacy == 1)
			   <label class="col-sm-1"><input value="1" type="checkbox" name="pharmacy" id="pharmacy" checked></label>
            @else
			   <label class="col-sm-1"><input value="1" type="checkbox" name="pharmacy" id="pharmacy"></label>
            @endif
        </div>

        <div class="row row-color">
            		<label class="col-sm-4">Investigation</label>
            	</div>

        <div class="row row-padded">
			<label class="col-sm-2">25</label>
			   <label class="col-sm-8">Investigation</label>
			@if($manageuserslist->investigation == 1)
			   <label class="col-sm-1"><input value="1" type="checkbox" name="investigation" id="investigation" checked></label>
            @else
			   <label class="col-sm-1"><input value="1" type="checkbox" name="investigation" id="investigation"></label>
            @endif
          </div>

          <div class="row row-color">
            		<label class="col-sm-4">OT</label>
            	</div>

          <div class="row row-padded">
			<label class="col-sm-2">26</label>
			   <label class="col-sm-8">OT</label>
			@if($manageuserslist->ot == 1)
			   <label class="col-sm-1"><input value="1" type="checkbox" name="ot" id="ot" checked></label>
            @else
			   <label class="col-sm-1"><input value="1" type="checkbox" name="ot" id="ot"></label>
            @endif
        </div>

        <div class="row row-color">
            		<label class="col-sm-4">MRD</label>
            	</div>

          <div class="row row-padded">
			<label class="col-sm-2">27</label>
			   <label class="col-sm-8">MRD</label>
			@if($manageuserslist->mrd == 1)
			   <label class="col-sm-1"><input value="1" type="checkbox" name="mrd" id="mrd" checked></label>
            @else
			   <label class="col-sm-1"><input value="1" type="checkbox" name="mrd" id="mrd"></label>
            @endif
        </div>

        <div class="row row-color">
            		<label class="col-sm-4">Appointments</label>
            	</div>

          <div class="row row-padded">
			<label class="col-sm-2">28</label>
			   <label class="col-sm-8">Appointments</label>
			@if($manageuserslist->appointments == 1)
			   <label class="col-sm-1"><input value="1" type="checkbox" name="appointments" id="appointments" checked></label>
            @else
			   <label class="col-sm-1"><input value="1" type="checkbox" name="appointments" id="appointments"></label>
            @endif
        </div>
               <div class="row row-color">
            		<label class="col-sm-4">MIS</label>
            	</div>

          <div class="row row-padded">
			<label class="col-sm-2">29</label>
			   <label class="col-sm-8">MIS</label>
			@if($manageuserslist->mis == 1)
			   <label class="col-sm-1"><input value="1" type="checkbox" name="mis" id="mis" checked></label>
            @else
			   <label class="col-sm-1"><input value="1" type="checkbox" name="mis" id="mis"></label>
            @endif
        </div>
			
            </div>
         </div>
      </div>
	<div class="modal-footer justify-content-between">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Submit</button>
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
         </div>
     </section>
</div>
@endsection
<div class="modal fade" id="userrole">
<form action="{{url('/roles')}}" method="post">
{{ csrf_field() }}
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Add User Role</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
            <div class="modal-body">
        	    <div class="row">
			    <div class="col-md-6">   
                  <input type="text" class="form-control mb-3" name="user_types_name" placeholder="User Role Name"/>
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
<script src="{!! asset('plugins/jquery/jquery.min.js') !!}"></script>
<script src="{!! asset('dist/js/pages/dashboard2.js') !!}"></script>
<script>
$(".scroll-modal-top").click(function() {
    $("#modalId").scrollTop(0);
});

$(".scroll-page-top").click(function() {
    $("html,body").scrollTop($("#modalId").offset().top);
});
</script>
<script>
function myFunction() {
  const input = document.getElementById("myInput");
  const inputStr = input.value.toUpperCase();
  document.querySelectorAll('#example2 tr:not(.header)').forEach((tr) => {
    const anyMatch = [...tr.children]
      .some(td => td.textContent.toUpperCase().includes(inputStr));
    if (anyMatch) tr.style.removeProperty('display');
    else tr.style.display = 'none';
  });
}
</script>
