@extends('layouts.admin_layout.admin_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">About</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">About</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
       <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update About</h3>
              </div>
              <!-- /.card-header -->
              @if(Session::has('error_message'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px;">
               {{ Session::get('error_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              @if(Session::has('success_message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
               {{ Session::get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              @if ($errors->any())
              <div class="alert alert-danger" style="margin-top: 10px">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          
          {{-- @error('admin_name')
          {{ $message }}
          @enderror --}}

              <!-- form start -->
              <form role="form" method="post" action="{{ route('admin.edit.what',$what->id) }}" name="" id="" enctype="multipart/form-data">@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="what">What We Do?</label>
                    <textarea name="what" id="what" class="textarea" cols="20" class="form-control" rows="4">{{ $what->what }}</textarea>
                  </div>

                      <div class="form-group">
                        <label for="how">How We Do?</label>
                        <textarea name="how" id="how" class="textarea" cols="20" class="form-control" rows="4">{{ $what->how }}</textarea>
                      </div>
               
                </div>
                <!-- /.card-body -->

                <div class="card-what">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
{{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>

  <script>
    $(function () {
      // Summernote
      $('.textarea1').summernote()
    })
    $(function () {
      // Summernote
      $('.textarea2').summernote()
    })
    $(function () {
      // Summernote
      $('.textarea3').summernote()
    })
  </script> --}}
@endsection