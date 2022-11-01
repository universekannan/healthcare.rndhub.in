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
</style>
			  <style>
    /* CSS comes here */
    #video {
        border: 1px solid black;
        width: 150px;
        height: 175px;
    }

    #photo {
        border: 1px solid black;
        width: 150px;
        height: 175px;
    }

    #canvas {
        display: none;
    }

    .camera {
        width: 150px;
        display: inline-block;
    }

    .output {
        width: 340px;
        display: inline-block;
    }

    #startbutton {
        display: block;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        bottom: 36px;
        padding: 5px;
        background-color: #6a67ce;
        border: 1px solid rgba(255, 255, 255, 0.7);
        font-size: 14px;
        color: rgba(255, 255, 255, 1.0);
        cursor: pointer;
    }

    .contentarea {
        font-size: 16px;
        font-family: Arial;
        text-align: center;
    }
    </style>
<div class="content-wrapper">
   <section class="content">
    <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
				
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">OP Patient</a>
                  </li>
				  
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">IP Patient</a>
                  </li>
				  
					<div class="col-sm-5">
                   <center> <div class="nav-link">Patients List</div></center>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Customer Full Name">
					</div>
					<div class="col-sm-1">
						<td>
<button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#addPatient"><i class="fa fa-plus"></i> Add</button>
</td>
					</div>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                     <table id="example1" class="table table-bordered table-hover">
<thead>
<tr>
<th>PatientId</th>
<th>Title</th>
<th>Name</th>
<th>Gender</th>
<th>Age</th>
<th>Relation</th>
<th>RoomNo</th>
<th>Village</th>
<th>Token#</th>
<th>Fees</th>
<th>Action</th>
</tr>
</thead>
<tbody>
                @foreach($manageoppatients as $key=>$manageoppatientslist)
                      <tr id="arrayorder_<?php echo $manageoppatientslist->id ?>">
                        <td>{{ $key + 1 }}</td>

                        <td>{{ $manageoppatientslist->disease_name }} fff</td>

						 <td><a href="" data-toggle="modal" data-target="#edit{{ $manageoppatientslist->userID }}" >{{ $manageoppatientslist->full_name }}</a></td>
                        <td>{{ $manageoppatientslist->gender }}</td>
                        <td>{{ $manageoppatientslist->age }}</td>
                        <td>{{ $manageoppatientslist->relation_name }}</td>
                        <td>{{ $manageoppatientslist->relation_name }}</td>
                        <td>{{ $manageoppatientslist->village_name }}</td>
                        <td>HC{{ $manageoppatientslist->id }}</td>
                        <td>{{ $manageoppatientslist->fees }}</td>
                        <td>
						<div class="btn-group dropdown">
<button type="button" class="btn btn-default fa fa-eye" data-toggle="dropdown">
</button>
<button type="button" class="btn btn-default">Action</button>

