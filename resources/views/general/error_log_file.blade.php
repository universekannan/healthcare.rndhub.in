
@extends('layout')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Delete Error Log File</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Delete Error Log File</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

          @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <strong>Success!</strong> {{ session('success') }}.
                </div>
              @endif
              @if (session('Fail'))
                <div class="alert alert-danger" role="alert">
                    <strong>Fail!</strong> {{ session('Fail') }}.
                </div>
              @endif
              @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                            <strong>Fail!</strong>{{ $error }}.
                    @endforeach
                </div>
              @endif
              
            <div class="card">
              <div class="card-body">
                <form action="{{url('/delete_error_log')}}" method="get" enctype="multipart/form-data">
                  <div class="row"> 
                    <div class="col-sm-4">
                      <div class="form-group">
                        <select name="domain[]" class="select2 allselect" multiple="multiple" data-placeholder="Select domain" style="width: 100%;" required>
                          <option value="all">Select All</option>
                          @foreach($domain as $resdomain)
                            <option value="{{$resdomain->id}}">{{ $resdomain->folder_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <button type="submit" class="btn btn-danger btn-block">Delete Error Log File</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
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