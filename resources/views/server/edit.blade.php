@extends('admin.layouts.main')
@section('form')

<head>
      <link rel="stylesheet" type="text/css" href="{{asset('assets\admin\css\required.css')}}">
</head>


<!-- Page-header start -->
<div class="page-header">
      <div class="row align-items-end">
            <div class="col-lg-8">
                  <div class="page-header-title">
                        <div class="d-inline">
                              <h4>Server Inputs</h4>
                              @if (Session::has('message'))
                              <div class="alert">
                                    <div class="location-selector">
                                          <div class="bit top" data-position="top center">{{ Session::get('message') }}</div>
                                    </div>
                                    @php
                                    Session::forget('message');
                                    @endphp
                              </div>
                              @endif
                              <!--  <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span>-->
                        </div>
                  </div>
            </div>
            <div class="col-lg-4">
                  <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                              <li class="breadcrumb-item">
                                    <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                              </li>
                              <li class="breadcrumb-item"><a href="#!">Servers</a>
                              </li>
                              <li class="breadcrumb-item"><a href="#!">Add New Server</a>
                              </li>
                        </ul>
                  </div>
            </div>
      </div>
</div>
<!-- Page-header end -->
<!-- Page body start -->

<!-- Basic Form Inputs card start -->
<div class="card">
      <div class="card-header">
            <h5>Server Inputs</h5>
            <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->


            <div class="card-header-right">
                  <i class="icofont icofont-spinner-alt-5"></i>
            </div>

      </div>
      <div class="card-block">

            <h4 class="sub-title">Server Inputs</h4>

            <form action="/servers/{{$find_server_id->id}}" method="Post">
                  @csrf
                  @method('PUT')
                  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">IP
                              <span class="required">*</span>
                        </label>
                        <div class="col-sm-10">
                              <input type="text" class="form-control" placeholder="IP" value="{{$find_server_id->IP}}" name="ip" required>
                        </div>
                  </div>
                  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Server Name
                              <span class="required">*</span>
                        </label>
                        <div class="col-sm-10">
                              <input type="text" class="form-control" placeholder="Servername" value="{{$find_server_id->server_name}}" name="servername" required>
                        </div>
                  </div>

                  <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
            </form>

      </div>
</div>


<!-- Basic Form Inputs card end -->

@endsection