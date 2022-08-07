@extends('layouts.admin_layout.admin_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Footer</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Footer</li>
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
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Footer</h3>
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
              <form role="form" method="post" action="{{ route('admin.edit.footer',$footer->id) }}" name="" id="" enctype="multipart/form-data">@csrf
                <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputPassword1">Mail</label>
                    <input type="text" class="form-control" value="{{ $footer->mail }}" name="mail" id="" required="">
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Number</label>  
                    <input type="text" class="form-control" value="{{ $footer->number }}" name="number" id="" required="">
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" value="{{ $footer->address }}" name="address" id="" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Religious</label>
                    <textarea name="description" id="description" cols="20" class="form-control" rows="4">{{ $footer->description }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Information</label>
                    <textarea name="information" id="information" cols="20" class="form-control textarea" rows="4">{{ $footer->information }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Fb Url</label>
                    <input type="text" class="form-control" value="{{ $footer->fb_url }}" name="fb_url" id="" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Twitter Url</label>
                    <input type="text" class="form-control" value="{{ $footer->twitter_url }}" name="twitter_url" id="" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Instagram Url</label>
                    <input type="text" class="form-control" value="{{ $footer->instagram_url }}" name="instagram_url" id="" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">LinkedIn Url</label>
                    <input type="text" class="form-control" value="{{ $footer->LinkedIn_url }}" name="LinkedIn_url" id="" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Youtube Url</label>
                    <input type="text" class="form-control" value="{{ $footer->utube_url }}" name="utube_url" id="" required="">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
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
@endsection