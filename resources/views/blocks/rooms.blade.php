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

<div class="content-wrapper">
   <section class="content">
    <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
				
					<div class="col-sm-7">
                   <center> <div class="nav-link">Rooms List</div></center>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Customer Full Name">
					</div>
					<div class="col-sm-1">
						<td>
<button type="button" class="btn btn-block btn-outline-danger btn-xs" data-toggle="modal" data-target="#adduser"><i class="fa fa-plus"> </i> Add</button>

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
					<th>Room No</th>
					<th>Room Name</th>
					<th>Block Name</th>
					<th>Block ID</th>
					<th>Status</th>
          <th>Edit</th>
          <th>Bedes</th>

</tr>
</thead>
<tbody>
 @foreach($manageroom as $key=>$manageroomlist)
                      <tr id="arrayorder_<?php echo $manageroomlist->id?>">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $manageroomlist->block_name }}</td>
                        <td>{{ $manageroomlist->room_name }}</td>
<td><?php echo $block_id = $manageroomlist->block_id; ?></td>
                        @if($manageroomlist->status == 1)
                            <td>Active</td>
                        @else
                            <td>Inactive</td>
                        @endif    
                        <td>
                              <button type="button" class="col-md-6 btn btn-block btn-outline-danger btn-xs" data-toggle="modal" data-target="#edit{{ $manageroomlist->id }}"><i class="fa fa-edit"> </i> Edit</button>
                           </td>
                           <td>
                              <a href="{{ url('/beds')}}/{{ $manageroomlist->id }}" type="button" class="col-md-5 btn btn-block btn-outline-danger btn-xs"><i class="fa fa-eye"> </i> Beds</a>
                           </td>
						<div class="modal fade" id="edit{{ $manageroomlist->id }}">
                            <form action="{{url('/edit_room')}}" method="post">
                            {{ csrf_field() }}
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Edit Room</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id" value="{{ $manageroomlist->id }}"/>
                                        <input type="hidden" class="form-control" name="block_id" value="{{ $manageroomlist->block_id }}"/>
										
                                        <input type="text" class="form-control mb-3" name="room_name" value="{{ $manageroomlist->room_name}}" placeholder="Enter Name"/>
										
                                        
</br>
										<select name="status" class="form-control">
                                            <option value="1" <?php if($manageroomlist->status == 1){ echo "selected"; }?>>Active</option>
                                            <option value="0" <?php if($manageroomlist->status == 0){ echo "selected"; }?>>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
						
						<div class="modal fade" id="addroom">
                            <form action="{{url('/add_room')}}" method="post">
                            {{ csrf_field() }}
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Add Room </h4>
					
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="block_id" value="{{ request()->id }}"/>
										
										
                                         <input type="text" class="form-control mb-3" name="room_name" placeholder="Room Name or Number"/>
</br>
										<select name="status" class="form-control">
                                            <option value="">Select status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
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
			  
	


              <!-- /.card -->
            </div>
          </div>
    </section>
    <!-- /.content -->
 

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
