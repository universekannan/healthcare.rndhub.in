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
                  <center>
                     <div class="nav-link">Block List</div>
                  </center>
               </div>
               <div class="col-sm-4">
                  <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Customer Full Name">
               </div>
               <div class="col-sm-1">
                  <td>
                     <button type="button" class="btn btn-block btn-outline-danger btn-xs" data-toggle="modal" data-target="#addblock"><i class="fa fa-plus"> </i> Add</button>
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
                           <th>Block No</th>
                           <th>Block Name</th>
                           <th>Status</th>
                           <th>Edit</th>
                           <th>Add Rooms</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($manageblocks as $key=>$manageblockslist)
                        <tr id="arrayorder_<?php echo $manageblockslist->id?>">
                           <td>{{ $key + 1 }}</td>
                           <td>{{ $manageblockslist->block_name }}</td>
                           @if($manageblockslist->status == 1)
                           <td>Active</td>
                           @else
                           <td>Inactive</td>
                           @endif     
                           <td>
                              <button type="button" class="col-md-5 btn btn-block btn-outline-danger btn-xs" data-toggle="modal" data-target="#edit{{ $manageblockslist->id }}"><i class="fa fa-edit"> </i> Edit</button>
                           </td>
                           <td>
                              <a href="rooms/{{ $manageblockslist->id }}" type="button" class="col-md-5 btn btn-block btn-outline-danger btn-xs"><i class="fa fa-eye"> </i> Rooms</a>
                           </td>
               </div>
               </td>
               </tr>
               <div class="modal fade" id="edit{{ $manageblockslist->id }}">
               <form action="{{url('/edit_block')}}" method="post">
               {{ csrf_field() }}
               <div class="modal-dialog">
               <div class="modal-content">
               <div class="modal-header">
               <h4 class="modal-title">Edit Block</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
               <input type="hidden" class="form-control" name="id" value="{{ $manageblockslist->id }}"/>
               <input type="text" class="form-control mb-3" name="block_name" value="{{ $manageblockslist->block_name }}" placeholder="Enter Name"/>
               <select name="status" class="form-control">
               <option value="">Select status</option>
               <option value="1" <?php if($manageblockslist->status == 1){ echo "selected"; }?>>Active</option>
               <option value="0" <?php if($manageblockslist->status == 0){ echo "selected"; }?>>Inactive</option>
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
               @endforeach
               </tbody>
               </table>
            </div>
         </div>
      </div>
      <div class="modal fade" id="addblock">
         <form action="{{url('/add_block')}}" method="post">
            {{ csrf_field() }}
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Add Blocks</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <input type="text" class="form-control mb-3" name="block_name"" placeholder="Enter Name"/>
                     <select name="status" class="form-control">
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
      <!-- /.card -->
</div>
</div>
</section>
<!-- /.content -->
</div>
@endsection
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