<div class="dropdown-content">
<a href="" data-toggle="modal" data-target="#edit{{ $manageoppatientslist->userID }}">Edit Profile</a>
<a href="" data-toggle="modal" data-target="#ipadmission{{ $manageoppatientslist->userID }}">IP Admission</a>
<a href="{{url('/appointments')}}/{{ $manageoppatientslist->userID }}">Appointments</a>
</div>
</div>
</td>
<div class="modal fade" id="edit{{ $manageoppatientslist->userID }}">
				<form action="{{url('/edit_patient')}}" method="post">
				{{ csrf_field() }}
				<div class="modal-dialog modal-xl">
				<div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title">Edit Patients</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				   <span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
                    <input type="hidden" class="form-control" name="id" value="{{ $manageoppatientslist->userID }}"/>

        	    <div class="row">
			    <div class="col-md-6">   
	  
                <div class="form-group row">
				<label for="profile_status" class="col-sm-4 col-form-label"><span style="color:red"></span>Patient Name</label>
									
				<div class="col-sm-3 custom-file">
				<select class="form-control select2bs4" name="profile_status" id="profile_status" style="width: 100%;" required="required">
				<option value="{{ $manageoppatientslist->profile_status }}">{{ $manageoppatientslist->profile_status }}</option>
				<option value="Mr">Mr</option>
				<option value="Ms">Ms</option>
				<option value="Daughter">Daughter</option>
				</select>
				</div>

				<div class="col-sm-5">
				<input  value="{{ $manageoppatientslist->full_name }}" required="required" type="text" class="form-control" name="full_name" id="full_name" maxlength="50" placeholder="Patient Full Name">
				</div>
				</div>
				<div class="form-group row">
				<label for="date_of_birth " class="col-sm-4 col-form-label"><span style="color:red"></span>
					Date Of Birth</label>
				<div class="col-sm-2">
				<input value="{{ $manageoppatientslist->year }}" required="required" type="text" class="form-control" name="year" id="year" maxlength="50" placeholder="YYYY">
				</div>
				<div class="col-sm-2">
				<input value="{{ $manageoppatientslist->month }}" required="required" type="text" class="form-control" name="month" id="month" maxlength="50" placeholder="MM">
				</div>
				<div class="col-sm-2">
				<input value="{{ $manageoppatientslist->days }}" required="required" type="text" class="form-control" name="days" id="days" maxlength="50" placeholder="DD">
				</div>
				<div class="col-sm-2">
				<input  value="{{ $manageoppatientslist->age }}" required="required" type="text" class="form-control" name="age" id="age" maxlength="50" placeholder="AGE">
				</div>
				</div>
				<div class="form-group row">
				<label for="gender" class="col-sm-4 col-form-label"><span style="color:red"></span>Gender</label>
				<div class="col-sm-4">
				<select class="form-control select2bs4" name="gender" id="gender" style="width: 100%;" required="required">
				  <option value="Mail" <?php if($manageoppatientslist->gender == 'Mail'){ echo "selected"; }?>>Mail</option>
                  <option value="Femail" <?php if($manageoppatientslist->gender == 'Femail'){ echo "selected"; }?>>Femail</option>
                  <option value="Transgender" <?php if($manageoppatientslist->gender == 'Transgender'){ echo "selected"; }?>>Transgender</option>
				</select>
				</div>
				<label for="age" class="col-sm-2 col-form-label"><span style="color:red"></span>Blood</label>
				<div class="col-sm-2">
				<select class="form-control select2bs4" name="blood_group" id="blood_group" style="width: 100%;" required="required">
				<option value="{{ $manageoppatientslist->blood_group }}">{{ $manageoppatientslist->blood_group }}</option>
				<option value="A+">A+</option>
				<option value="A1+">A1+</option>
				<option value="A2+">A2+</option>
				<option value="A-">A-</option>
				<option value="A1-">A1-</option>
				<option value="A2-">A2-</option>
				<option value="AB+">AB+</option>
				<option value="A1B+">A1B+</option>
				<option value="A2B+">A2B+</option>
				<option value="AB-">AB-</option>
				<option value="A1B-">A1B-</option>
				<option value="A2B-">A2B-</option>
				<option value="B+">B+</option>
				<option value="B-">B-</option>
				<option value="O+">O+</option>
				<option value="O-">O-</option>
				</select>
				</div>
				</div>
				<div class="form-group row">
				<label for="relation_name" class="col-sm-4 col-form-label"><span style="color:red"></span>
					Realation Name</label>
				<div class="col-sm-4">
				<input value="{{ $manageoppatientslist->relation_name }}" required="required" type="text" class="form-control" name="relation_name" id="relation_name" maxlength="50" placeholder="Relation Name">
				</div>
				<div class="col-sm-4 custom-file">
				<select class="form-control select2bs4" name="relationship" id="relationship" style="width: 100%;" required="required">
					 <option value="Brother" <?php if($manageoppatientslist->gender == 'Brother'){ echo "selected"; }?>>Brother</option>
					 <option value="Brother-In-Law" <?php if($manageoppatientslist->gender == 'Brother-In-Law'){ echo "selected"; }?>>Brother-In-Law</option>
					 <option value="Daughter" <?php if($manageoppatientslist->gender == 'Daughter'){ echo "selected"; }?>>Daughter</option>
					 <option value="Father" <?php if($manageoppatientslist->gender == 'Father'){ echo "selected"; }?>>Father</option>
					 <option value="Father-In-Law" <?php if($manageoppatientslist->gender == 'Father-In-Law'){ echo "selected"; }?>>Father-In-Law</option>
					 <option value="Grand Daughter" <?php if($manageoppatientslist->gender == 'Grand Daughter'){ echo "selected"; }?>>Grand Daughter</option>
					 <option value="Grand Father" <?php if($manageoppatientslist->gender == 'Grand Father'){ echo "selected"; }?>>Grand Father</option>
					 <option value="Grand Mother" <?php if($manageoppatientslist->gender == 'Grand Mother'){ echo "selected"; }?>>Grand Mother</option>
					 <option value="Grand Son" <?php if($manageoppatientslist->gender == 'Grand Son'){ echo "selected"; }?>>Grand Son</option>
					 <option value="Husband" <?php if($manageoppatientslist->gender == 'Husband'){ echo "selected"; }?>>Husband</option>
					 <option value="Mother" <?php if($manageoppatientslist->gender == 'Mother'){ echo "selected"; }?>>Mother</option>
					 <option value="Mother-In-Law" <?php if($manageoppatientslist->gender == 'Mother-In-Law'){ echo "selected"; }?>>Mother-In-Law</option>
					 <option value="Nephew" <?php if($manageoppatientslist->gender == 'Nephew'){ echo "selected"; }?>>Nephew</option>
					 <option value="Niece" <?php if($manageoppatientslist->gender == 'Niece'){ echo "selected"; }?>>Niece</option>
					 <option value="Sister" <?php if($manageoppatientslist->gender == 'Sister'){ echo "selected"; }?>>Sister</option>
					 <option value="Sister-In-Law" <?php if($manageoppatientslist->gender == 'Sister-In-Law'){ echo "selected"; }?>>Sister-In-Law</option>
					 <option value="Son" <?php if($manageoppatientslist->gender == 'Son'){ echo "selected"; }?>>Son</option>
					 <option value="Spouse" <?php if($manageoppatientslist->gender == 'Spouse'){ echo "selected"; }?>>Spouse</option>
					 <option value="Wife" <?php if($manageoppatientslist->gender == 'Wife'){ echo "selected"; }?>>Wife</option>

				</select>
				</div>
				</div>
				<div class="form-group row">
				<label for="street" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Street</label>
				<div class="col-sm-8">
				<input value="{{ $manageoppatientslist->street }}" required="required" type="text" class="form-control" name="street" id="street" maxlength="50" placeholder="Street">
				</div>
				</div>
			    <div class="form-group row">
				<label for="locality" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Locality</label>
				<div class="col-sm-8">
				<input value="{{ $manageoppatientslist->locality }}" required="required" type="text" class="form-control" name="locality" id="locality"
				maxlength="50" placeholder="locality">
				</div>
				</div>
				<div class="form-group row">
				<label for="village_name" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Village/CityName</label>
				<div class="col-sm-8">
				<input value="{{ $manageoppatientslist->village_name }}" required="required" type="text" class="form-control" name="village_name" id="village_name"
				maxlength="50" placeholder="village City Name">
				</div>
				</label>
			    </div>
				
				<div class="form-group row">
				<label for="aadhaar_no" class="col-sm-4 col-form-label"><span style="color:red"></span>Aadhaar No</label>
				<div class="col-sm-4">
				<input value="{{ $manageoppatientslist->aadhaar_no }}" required="required" type="text" class="form-control" name="aadhaar_no" id="aadhaar_no" maxlength="12" placeholder="Aadhaar No">
				</div>
				<div class="col-sm-4 custom-file">
				<input value="{{ $manageoppatientslist->aadhaarfile }}" type="file" class="custom-file-input" name="aadhaarfile" id="aadhaarfile">
				<label class="custom-file-label" for="aadhaarfile">Choose file</label>
					</div>
				    </div>	
					  <div class="form-group row">
				<label for="mobile_number" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Contact Number</label>
				<div class="col-sm-4">
				<input  value="{{ $manageoppatientslist->mobile_number }}"required="required" type="text" class="form-control" name="mobile_number" id="mobile_number"
				maxlength="50" placeholder="Mobile Number">
				</div>
				<div class="col-sm-4">
				<input value="{{ $manageoppatientslist->phone_number }}" required="required" type="text" class="form-control" name="phone_number" id="phone_number"
				maxlength="50" placeholder="Phone Number">
				</div>
				</div>
				</div>
				<div class="col-md-6">   

				<div class="form-group row">
				<label for="company" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Company</label>
				<div class="col-sm-6">
				<input value="{{ $manageoppatientslist->company }}" required="required" type="text" class="form-control" name="company" id="company" maxlength="50" placeholder="Company">
				</div>
				<div class="col-sm-2">
				<input value="{{ $manageoppatientslist->employe_id }}" required="required" type="text" class="form-control" name="employe_id" id="employe_id" maxlength="50" placeholder="Employe_id">
				</div>
				</div>

				<div class="form-group row">
				<label for="blood group" class="col-sm-4 col-form-label"><span style="color:red"></span>Patient Disease</label>
				<div class="col-sm-6">
				<select class="form-control select2bs4" name="disease" id="disease" style="width: 100%;" required="required">
				<option>Blood Group</option>
				</select>
				</div>
				<div class="col-sm-2">
				<select class="form-control select2bs4" name="status" id="status" style="width: 100%;" required="required">
					<option value="2" <?php if($manageoppatientslist->status == 2){ echo "selected"; }?>>O P</option>
					<option value="3" <?php if($manageoppatientslist->status == 3){ echo "selected"; }?>>I P</option>
				</select>
				</div>
				</div>
                <div class="form-group row">
				<label for="blood group" class="col-sm-4 col-form-label"><span style="color:red"></span>Doctors</label>
				<div class="col-sm-8">
				<select class="form-control select2bs4" name="disease" id="disease" style="width: 100%;" required="required">
				<option>Select Doctor</option>

 @foreach($managedoctor as $key=>$managedoctorlist)
					<option value="{{ $managedoctorlist->id }}">{{ $managedoctorlist->full_name }}</option>
				 @endforeach

				</select>
				</div>
				</div>
				
				
               <div class="form-group row">
				<label for="other_details" class="col-sm-4
				col-form-label">
				<span style="color:red"></span>Other Details</label>
				<div class="col-sm-8">
				<textarea row="4" required="required" type="text" class="form-control" name="other_details"
						id="other_details" maxlength="50" placeholder="Other Details">{{ $manageoppatientslist->other_details }}</textarea>
				</div>
				</div>
				<div class="form-group row">
					<label for="other_details" class="col-sm-4 col-form-label">
					<span style="color:red"></span>Profile Photo</label>
					<div class="col-sm-4">	
						 <div class="camera">
							<video id="video">Video stream not available.</video>
							<div><button id="startbutton">TakePhoto</button></div>
						</div>
					</div>
					<div class="col-sm-4">
						<canvas id="canvas"></canvas>
						<div class="output">
							<img id="photo" alt="The screen capture will appear in this box.">
						</div>
					</div>
				</div>
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



