@extends('layout')
  @section('content')
    <div class="content-wrapper">
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Sorry</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            You are not access to the page so please contact superadmin ...... !!!
          </div>
        </div>
        <!-- /.card -->
      </section>
    </div>
  @endsection