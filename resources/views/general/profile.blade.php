
@extends('layout')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
                <div class="row">
                  <div class="col-12 col-sm-12">
                    <div class="card card-primary card-tabs">
                      <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Profile</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Password</a>
                          </li>
                        </ul>
                      </div>
                      <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                          <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            <form action="{{url('/profile_update')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>First Name</label>
                                  <input type="text" class="form-control" name="first_name"  value="{{ $user->first_name }}" placeholder="Enter First Name " required>
                                </div>
                                <div class="form-group">
                                  <label>Last Name</label>
                                  <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" placeholder="Enter Last Name" required>
                                </div>
                                <div class="form-group">
                                  <label>Phone Number</label>
                                  <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" placeholder="Enter Phone Number" required>
                                </div>
                                <div class="form-group clearfix">
                                  <label class="col-sm-3">Sex</label>
                                  <div class="icheck-success d-inline col-sm-3">
                                    <input type="radio" name="sex"  value="1" <?php if($user->gender == 1){ ?> checked <?php } ?> id="radioSuccess1">
                                    <label for="radioSuccess1">Male</label>
                                  </div>
                                  <div class="icheck-success d-inline col-sm-3">
                                    <input type="radio" name="sex" value="0" <?php if($user->gender == 0){ ?> checked <?php } ?>   id="radioSuccess2">
                                    <label for="radioSuccess2">Female</label>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label>Address</label>
                                  <textarea type="text" rows="5" class="form-control" name="address"  placeholder="Enter Address">{{ $user->address }}</textarea>
                                </div>
                                
                                <div class="form-group">
                                  <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                            <form action="{{url('/change_password')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Email Address </label>
                                  <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter Email Address">
                                </div>
                                <div class="form-group">
                                  <label>New Password</label>
                                  <input type="password" minlength="6" id="txtNewPassword" class="form-control" name="password"  placeholder="Enter New Password" required>
                                  <div style="color:red" id="warning-message"></div>
                                  
                                </div>
                                <div class="form-group">
                                  <label>Confirm Password</label>
                                  <input type="password" id="txtConfirmPassword" class="form-control" name="password"  placeholder="Enter Confirm Password" required>
                                  <div style="color:red" id="divCheckPasswordMatch"></div>
                                </div>
                              </div>
                              <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>
                </div>
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