<div class="modal fade" id="ipadmission{{ $manageoppatientslist->userID }}">
				<form action="{{url('/ipadmission')}}" method="post">
				{{ csrf_field() }}
				<div class="modal-dialog modal-xl">
				<div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title">Edit Patients</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				   <span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
                    <input type="hidden" class="form-control" name="id" value="{{ $manageoppatientslist->id }}"/>

        	    <div class="row">
			    <div class="col-md-6">   
	  
                <div class="form-group row">
				<label for="profile_status" class="col-sm-4 col-form-label"><span style="color:red"></span>Patient Name</label>
									
				<div class="col-sm-3 custom-file">
				<select class="form-control select2bs4" name="profile_status" id="profile_status" style="width: 100%;" disabled="disabled">
				<option value="{{ $manageoppatientslist->profile_status }}">{{ $manageoppatientslist->profile_status }}</option>
				<option value="Mr">Mr</option>
				<option value="Ms">Ms</option>
				<option value="Daughter">Daughter</option>
				</select>
				</div>

				<div class="col-sm-5">
				<input  value="{{ $manageoppatientslist->full_name }}" required="required" type="text" class="form-control" name="full_name" id="full_name" disabled="disabled" maxlength="50" placeholder="Patient Full Name">
				</div>
				</div>
				<div class="form-group row">
				<label for="date_of_birth " class="col-sm-4 col-form-label"><span style="color:red"></span>
					Date Of Birth</label>
				<div class="col-sm-4">
				<input value="{{ $manageoppatientslist->year }}" required="required" type="text" disabled="disabled" class="form-control" name="year" id="year" maxlength="50" placeholder="YYYY">
				</div>
				<div class="col-sm-2">
				<input value="{{ $manageoppatientslist->month }}" required="required" type="text" disabled="disabled" class="form-control" name="month" id="month" maxlength="50" placeholder="MM">
				</div>
				<div class="col-sm-2">
				<input value="{{ $manageoppatientslist->days }}" required="required" type="text" disabled="disabled" class="form-control" name="days" id="days" maxlength="50" placeholder="DD">
				</div>
				</div>
				<div class="form-group row">
				<label for="gender" class="col-sm-4 col-form-label"><span style="color:red"></span>Gender</label>
				<div class="col-sm-4">
				<select class="form-control select2bs4" name="gender" id="gender" style="width: 100%;" required="required" disabled="disabled">
				<option value="{{ $manageoppatientslist->gender }}">{{ $manageoppatientslist->full_name }}</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="Transgender">Transgender</option>
				</select>
				</div>
				<label for="age" class="col-sm-2 col-form-label"><span style="color:red"></span>Age</label>
				<div class="col-sm-2">
				<input  value="{{ $manageoppatientslist->age }}" required="required" type="text" disabled="disabled" class="form-control" name="age" id="age" maxlength="50" placeholder="Ent">
				</div>
				</div>
				<div class="form-group row">
				<label for="relation_name" class="col-sm-4 col-form-label"><span style="color:red"></span>
					Realation Name</label>
				<div class="col-sm-4">
				<input value="{{ $manageoppatientslist->relation_name }}" required="required" type="text" disabled="disabled" class="form-control" name="relation_name" id="relation_name" maxlength="50" placeholder="Relation Name">
				</div>
				<div class="col-sm-4 custom-file">
				<select class="form-control select2bs4" name="relationship" id="relationship" style="width: 100%;" required="required" disabled="disabled">
				<option value="{{ $manageoppatientslist->relationship }}">{{ $manageoppatientslist->relationship }}</option>
				<option value="">Select RelationShip</option>
				<option value="Brother">Brother</option>
			    <option value="Brother-In-Law">Brother-In-Law</option>
				<option value="Daughter">Daughter</option>
				<option value="Father">Father</option>
				<option value="Father-In-Law">Father-In-Law</option>
				<option value="Grand Daughter">Grand Daughter</option>
				<option value="Grand Father">Grand Father</option>
				<option value="Grand Mother">Grand Mother</option>
				<option value="Grand Son">Grand Son</option>
				<option value="Husband">Husband</option>
				<option value="Mother">Mother</option>
				<option value="Mother-In-Law">Mother-In-Law</option>
				<option value="Nephew">Nephew</option>
				<option value="Niece">Niece</option>
				<option value="Sister">Sister</option>
				<option value="Sister-In-Law">Sister-In-Law</option>
				<option value="Son">Son</option>
				<option value="Spouse">Spouse</option>
				<option value="Wife">Wife</option>
				</select>
				</div>
				</div>
				<div class="form-group row">
				<label for="street" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Street</label>
				<div class="col-sm-8">
				<input value="{{ $manageoppatientslist->street }}" required="required" type="text" disabled="disabled" class="form-control" name="street" id="street" maxlength="50" placeholder="Street">
				</div>
				</div>
			    <div class="form-group row">
				<label for="locality" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Locality</label>
				<div class="col-sm-8">
				<input value="{{ $manageoppatientslist->locality }}" required="required" type="text" disabled="disabled" class="form-control" name="locality" id="locality"
				maxlength="50" placeholder="locality">
				</div>
				</div>
				<div class="form-group row">
				<label for="village_name" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Village/CityName</label>
				<div class="col-sm-8">
				<input value="{{ $manageoppatientslist->village_name }}" required="required" type="text" disabled="disabled" class="form-control" name="village_name" id="village_name"
				maxlength="50" placeholder="village City Name">
				</div>
				</label>
			    </div>
			
				<div class="form-group row">
				<label for="aadhaar_no" class="col-sm-4 col-form-label"><span style="color:red"></span>Aadhaar No</label>
				<div class="col-sm-4">
				<input value="{{ $manageoppatientslist->aadhaar_no }}" required="required" type="text" disabled="disabled" class="form-control" name="aadhaar_no" id="aadhaar_no" maxlength="12" placeholder="Aadhaar No">
				</div>
				<div class="col-sm-4 custom-file">
				<input value="{{ $manageoppatientslist->aadhaarfile }}" type="file" disabled="disabled" class="custom-file-input" name="aadhaarfile" id="aadhaarfile">
				<label class="custom-file-label" for="aadhaarfile">Choose file</label>
					</div>
				    </div>	
					  <div class="form-group row">
				<label for="mobile_number" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Contact Number</label>
				<div class="col-sm-4">
				<input  value="{{ $manageoppatientslist->mobile_number }}"required="required" type="text" disabled="disabled" class="form-control" name="mobile_number" id="mobile_number"
				maxlength="50" placeholder="Mobile Number">
				</div>
				<div class="col-sm-4">
				<input value="{{ $manageoppatientslist->phone_number }}" required="required" type="text" disabled="disabled" class="form-control" name="phone_number" id="phone_number"
				maxlength="50" placeholder="Phone Number">
				</div>
				</div>
				</div>
				<div class="col-md-6">   

				<div class="form-group row">
				<label for="company" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Company</label>
				<div class="col-sm-6">
				<input value="{{ $manageoppatientslist->company }}" required="required" type="text" disabled="disabled" class="form-control" name="company" id="company" maxlength="50" placeholder="Company">
				</div>
				<div class="col-sm-2">
				<input value="{{ $manageoppatientslist->employe_id }}" required="required" type="text" disabled="disabled" class="form-control" name="employe_id" id="employe_id" maxlength="50" placeholder="Employe_id">
				</div>
				</div>

				<div class="form-group row">
				<label for="blood group" class="col-sm-4 col-form-label"><span style="color:red"></span>Patient Disease</label>
				<div class="col-sm-6">
				<select class="form-control select2bs4" name="disease" id="disease" style="width: 100%;" required="required">
				<option>Blood Group</option>
				</select>
				</div>
				<div class="col-sm-2">
				<select class="form-control select2bs4" name="status" id="status" style="width: 100%;" required="required">
					<option value="2" <?php if($manageoppatientslist->status == 2){ echo "selected"; }?>>O P</option>
					<option value="3" <?php if($manageoppatientslist->status == 3){ echo "selected"; }?>>I P</option>
				</select>
				</div>
				</div>
                <div class="form-group row">
				<label for="blood group" class="col-sm-4 col-form-label"><span style="color:red"></span>Doctors</label>
				<div class="col-sm-8">
				<select class="form-control select2bs4" name="disease" id="disease" style="width: 100%;" required="required">
				<option>Select Doctor</option>

 @foreach($managedoctor as $key=>$managedoctorlist)
					<option value="{{ $managedoctorlist->id }}">{{ $managedoctorlist->full_name }}</option>
				 @endforeach

				</select>
				</div>
				</div>
				
				
               <div class="form-group row">
				<label for="other_details" class="col-sm-4
				col-form-label">
				<span style="color:red"></span>Other Details</label>
				<div class="col-sm-8">
				<textarea row="4" required="required" type="text" class="form-control" name="other_details"
						id="other_details" maxlength="50" placeholder="Other Details">{{ $manageoppatientslist->other_details }}</textarea>
				</div>
				</div>
				<div class="form-group row">
				<label for="date_of_birth " class="col-sm-4 col-form-label"><span style="color:red"></span>
					Appointment Date</label>
				<div class="col-sm-3" id="rangestart">
    <div class="ui input left icon">
      <i class="calendar icon"></i>
      <input type="text" placeholder="Date">
    </div>
				</div>
				<div class="col-sm-2" id="rangeend">
    <div class="ui input left icon">
      <i class="time icon"></i>
      <input type="text" placeholder="Time">
    </div>
  </div>
				</div>
				<div class="form-group row">
					<label for="other_details" class="col-sm-4 col-form-label">
					<span style="color:red"></span>Profile Photo</label>
					<div class="col-sm-4">	
						 <div class="camera">
							<video id="video">Video stream not available.</video>
							<div><button id="startbutton">TakePhoto</button></div>
						</div>
					</div>
					<div class="col-sm-4">
						<canvas id="canvas"></canvas>
						<div class="output">
							<img id="photo" alt="The screen capture will appear in this box.">
						</div>
					</div>
				</div>
					</div>		
				    </div>
					</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Save changes</button>
