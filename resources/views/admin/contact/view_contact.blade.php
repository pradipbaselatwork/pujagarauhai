@extends('layouts.admin_layout.admin_layout')
@section('content')
<?php 
use App\contact;
$contact = contact::get();
?>
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
              <li class="breadcrumb-item active">Contact Request</li>
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Contact Request</h3>
            </div>
            <div class="card-body">
              <table id="banner" class="table table-bordered table-striped  text-center">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email Address</th>
                  <th>Phone</th>
                  <th>Address</th> 
                  <th>Description</th> 
                </tr>
                </thead>
                <tbody>
               @forelse($contact as $data)
                  <td>{{$data->id}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->phone}}</td>
                  <td>{{$data->address}}</td>
                  <td>{{$data->description}}</td>

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



