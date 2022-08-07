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
              <li class="breadcrumb-item active">Edit Package</li>
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
        @if(!empty($packagedata['id'])) action="{{route('admin.add.edit.package',$packagedata['id'])}}" @else action="{{route('admin.add.edit.package')}}" @endif
        method="post" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter title"
                  @if(!empty($packagedata['title']))
                  value= "{{$packagedata['title']}}"
                  @else value="{{old('title')}}"
                  @endif>
                </div>

                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" name="price" id="price" placeholder="Enter price"
                  @if(!empty($packagedata['price']))
                  value= "{{$packagedata['price']}}"
                  @else value="{{old('price')}}"
                  @endif>
                </div>

                  <div class="form-group">
                    <label>Our Packages</label>
                    <select class="form-control" name="packagetype_id">
                      <option>Select</option>
                      @forelse($packagetype as $data)
                      <option value="{{ $data->id }}"
                        @if (!empty($packagedata['packagetype_id']) && $packagedata['packagetype_id']==$data->id)
                        selected=""
                            
                        @else {{ old('packagetype_id') ==  $data->id ? 'selected' : '' }}                            
                        @endif
                        >{{ $data->package_type }}</option>
                      @empty
                      @endforelse
                    </select>
                  </div>

                  {{-- <div class="form-group">
                    <label for="offer">Offer</label>
                    <select id="offer" class="form-control" name="offer">
                      <option name="offer" value="yes" @if (!empty($packagedata['offer']) && $packagedata['offer']=="yes")
                      selected="" @endif>Yes</option>
                      <option name="offer" value="no" @if (!empty($packagedata['offer']) && $packagedata['offer']=="no")
                      selected="" @endif>No</option>
                    </select>
                  </div> --}}


                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" @if(!empty($packagedata['image']))
                  value= "{{$packagedata['image']}}"
                  @else value="{{old('image')}}"
                  @endif><br>
                  @if(!empty($packagedata['image']))
                  <img src="{{asset($packagedata['image'])}}" width="100" height="100" alt="" srcset=""><a href="{{ route('admin.delete.package.image',$packagedata['id']) }}">&nbsp;&nbsp;Delete Image</a> 
                @endif
                </div>  

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" id="description" class="textarea" cols="20" class="form-control" rows="4"> @if(!empty($packagedata['description']))
                    {{$packagedata['description']}}
                    @else {{old('description')}}
                    @endif</textarea>
                </div>

                  <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" name="url" id="url" placeholder="Enter url"
                    @if(!empty($packagedata['url']))
                    value= "{{$packagedata['url']}}"
                    @else value="{{old('url')}}"
                    @endif>
                  </div>

                  <div class="form-group">
                    <label for="best_price">Best Price Guaranteed</label>
                    <input type="text" class="form-control" name="best_price" id="best_price" placeholder="Enter best price"
                    @if(!empty($packagedata['best_price']))
                    value= "{{$packagedata['best_price']}}"
                    @else value="{{old('best_price')}}"
                    @endif>
                  </div>

                  {{-- <div class="form-group">
                    <label for="hotel_meals">Hotel+Meals Available</label>
                    <input type="text" class="form-control" name="hotel_meals" id="hotel_meals" placeholder="Enter hotel meals"
                    @if(!empty($packagedata['hotel_meals']))
                    value= "{{$packagedata['hotel_meals']}}"
                    @else value="{{old('hotel_meals')}}"
                    @endif>
                  </div> --}}

                  <div class="form-group">
                    <label for="call_support">24*7 Call Support</label>
                    <input type="text" class="form-control" name="call_support" id="call_support" placeholder="Enter call support"
                    @if(!empty($packagedata['call_support']))
                    value= "{{$packagedata['call_support']}}"
                    @else value="{{old('call_support')}}"
                    @endif>
                  </div>
                   
                  <div class="form-group">
                    <label for="best_description">Best Price Guaranteed Description</label>
                    <textarea name="best_description" id="best_description" class="textarea" cols="20" class="form-control" rows="4"> @if(!empty($packagedata['best_description']))
                      {{$packagedata['best_description']}}
                      @else {{old('best_description')}}
                      @endif</textarea>
                  </div>

                  {{-- <div class="form-group">
                    <label for="hotel_description">Hotel+Meals Available Description</label>
                    <textarea name="hotel_description" id="hotel_description" class="textarea" cols="20" class="form-control" rows="4"> @if(!empty($packagedata['hotel_description']))
                      {{$packagedata['hotel_description']}}
                      @else {{old('hotel_description')}}
                      @endif</textarea>
                  </div> --}}

                  <div class="form-group">
                    <label for="call_description">24*7 Call Support Description</label>
                    <textarea name="call_description" id="call_description" class="textarea" cols="20" class="form-control" rows="4"> @if(!empty($packagedata['call_description']))
                      {{$packagedata['call_description']}}
                      @else {{old('call_description')}}
                      @endif</textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <textarea name="meta_title" id="meta_title" cols="20" class="form-control" rows="4"> @if(!empty($packagedata['meta_title']))
                      {{$packagedata['meta_title']}}
                      @else {{old('meta_title')}}
                      @endif</textarea>
                  </div>

                  <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" cols="20" class="form-control" rows="4"> @if(!empty($packagedata['meta_description']))
                      {{$packagedata['meta_description']}}
                      @else {{old('meta_description')}}
                      @endif</textarea>
                  </div>

                  <div class="form-group">
                    <label for="meta_keywords">Meta Keywords</label>
                    <textarea name="meta_keywords" id="meta_keywords" cols="20" class="form-control" rows="4"> @if(!empty($packagedata['meta_keywords']))
                      {{$packagedata['meta_keywords']}}
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