</div>
</div>
</div>
</div>



<div class="modal fade" id="appointments{{ $manageoppatientslist->userID }}">
				<form action="{{url('/edit_patient')}}" method="post">
				{{ csrf_field() }}
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title">Doctor Appointment</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				   <span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
                    <input type="hidden" class="form-control" name="id" value="{{ $manageoppatientslist->id }}"/>
				
				<div class="form-group row">
				<label for="date_of_birth " class="col-sm-4 col-form-label"><span style="color:red"></span>
					Appointment Date</label>
				<div class="col-sm-8" id="rangestart">
    <div class="ui input left icon">
      <i class="calendar icon"></i>
      <input type="text" placeholder="Date">
    </div>
				</div>
				</div>
					<div class="form-group row">
				<label for="date_of_birth " class="col-sm-4 col-form-label"><span style="color:red"></span>
					Appointment Time</label>
				<div class="col-sm-8" id="rangeend">
    <div class="ui input left icon">
      <i class="time icon"></i>
      <input type="text" placeholder="Time">
    </div>
  </div>
				</div>
				
				<div class="form-group row">
				<label for="blood group" class="col-sm-4 col-form-label"><span style="color:red"></span>Doctors</label>
				<div class="col-sm-8">
				<select class="form-control select2bs4" name="disease" id="disease" style="width: 100%;" required="required">
				<option>Select Doctor</option>

 @foreach($managedoctor as $key=>$managedoctorlist)
					<option value="{{ $managedoctorlist->id }}">{{ $managedoctorlist->full_name }}</option>
				 @endforeach

				</select>
				</div>
				</div>
				 <div class="form-group row">
				<label for="other_details" class="col-sm-4
				col-form-label">
				<span style="color:red"></span>Other Details</label>
				<div class="col-sm-8">
				<textarea row="4" required="required" type="text" class="form-control" name="other_details"
						id="other_details" maxlength="50" placeholder="Other Details">{{ $manageoppatientslist->other_details }}</textarea>
				</div>
				</div>
					
					</div>
					
			        </form>
                   
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Save changes</button>
</div>
</div>
</div>
</div>
	 </tr>
