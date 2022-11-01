@extends('layout2')
@section('content') 

                   <div class="content-wrapper">
                   <section class="content">
                   <div class="card card-primary card-outline card-outline-tabs">
                   <div class="card-body">
			       <form action="{{url('/pharmacy/add_company')}}" method="post">
                            {{ csrf_field() }}
                   <div class="modal-header">
                   <h4 class="modal-title">Company</h4>
                   </div>
                   <div class="modal-body">					
                   <input type="text" class="col-sm-6" name="company_name" placeholder="Enter Company Name"/>
                   </br>				   
                   <br>			   
                   <button type="submit"style="height: 30px; width: 100px" 
				   class="col-sm-1" class="btn btn-primary">Submit</button>
                   </br>
                   </br>

                   <table id="example1" class="table table-bordered table-hover">
                   <thead>
                   <tr>
				   <th>id</th>
				   <th>Company Name</th>
				   <th>Status</th>
                   </tr>
                   </thead>
                   <tbody> 
          		   
		           <div class="leftside"></div>
		           </div>
		     @foreach($manageCompany as $key=>$manageCompany)
                   <tr id="arrayorder_<?php echo $manageCompany->id?>">
                   <td>{{ $key + 1 }}</td>
                   <td>{{ $manageCompany->company_name }}</td>
                 @if($manageCompany->status == 0)
							
                   <td>Active</td>
                        @else
                   <td>Inactive</td>
                        @endif     
						
			       </tr>
				  @endforeach
                   </tbody>
                   </table>
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
