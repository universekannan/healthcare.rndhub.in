@extends('layout2')
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
  background-color:aqua;
}
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}
</style>

                <div class="content-wrapper">
                <section class="content">
                <div class="card card-primary card-outline card-outline-tabs">
                <section class="content">
                <div class="container-fluid">
                <div class="row">
                <div class="col-3">
				              
				<h4 style="font-size:25px;"> Sales</h4>                 
				<div class="form-group">
				<div class="col-sm-12">
				<input  value="" required="required" 
				type="text" class="form-control" 
				name="product code" id="product code" maxlength="50" 
				placeholder="Product Code">
				</div>
				</div>
				
				<div class="form-group">
				<div class="col-sm-12">
				<input  value="" required="required" 
				type="text" class="form-control" 
				name="product name" id="product name" maxlength="50" 
				placeholder="Product Name">
				</div>
				</div>
				
			    <div class="form-group">
				<div class="col-sm-12">
				<input  value="" required="required" 
				type="text" class="form-control" 
				name="price" id="price" maxlength="50" 
				placeholder="price" readonly>				
				</div>
				</div>
				
			    <div class="form-group">
				<div class="col-sm-12">
				<input  value="" required="required" 
				type="text" class="form-control" 
				name="quantity" id="quantity" maxlength="50" 
				placeholder="Quantity">
				</div>
				</div>
				
				<div class="form-group">
				<div class="col-sm-12">
				<input  value="" required="required" 
				type="text" class="form-control" 
				name="current price" id="current price" maxlength="50" 
				placeholder="Current Price" readonly>
				</div>
				</div>
				
				<button type="button" class="btn btn-block btn-secondary" 
                data-toggle="modal" data-target="#addsales">
				<i class="fa fa-plus"></i>Add</button>
                </div>
                <div class="col-9">
                <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tab_logic">
                <thead>
                <tr>
				
                <br>
                <th class="text-center">
                    S No
                </th>
                <th class="text-center">
                    Product Name
                </th>
                <th class="text-center">
                    Price
                </th>
                <th class="text-center">
                    Quantity
                </th>
	            <th class="text-center">
                    Total Price
                </th>
                <th class="text-center">
                <a><i class='fa fa-trash' style='color: red'></i></a>
                </th>	
                </br>				
                </tr>
			    </thead>
                <tbody>
                <tr id='addr0'></tr>
			    </tbody>
                </table> </div>					
                </div>
				</div>
			    <div class="row">
				<div class="col-8">
				
				<!--<p class="lead">Amount Due 2/22/2014</p>-->

                </div>
                <div class="col-4">
                <div class="table-responsive">
                <table class="table">
                <tr>
                <th style="width:50%">Subtotal:</th>
                <td>$250.30</td>
                </tr>
                <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
                </tr>
                <tr>
                <th>Total:</th>
                <td>$265.24</td>
                </tr>
                </table>
                </div>
                <button type="button" class="btn btn-block btn-secondary" 
                data-toggle="modal" data-target=""><span>&#8377;</span>
				<i class=""></i>Pay</button>
				</br>
                </div>
                </div>
                </section>
                </div>
                </div>
				
<!-- add sales start-->
				
				<div class="modal fade" id="addsales">
                <form action="{{url('/pharmacy/add_sales')}}" method="post">
				
{{ csrf_field() }}

                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <h4  class="modal-title">Sales</h4>
                <button type="button" class="close" data-dismiss="modal"
			     aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
              
			    <form action="" method="post" enctype="multipart/form-data" 
				class="form-horizontal">
  
	            <div class="form-group row">
				<label for="product code" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Product Code</label>
				<div class="col-sm-8">
				<input  required="required" type="text" class="form-control"
				name="product code" id="product code" maxlength="50" 
				placeholder="Product Code">
				</div>
				</div>
				
                <div class="form-group row">
				<label for="product name" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Product Name</label>
				<div class="col-sm-8">
				<input  required="required" type="text" class="form-control" 
				name="product name" id="product name" maxlength="50" 
				placeholder="Product Name">
				</div>
				</div>
				
				<div class="form-group row">
				<label for="quantity" class="col-sm-4 col-form-label">
				<span style="color:red"></span>Quantity</label>
				<div class="col-sm-8">
				<input  required="required" type="text" class="form-control" 
				name="quantity" id="quantity" maxlength="50" 
				placeholder="Quantity">
				</div>
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
			    </form>    
                </div>
                </div>
               			 
  <!-- add product ending-->
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