@endforeach

</tbody>
</table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                     <table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>PatientId</th>
<th>Title</th>
<th>Name</th>
<th>Gender</th>
<th>Age</th>
<th>Relation</th>
<th>RoomNo</th>
<th>Village</th>
<th>Token#</th>
<th>Fees</th>
<th>Action</th>
</tr>
</thead>
<tbody>
 @foreach($manageippatients as $key=>$manageippatientslist)
                      <tr id="arrayorder_<?php echo $manageippatientslist->id?>">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $manageippatientslist->disease_name }}</td>
						 <td><a href="" data-toggle="modal" data-target="#edit{{ $manageippatientslist->id }}" >{{ $manageippatientslist->full_name }}</a></td>
						 @if($manageippatientslist->gender == 1)
                            <td>Male</td>
                        @else
                            <td>Female</td>
                        @endif  
												
                        <td>{{ $manageippatientslist->age }}</td>
                        <td>{{ $manageippatientslist->relation_name }}</td>
                        <td>{{ $manageippatientslist->relation_name }}</td>
                        <td>{{ $manageippatientslist->village_name }}</td>
                        <td>HC{{ $manageippatientslist->id }}</td>
                        <td>{{ $manageippatientslist->fees }}</td>
                        <td>
						<div class="btn-group dropdown">
