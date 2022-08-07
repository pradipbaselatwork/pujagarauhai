@extends('layouts.admin_layout.admin_layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit AboutUs</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if(Session::has('success_message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        {{ Session::get('success_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    @if(Session::has('error_message'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        {{ Session::get('error_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    
    @error('url')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @enderror 
    <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">{{ $title}}</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <form
        @if(!empty($aboutUsdata['id'])) action="{{route('admin.add.edit.aboutUs',$aboutUsdata['id'])}}" @else action="{{route('admin.add.edit.aboutUs')}}" @endif
        method="post" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" @if(!empty($aboutUsdata['image']))
                  value= "{{$aboutUsdata['image']}}"
                  @else value="{{old('image')}}"
                  @endif><br>
                  @if(!empty($aboutUsdata['image']))
                  <img src="{{asset($aboutUsdata['image'])}}" width="100" height="100" alt="" srcset="">
                  <a href="{{ route('admin.delete.aboutUs.image',$aboutUsdata['id']) }}">&nbsp;&nbsp;</a> 
                @endif
                </div> 

                  <div class="form-group">
                    <label for="textarea_1">Religion News Service's priority</label>
                    <textarea name="textarea_1" id="textarea_1" cols="20" class="textarea" rows="4"> @if(!empty($aboutUsdata['textarea_1']))
                      {{$aboutUsdata['textarea_1']}}
                      @else {{old('textarea_1')}}
                      @endif</textarea>
                  </div>

                  <div class="form-group">
                    <label for="textarea_2">Who is visiting the About Us page?</label>
                    <textarea name="textarea_2" id="textarea_2" cols="20" class="textarea" rows="4"> @if(!empty($aboutUsdata['textarea_2']))
                      {{$aboutUsdata['textarea_2']}}
                      @else {{old('textarea_2')}}
                      @endif</textarea>
                  </div>

                <!--  <div class="form-group">-->
                <!--    <label for="image_1">Image</label>-->
                <!--    <input type="file" class="form-control" id="image_1" name="image_1" @if(!empty($aboutUsdata['image_1']))-->
                <!--  value= "{{$aboutUsdata['image']}}"-->
                <!--  @else value="{{old('image_1')}}"-->
                <!--  @endif><br>-->
                <!--  @if(!empty($aboutUsdata['image_1']))-->
                <!--  <img src="{{asset($aboutUsdata['image_1'])}}" width="100" height="100" alt="" srcset="">-->
                <!--  <a href="{{ route('admin.delete.aboutUs.image',$aboutUsdata['id']) }}">&nbsp;&nbsp;</a> -->
                <!--@endif-->
                <!--</div> -->
     
                <!--<div class="form-group">-->
                <!--  <label for="textarea_3">Religion News</label>-->
                <!--  <textarea name="textarea_3" id="textarea_3" cols="20" class="textarea" rows="4"> @if(!empty($aboutUsdata['textarea_3']))-->
                <!--    {{$aboutUsdata['textarea_3']}}-->
                <!--    @else {{old('textarea_3')}}-->
                <!--    @endif</textarea>-->
                <!--</div>-->
                  
              

                  <!--<div class="form-group">-->
                  <!--  <label for="url">Url</label>-->
                  <!--  <input type="text" class="form-control" name="url" id="url" placeholder="Enter url"-->
                  <!--  @if(!empty($aboutUsdata['url']))-->
                  <!--  value= "{{$aboutUsdata['url']}}"-->
                  <!--  @else value="{{old('url')}}"-->
                  <!--  @endif>-->
                  <!--</div>-->

            </div>
          </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{$button}}</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

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
  </script>
@endsection

