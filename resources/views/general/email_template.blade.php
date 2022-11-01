<style>
  .img-main{
    width:100%;
    height:360px;
    overflow:hidden;
  }
   .item-img {
        transition: 0.3s;
    }
    .item-img:hover {
        transform: scale(1.1);
    }
</style>

@extends('layout')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Email Templates</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Email Templates</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible">
            <button style="color:#fff" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> {{session('success')}}</h5>
          </div>
        @endif
        <div class="row">
          <div class="col-12">
            <form action="{{url('/update_email_template' )}}" method="post">
            {{ csrf_field() }}
              <div class="card card-info">
                <input type="hidden" name="id" value="">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Trial End Templates</h3>
                      </div>
                        <div class="card-body">
                          <label>Screen Shot</label>
                          <div class="form-group img-main">
                              <a  href="{{ asset('img/email/trial-end.png') }}" data-toggle="lightbox" data-title="Trial End Template">
                                <img class="item-img" style="width:100%;height:100%" src="{{ asset('img/email/trial-end.png') }}" alt="trial end">
                              </a>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Trial End Before 3 days Templates</h3>
                      </div>
                        <div class="card-body">
                          <label>Screen Shot</label>
                          <div class="form-group img-main">
                              <a href="{{ asset('img/email/trial-before.png') }}" data-toggle="lightbox" data-title="Trial End Before 3 days Template">
                                <img class="item-img" style="width:100%;height:100%" src="{{ asset('img/email/trial-before.png') }}" alt="trial before">
                              </a>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Register Successfully Templates</h3>
                      </div>
                        <div class="card-body">
                          <label>Screen Shot</label>
                          <div class="form-group img-main">
                              <a href="{{ asset('img/email/register-success.png') }}" data-toggle="lightbox" data-title="Register Successfully Template">
                                <img class="item-img" style="width:100%;height:100%" src="{{ asset('img/email/register-success.png') }}" alt="Register">
                              </a>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Reset Password Templates</h3>
                      </div>
                        <div class="card-body">
                          <label>Screen Shot</label>
                          <div class="form-group img-main">
                              <a href="{{ asset('img/email/reset-password.png') }}" data-toggle="lightbox" data-title="Reset Password">
                                <img class="item-img" style="width:100%;height:100%" src="{{ asset('img/email/reset-password.png') }}" alt="reset password">
                              </a>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Receipt Templates</h3>
                      </div>
                        <div class="card-body">
                          <label>Screen Shot</label>
                          <div class="form-group img-main">
                              <a href="{{ asset('img/email/reciept.png') }}" data-toggle="lightbox" data-title="Receipt Template">
                                <img class="item-img" style="width:100%;height:100%" src="{{ asset('img/email/reciept.png') }}" alt="reciept">
                              </a>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
            </form>
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