<button type="button" class="btn btn-default fa fa-eye" data-toggle="dropdown">
</button>
<button type="button" class="btn btn-default">Action</button>

<div class="dropdown-content">
<a href="" data-toggle="modal" data-target="#edit{{ $manageippatientslist->userID }}">Edit Profile</a>
<a href="" data-toggle="modal" data-target="#edit{{ $manageippatientslist->userID }}">IP Admission</a>
<a href="" data-toggle="modal" data-target="#edit{{ $manageippatientslist->userID }}">Appointments</a>
</div>
</div>
</td>
                      </tr> 
					  
					  <!-- edit product start -->
                      
					   @endforeach

</tbody>
</table>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
    </section>
    <!-- /.content -->
					



<div class="modal fade" id="addpatient">
<form action="{{url('/add_patient')}}" method="post">
		{{ csrf_field() }}
 <div class="modal-dialog modal-xl">
   <div class="modal-content">
    <div class="modal-header">
	<h4 class="modal-title">Patients Registration</h4>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	</button>
    </div>
        <div class="modal-body">
        	<div class="row">
			    <div class="col-md-6">   
				     <input type="hidden" class="form-control" name="role_id" value="4"/>
                   <div class="form-group row">
				    <label for="profile_status" class="col-sm-4 col-form-label"><span style="color:red"></span>Patient Name</label>
									
				   <div class="col-sm-3 custom-file">
					  <select class="form-control select2bs4" name="profile_status" id="profile_status" style="width: 100%;" required="required">
						  <option value="">Profile Status</option>
						  <option value="Mr">Mr</option>
						  <option value="Ms">Ms</option>
						  <option value="Daughter">Daughter</option>
					   </select>
					</div>

					<div class="col-sm-5">
						<input  required="required" type="text" class="form-control" name="full_name" id="full_name" maxlength="50" placeholder="Patient Full Name">
					</div>
				</div>
				<div class="form-group row">
				<label for="date_of_birth " class="col-sm-4 col-form-label"><span style="color:red"></span>
					Date Of Birth</label>
				<div class="col-sm-2">
				<input required="required" type="text" class="form-control" name="year" id="year" maxlength="50" placeholder="YYYY">
				</div>
				<div class="col-sm-2">
				<input required="required" type="text" class="form-control" name="month" id="month" maxlength="50" placeholder="MM">
				</div>
				<div class="col-sm-2">
				<input required="required" type="text" class="form-control" name="days" id="days" maxlength="50" placeholder="DD">
				</div>
				<div class="col-sm-2">
				<input required="required" type="text" class="form-control" name="age" id="age" maxlength="50" placeholder="AGE">
				</div>
				</div>
				<div class="form-group row">
				<label for="gender" class="col-sm-4 col-form-label"><span style="color:red"></span>Gender</label>
				<div class="col-sm-4">
				<select class="form-control select2bs4" name="gender" id="gender" style="width: 100%;" required="required">
				  <option value="Mail">Mail</option>
                  <option value="Femail">Femail</option>
                  <option value="Transgender">Transgender</option>
				</select>
				</div>
				<label for="age" class="col-sm-2 col-form-label"><span style="color:red"></span>Blood</label>
				<div class="col-sm-2">
				<select class="form-control select2bs4" name="blood_group" id="blood_group" style="width: 100%;" required="required">
				<option>Blood </option>
				<option value="A+">A+</option>
				<option value="A1+">A1+</option>
				<option value="A2+">A2+</option>
				<option value="A-">A-</option>
				<option value="A1-">A1-</option>
				<option value="A2-">A2-</option>
				<option value="AB+">AB+</option>
				<option value="A1B+">A1B+</option>
				<option value="A2B+">A2B+</option>
				<option value="AB-">AB-</option>
				<option value="A1B-">A1B-</option>
				<option value="A2B-">A2B-</option>
				<option value="B+">B+</option>
				<option value="B-">B-</option>
				<option value="O+">O+</option>
				<option value="O-">O-</option>
				</select>
				</div>
				</div>
				<div class="form-group row">
				<label for="relation_name" class="col-sm-4 col-form-label"><span style="color:red"></span>
					Realation Name</label>
				<div class="col-sm-4">
				<input  required="required" type="text" class="form-control" name="relation_name" id="relation_name" maxlength="50" placeholder="Relation Name">
				</div>
				<div class="col-sm-4 custom-file">
				<select class="form-control select2bs4" name="relationship" id="relationship" style="width: 100%;" required="required">
				<option value="">Select RelationShip</option>
				<option value="Brother">Brother</option>
			    <option value="Brother-In-Law">Brother-In-Law</option>
				<option value="Daughter">Daughter</option>
				<option value="Father">Father</option>
				<option value="Father-In-Law">Father-In-Law</option>
				<option value="Grand Daughter">Grand Daughter</option>
				<option value="Grand Father">Grand Father</option>
				<option value="Grand Mother">Grand Mother</option>
				<option value="Grand Son">Grand Son</option>
				<option value="Husband">Husband</option>
				<option value="Mother">Mother</option>
				<option value="Mother-In-Law">Mother-In-Law</option>
				<option value="Nephew">Nephew</option>
				<option value="Niece">Niece</option>
				<option value="Sister">Sister</option>
				<option value="Sister-In-Law">Sister-In-Law</option>
				<option value="Son">Son</option>
				<option value="Spouse">Spouse</option>
				<option value="Wife">Wife</option>
				</select>
				</div>
				</div>
				<div class="form-group row">
				<label for="street" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Street</label>
				<div class="col-sm-8">
				<input  required="required" type="text" class="form-control" name="street" id="street" maxlength="50" placeholder="Street">
				</div>
				</div>
			    <div class="form-group row">
				<label for="locality" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Locality</label>
				<div class="col-sm-8">
				<input required="required" type="text" class="form-control" name="locality" id="locality"
				maxlength="50" placeholder="locality">
				</div>
				</div>
				<div class="form-group row">
				<label for="village_name" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Village/CityName</label>
				<div class="col-sm-8">
				<input required="required" type="text" class="form-control" name="village_name" id="village_name"
				maxlength="50" placeholder="village City Name">
				</div>
				</label>
			    </div>
		<div class="form-group row">
			<label for="aadhaar_no" class="col-sm-4 col-form-label"><span style="color:red"></span>Aadhaar No</label>
				<div class="col-sm-4">
						<input  required="required" type="text" class="form-control" name="aadhaar_no" id="aadhaar_no" maxlength="12" placeholder="Aadhaar No">
				</div>
				     <div class="col-sm-4 custom-file">
						<input type="file" class="custom-file-input" name="aadhaarfile" id="aadhaarfile">
						<label class="custom-file-label" for="aadhaarfile">Choose file</label>
					</div>
				</div>	
				<div class="form-group row">
				    <label for="mobile_number" class="col-sm-4 col-form-label"><span style="color:red"></span>Contact Number</label>
						<div class="col-sm-4">
							<input required="required" type="text" class="form-control" name="mobile_number" id="mobile_number"
							maxlength="50" placeholder="Mobile Number">
						</div>
						<div class="col-sm-4">
							<input required="required" type="text" class="form-control" name="phone_number" id="phone_number"
						maxlength="50" placeholder="Phone Number">
						</div>
				</div>
			</div>
			<div class="col-md-6">   
				<div class="form-group row">
					<label for="company" class="col-sm-4 col-form-label"><span style="color:red"></span>Company</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="company" id="company" maxlength="50" placeholder="Company">
						</div>
						<div class="col-sm-2">
							<input type="text" class="form-control" name="employe_id" id="employe_id" maxlength="50" placeholder="Employe_id">
						</div>
				</div>

				<div class="form-group row">
					<label for="blood group" class="col-sm-4 col-form-label"><span style="color:red"></span>Patient Disease</label>
						<div class="col-sm-6">
							<select class="form-control select2bs4" name="disease_id" id="disease_id" style="width: 100%;" required="required">
								<option value="">Disease</option>
								<option value="1">Fever</option>
								<option value="2">Fain</option>
								<option value="3">Back Pain</option>
							</select>
						</div>
						<div class="col-sm-2">
							<select class="form-control select2bs4" name="status" id="status" style="width: 100%;" required="required">
								<option value="2">O P</option>
								<option value="3">I P</option>
							</select>
						</div>
				</div>
               <div class="form-group row">
				<label for="other_details" class="col-sm-4
				col-form-label"><span style="color:red"></span>Other Details</label>
					<div class="col-sm-8">
						<textarea row="3" required="required" type="text" class="form-control" name="other_details" id="other_details" maxlength="50" placeholder="Other Details"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="other_details" class="col-sm-4 col-form-label"><span style="color:red"></span>Profile Photo</label>
						<div class="col-sm-4">	
							 <div class="camera">
								<video id="video">Video stream not available.</video>
								<div><button id="startbutton">TakePhoto</button></div>
							</div>
						</div>
						<div class="col-sm-4">
							<canvas id="canvas"></canvas>
							<div class="output">
								<img id="photo" alt="The screen capture will appear in this box.">
							</div>
						</div>
				</div>
		    </div>
	    </div>
		<div class="modal-footer justify-content-between">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Submit</button>
		 </div>
