@extends('layout')
@section('content') 

                   <div class="content-wrapper">
                   <section class="content">
                   <div class="card card-primary card-outline card-outline-tabs">
                   <div class="card-body">
			       <form action="{{url('/pharmacy/supplier')}}" method="post">
                            {{ csrf_field() }}
				   <div class="card-header p-0 border-bottom-0">
				   <h4 style="font-size:35px;">Supplier</h4>
                   <ul class="nav nav-tabs" id="custom-tabs-four-tab"
				   role="tablist">
					 
				   <div class="col-sm-11">
				   <input type="text" class="form-control" id="myInput" 
				   onkeyup="myFunction()" placeholder="Supplier Name">
				   </div>
				   
				   <div class="col-sm-1">
				   <td>
                   <button style="background-color:red" type="button"
				   class="btn btn-block btn-secondary" 
				   data-toggle="modal" data-target="#addsupplier">				   
				   <i class="fa fa-eye"></i> Order</button>
                   </td>
	     		   </div>
                   </ul>
                   </div>							
                   <div class="modal-body">									   
                   <table id="example1" class="table table-bordered table-hover">
                   <thead>
                   <tr>
				   <th>id</th>
				   <th>Supplier Name</th>
				   <th>Contact</th>				   
				   <th>Address</th>
				   <th>Action</th>
                   </tr>
                   </thead>
                   <tbody> 
		           <div class="leftside"></div>
		           </div>
		     @foreach($managesupplier as $key=>$managesupplier)
                   <tr id="arrayorder_<?php echo $managesupplier->id?>">
                   <td>{{ $key + 1 }}</td>
                   <td>{{ $managesupplier->supplier_name }}</td>				   
				   <td>{{ $managesupplier->contact }}</td>
				   <td>{{ $managesupplier->address }}</td>
				   <td> 
				   <div class="row">
                   <a type="button" data-toggle="modal" data-target="#editsupplier{{ $managesupplier->id }}"class="col-md-4 btn btn-block btn-lg">
                   <i class="fa fa-edit"></i></a> 
                   </div>
				   </td>
			       </tr>
				   
<!--edit supplier-->	
		    
			       <div class="modal fade" id="editsupplier{{ $managesupplier->id }}">
                   <form action="{{url('pharmacy/edit_supplier')}}" method="post">
                         {{ csrf_field() }}			   
				    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                   <h4 style="font-size:35px;">Edit Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
					
                    <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" 
                    value="{{ $managesupplier->id }}"/> 
                    <div class="form-group row">
                    <label for="supplier_name" class="col-sm-4 col-form-label">
                    <span style="color:red"></span>Supplier Name</label>
                    <div class="col-sm-8">
                    <input  value="{{ $managesupplier->supplier_name }}" 
					required="required"
                    type="text" class="form-control"
                    name="supplier_name" id="supplier_name" maxlength="50" 
                    placeholder="Supplier_Name">
                    </div>
                    </div>
					
                    <div class="form-group row">
                    <label for="contact" class="col-sm-4 col-form-label">
                    <span style="color:red"></span>Contact</label>
                    <div class="col-sm-8">
                    <input  value="{{ $managesupplier->contact }}" 
					required="required" 
                    type="text" class="form-control" 
                    name="contact" id="contact" maxlength="50" 
                    placeholder="Contact">
                    </div>
                    </div>
					
					<div class="form-group row">
                    <label for="address" class="col-sm-4 col-form-label">
                    <span style="color:red"></span>Address</label>
                    <div class="col-sm-8">
                    <input  value="{{ $managesupplier->address }}" 
					required="required" 
                    type="text" class="form-control" 
                    name="address" id="address" maxlength="50" 
                    placeholder="Address">
                    </div>
                    </div>
                                            
                   <div class="modal-footer justify-content-between">
                   <button type="button" class="btn btn-default" 
                   data-dismiss="modal">Next</button>					
                   <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
                   </div>
                   </div>            
                   </div>        
                   </div>
                   </div>
                   </div>
                   </form>				  
				   @endforeach
                   </tbody>
                   </table>   
			      	 	
<!--add supplier-->				   
				   <div class="modal fade" id="addsupplier">
                   <form action="{{url('/pharmacy/add_supplier')}}" method="post">
                      {{ csrf_field() }}
                   <div class="modal-dialog">
                   <div class="modal-content">
                   <div class="modal-header">
                   <h4 style="font-size:30px;">View Supplier</h4>
                   <button type="button" class="close" data-dismiss="modal" 
				   aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                   </button>
                   </div>
					
                   <div class="modal-body">
                   <input type="text" class="form-control mb-3"name="supplier name" placeholder="Supplier name"/>
				  
				   <input type="text" class="form-control mb-3" name="contact"
				   placeholder="Contact"/>
					
				   <input type="text" class="form-control mb-3" name="address" 
				   placeholder="Address"/>
					
				   <input type="text" class="form-control mb-3" 
				   name="mini order qty"
				   placeholder="Mini Order Qty"/>	
				   
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
