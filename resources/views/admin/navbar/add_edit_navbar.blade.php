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
              <li class="breadcrumb-item active">navbar Idea</li>
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
        @if(!empty($navbardata['id'])) action="{{route('admin.add.edit.navbar',$navbardata['id'])}}" @else action="{{route('admin.add.edit.navbar')}}" @endif
        method="post" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="category_name">Navbar</label>
                <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Navbar"
                @if(!empty($navbardata['category_name']))
                value= "{{$navbardata['category_name']}}"
                @else value="{{old('category_name')}}"
                @endif>
              </div>
       
              <div class="form-group">
                <label for="url">Url</label>
                <input type="text" class="form-control" name="url" id="url" placeholder=""
                @if(!empty($navbardata['url']))
                value= "{{$navbardata['url']}}"
                @else value="{{old('url')}}"
                @endif>
              </div>
            </div>
            <div class="col-md-6">
               
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <textarea type="description" name ="meta_title" id="meta_title" cols="20" class="form-control" rows="4"> @if(!empty($navbardata['meta_title']))
                    {{$navbardata['meta_title']}}
                    @else {{old('meta_title')}}
                    @endif</textarea>
                </div>

                  <div class="form-group">
                      <label for="meta_description">Meta Description</label>
                      <textarea type="description" name ="meta_description" id="meta_description" cols="20" class="form-control" rows="4"> @if(!empty($navbardata['meta_description']))
                      {{$navbardata['meta_description']}}
                      @else {{old('meta_description')}}
                      @endif</textarea>
                  </div>
                  
                  <div class="form-group">
                      <label for="meta_keyword">Meta Keyword</label>
                      <textarea type="description" name ="meta_keyword" id="meta_keyword" cols="20" class="form-control" rows="4"> @if(!empty($navbardata['meta_keyword']))
                      {{$navbardata['meta_keyword']}}
                      @else {{old('meta_keyword')}}
                      @endif</textarea>
                  </div>
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
@endsection

