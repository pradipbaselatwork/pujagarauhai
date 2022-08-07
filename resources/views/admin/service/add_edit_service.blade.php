@extends('layouts.admin_layout.admin_layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Service</li>
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
        @if(!empty($servicedata['id'])) action="{{route('admin.add.edit.service',$servicedata['id'])}}" @else action="{{route('admin.add.edit.service')}}" @endif
        method="post" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter title"
                  @if(!empty($servicedata['title']))
                  value= "{{$servicedata['title']}}"
                  @else value="{{old('title')}}"
                  @endif>
                </div>

                <div class="form-group">
                  <label>Our Services</label>
                  <select class="form-control" name="servicetype_id">
                    <option>Select</option>
                    @forelse($serviceType as $data)
                    <option value="{{ $data->id }}"
                      @if (!empty($servicedata['servicetype_id']) && $servicedata['servicetype_id']==$data->id)
                      selected=""
                          
                      @else {{ old('servicetype_id') ==  $data->id ? 'selected' : '' }}                            
                      @endif
                      >{{ $data->service_type }}</option>
                    @empty
                    @endforelse
                  </select>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" @if(!empty($servicedata['image']))
                  value= "{{$servicedata['image']}}"
                  @else value="{{old('image')}}"
                  @endif><br>
                  @if(!empty($servicedata['image']))
                  <img src="{{asset($servicedata['image'])}}" width="100" height="100" alt="" srcset=""><a href="{{ route('admin.delete.service.image',$servicedata['id']) }}">&nbsp;&nbsp;</a> 
                @endif
                </div>  

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="textarea" id="description" cols="20" class="form-control" rows="4"> @if(!empty($servicedata['description']))
                      {{$servicedata['description']}}
                      @else {{old('description')}}
                      @endif</textarea>
                  </div>

                  <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" name="url" id="url" placeholder="Enter url"
                    @if(!empty($servicedata['url']))
                    value= "{{$servicedata['url']}}"
                    @else value="{{old('url')}}"
                    @endif>
                  </div>
                 
                <!--  <div class="form-group">-->
                <!--    <label for="image_2">Image 2</label>-->
                <!--    <input type="file" class="form-control" id="image_2" name="image_2" @if(!empty($servicedata['image_2']))-->
                <!--  value= "{{$servicedata['image_2']}}"-->
                <!--  @else value="{{old('image_2')}}"-->
                <!--  @endif><br>-->
                <!--  @if(!empty($servicedata['image_2']))-->
                <!--  <img src="{{asset($servicedata['image_2'])}}" width="100" height="100" alt="" srcset=""><a href="{{ route('admin.delete.service.image',$servicedata['id']) }}">&nbsp;&nbsp;</a> -->
                <!--@endif-->
                <!--</div> -->

                  <!--<div class="form-group">-->
                  <!--  <label for="img2_description">Second Description</label>-->
                  <!--  <textarea name="img2_description" class="textarea" id="img2_description" cols="20" class="form-control" rows="4"> @if(!empty($servicedata['img2_description']))-->
                  <!--    {{$servicedata['img2_description']}}-->
                  <!--    @else {{old('img2_description')}}-->
                  <!--    @endif</textarea>-->
                  <!--</div>-->

                <!--  <div class="form-group">-->
                <!--    <label for="image_3">Image 3</label>-->
                <!--    <input type="file" class="form-control" id="image_3" name="image_3" @if(!empty($servicedata['image_3']))-->
                <!--  value= "{{$servicedata['image_3']}}"-->
                <!--  @else value="{{old('image_3')}}"-->
                <!--  @endif><br>-->
                <!--  @if(!empty($servicedata['image_3']))-->
                <!--  <img src="{{asset($servicedata['image_3'])}}" width="100" height="100" alt="" srcset=""><a href="{{ route('admin.delete.service.image',$servicedata['id']) }}">&nbsp;&nbsp;</a> -->
                <!--@endif-->
                <!--</div> -->

                  <!--<div class="form-group">-->
                  <!--  <label for="img3_description">Third Description</label>-->
                  <!--  <textarea name="img3_description" class="textarea" id="img3_description" cols="20" class="form-control" rows="4"> @if(!empty($servicedata['img3_description']))-->
                  <!--    {{$servicedata['img3_description']}}-->
                  <!--    @else {{old('img3_description')}}-->
                  <!--    @endif</textarea>-->
                  <!--</div>-->
                  <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <textarea name="meta_title" id="meta_title" cols="20" class="form-control" rows="4"> @if(!empty($servicedata['meta_title']))
                      {{$servicedata['meta_title']}}
                      @else {{old('meta_title')}}
                      @endif</textarea>
                  </div>

                  <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" cols="20" class="form-control" rows="4"> @if(!empty($servicedata['meta_description']))
                      {{$servicedata['meta_description']}}
                      @else {{old('meta_description')}}
                      @endif</textarea>
                  </div>

                  <div class="form-group">
                    <label for="meta_keywords">Meta Keywords</label>
                    <textarea name="meta_keywords" id="meta_keywords" cols="20" class="form-control" rows="4"> @if(!empty($servicedata['meta_keywords']))
                      {{$servicedata['meta_keywords']}}
                      @else {{old('meta_keywords')}}
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