</div>
</div>
</div>
</form>
</div>
</div>
@endsection



<script src="{!! asset('plugins/jquery/jquery.min.js') !!}"></script>
<script src="{!! asset('dist/js/pages/dashboard2.js') !!}"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
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
<script>
let camera_button = document.querySelector("#start-camera");
let video = document.querySelector("#video");
let click_button = document.querySelector("#click-photo");
let canvas = document.querySelector("#canvas");

camera_button.addEventListener('click', async function() {
   	let stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
	video.srcObject = stream;
});

click_button.addEventListener('click', function() {
   	canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
   	let image_data_url = canvas.toDataURL('image/jpeg');

   	// data url of the image
   	console.log(image_data_url);
});
</script>
<script>
    /* JS comes here */
    (function() {

        var width = 320; // We will scale the photo width to this
        var height = 0; // This will be computed based on the input stream

        var streaming = false;

        var video = null;
        var canvas = null;
        var photo = null;
        var startbutton = null;

        function startup() {
            video = document.getElementById('video');
            canvas = document.getElementById('canvas');
            photo = document.getElementById('photo');
            startbutton = document.getElementById('startbutton');

            navigator.mediaDevices.getUserMedia({
                    video: true,
                    audio: false
                })
                .then(function(stream) {
                    video.srcObject = stream;
                    video.play();
                })
                .catch(function(err) {
                    console.log("An error occurred: " + err);
                });

            video.addEventListener('canplay', function(ev) {
                if (!streaming) {
                    height = video.videoHeight / (video.videoWidth / width);

                    if (isNaN(height)) {
                        height = width / (4 / 3);
                    }

                    video.setAttribute('width', width);
                    video.setAttribute('height', height);
                    canvas.setAttribute('width', width);
                    canvas.setAttribute('height', height);
                    streaming = true;
                }
            }, false);

            startbutton.addEventListener('click', function(ev) {
                takepicture();
                ev.preventDefault();
            }, false);

            clearphoto();
        }


        function clearphoto() {
            var context = canvas.getContext('2d');
            context.fillStyle = "#AAA";
            context.fillRect(0, 0, canvas.width, canvas.height);

            var data = canvas.toDataURL('image/png');
            photo.setAttribute('src', data);
        }

        function takepicture() {
            var context = canvas.getContext('2d');
            if (width && height) {
                canvas.width = width;
                canvas.height = height;
                context.drawImage(video, 0, 0, width, height);

                var data = canvas.toDataURL('image/png');
                photo.setAttribute('src', data);
            } else {
                clearphoto();
            }
        }
        window.addEventListener('load', startup, false);
    })();
    </script>