@extends('layout')
@section('content') 

                   <div class="content-wrapper">
                   <section class="content">
                   <div class="card card-primary card-outline card-outline-tabs">
                   <div class="card-body">
			       <form action="{{url('/pharmacy/billing')}}" method="post">
                           {{ csrf_field() }}
				   <div class="card-header p-0 border-bottom-0">
				   <h4 style="font-size:26px;">Biling</h4>
                   <ul class="nav nav-tabs" id="custom-tabs-four-tab"
				   role="tablist">
				 
				   <div class="col-sm-11">
				   <input type="text" class="form-control" id="myInput" 
				   onkeyup="myFunction()" placeholder="Patient Name">
				   </div>
				   
				   <div class="col-sm-1">				   
                   <button style="background-color:red" type="button"
				   class="btn btn-block btn-secondary" 
				   data-toggle="modal" data-target="#addbilling"><i 
				   class="fa fa-plus"></i>Add</button>                 
	     		   </div>				   
                   </ul>
                   </div>							
                   <div class="modal-body">									   
                   <table id="example1" class="table table-bordered table-hover">
                   <thead>
                   <tr>
				   <th>ID</th>
				   <th>Patient Name</th>
				   <th>Gender</th>				   
				   <th>Fees</th>
				   <th>Action</th>
                   </tr>
                   </thead>
                   <tbody> 
		           <div class="leftside"></div>
		           </div>
		     @foreach($manageBilling as $key=>$manageBilling)
                   <tr id="arrayorder_<?php echo $manageBilling->id?>">
                   <td>{{ $key + 1 }}</td>
                   <td>{{ $manageBilling->patient_name }}</td>				   
				   <td>{{ $manageBilling->gender }}</td>
				   <td>{{ $manageBilling->fees }}</td>
				   <td> 				   
				   <div class="row col-md-2">
                   <p>
                   <button 
				    class="col-md"
                    onclick="window.open('{{url('/pharmacy/sales')}}','MY Window','height=650,width=1400,top=200,centeralign=400,right=500')"type="button"class="btn btn-default btn-sm">
                   <span class="fa fa-plus"style="font-size:20px"></span>
                   </button>
                   </p>
                   </div>
				   </td>
			       </tr>				   				   		   
                   </div>
                   </div>
				   </div>
                   </form>				  
				   @endforeach
                   </tbody>
                   </table>   
			      	 	
<!--add supplier-->	
			   
				   <div class="modal fade" id="addbilling">
                   <form action="{{url('/pharmacy/add_billing')}}" method="post">
                       {{ csrf_field() }}
                   <div class="modal-dialog">
                   <div class="modal-content">
                   <div class="modal-header">
                   <h4 style="font-size:35px;">Add Bil</h4>
                   <button type="button" class="close" data-dismiss="modal" 
				   aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                   </button>
                   </div>
					
                   <div class="modal-body">
                   <input type="text" class="form-control mb-3"name="patient name" placeholder="Patient name"/>
				  
				   <input type="text" class="form-control mb-3" name="gender"
				   placeholder="Gender"/>
					
				   <input type="text" class="form-control mb-3" name="fees" 
				   placeholder="Fees"/>  
                   </div>
					
                   <div class="modal-footer justify-content-between">
                   <button type="button" class="btn btn-default" 
				   data-dismiss="modal">Close</button>				
                   <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
					
                   </div>
                   </div>
                   </form>
                   </div>
                   </section>
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
JavaScript
function openWindow() {
  var win = window.open
  ("", "Title", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=780,height=200, top="+(screen.height-400)+", left="+(screen.width-840));
  win.document.body.innerHTML = "Product Details";
}
</script>
</script>
</script>
