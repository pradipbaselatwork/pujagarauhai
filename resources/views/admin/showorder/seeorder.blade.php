@extends('layouts.admin_layout.admin_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catelogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order Update</li>
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
    <!-- Main content -->
    <section class="content">
      <div class="row">

    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">User Details</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
          <table id="" class="table table-bordered table-striped  text-center">
            <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email Address</th>
              <th>Payment Method</th>
              <th>Total Price</th> 
            </tr>
            </thead>
            <tbody>
           @forelse($showorder as $data)
              <td>{{$data->id}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->email}}</td>
              <td>{{$data->payment_method}}</td>
              <td>{{$data->total}}</td>
            </tr>
            @empty
            @endforelse
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

  
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Update Order</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
          <form action="{{route('admin.updateorder', $data->id)}}" method="post">
            @csrf
          <div class="form-group">
            <label for="inputStatus">Status</label>
            <select class="form-control custom-select" name="status">
              <option selected disabled>Select one</option>

            
              {{-- <option name="status" value="new" @if (!empty($order['status']) && $order['status']=="new")
                selected="" @endif>New</option> --}}

              <option name="status" value="canceled" @if (!empty($order['status']) && $order['status']=="canceled")
                selected="" @endif>Canceled</option>

              <option name="status" value="delevering" @if (!empty($order['status']) && $order['status']=="delevering")
                selected="" @endif>Delivering</option>

              <option name="status" value="approved" @if (!empty($order['status']) && $order['status']=="approved")
                selected="" @endif>Approved</option>

              <option name="status" value="paid"@if (!empty($order['status']) && $order['status']=="paid")
                selected="" @endif>Paid</option>
            </select>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
          
       

        </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">See Order</h3>
             {{-- <a href="{{route('admin.add.edit.order')}}" style="max-width: 150px; float:right; display:inline-block;" class="btn btn-block btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Add order</a> --}}
            </div>
            <div class="card-body">
              <table id="banner" class="table table-bordered table-striped  text-center">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Package Name</th>
                  <th>Price</th> 
                </tr>
                </thead>
                <tbody>
               @forelse($seeorder as $data)
                  <td>{{$data->id}}</td>
                   <td><img src="{{asset($data->image)}}" alt="" width="100" height="100" srcset=""></td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->price}}</td> 
                </tr>
                @empty
                <p>No Data</p>
                @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection



