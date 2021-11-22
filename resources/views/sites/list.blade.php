@extends('admin.layouts.main')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets\admin\css\search.css')}}">
@endsection

@section('breadcrumb')
<!-- Page-header start -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4></h4>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Site Table</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">List</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->
@endsection

@section('card')
<!-- Basic table card start -->
<div class="card">
    <div class="card-header">
        <h5>Site Table</h5>
        <!--   <span>use class <code>table</code> inside table element</span>-->


        <!--Search from list-->

        <div class="topnav">
            <!--Add button-->
            <div class="add">
                <button type="button" class="btn btn-primary">
                    <a href="sites/create">Add</a>
                </button>
            </div>

            <div class="search-container">

                <form action="/sites" method="Get">
                    <div class="select">

                        <?php

                        $get_data = request()->has('status') ? request()->get('status') : '';
                        // dd($get_data);
                        //dd(request()->get('status'));
                        ?>
                        <select class="form-control" name="status">


                            <option value=''>Status</option>
                            <option value='0' {{ $get_data == 0 ? "selected" :''}}>Deactive</option>
                            <option value='1' {{ $get_data == 1 ? "selected" :''}}>Active</option>



                        </select>

                    </div>
                    <input type="text" placeholder="Search.." value="{{request()->input('search')}}" name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>

                </form>

            </div>
        </div>

        <!--end search list-->




        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>

                        <tr>

                            <th>Serial</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Database Link</th>
                            <th>Database name</th>
                            <th>Database Username</th>
                            <th>note</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $count = $site_list->perPage()*($site_list->currentPage()-1);
                        //dd($get_data==0);
                        ?>


                        @foreach($site_list as $list)
                        <tr>

                            <th scope="row"><?php $count++ ?>{{$count}}</th>
                            <td>{{$list->name}}</td>
                            <td>{{$list->username}}</td>
                            <td>{{$list->db_link}}</td>
                            <td>{{$list->db_name}}</td>
                            <td>{{$list->db_user_name}}</td>
                            <td>{{$list->note}}</td>


                            <td>{{$list->status}}</td>
                            <td rowsan="2">
                                <div class="btn-group" role="group">

                                    <a href="{{route('sites.edit',$list->id)}}" class="btn">
                                        <span class="fas fa-edit"> </span> </a>


                                    <form action="{{route('sites.destroy',$list->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">
                                            <span class="fas fa-trash"></span>
                                        </button>

                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>



            {{$site_list->links()}}
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>


    </div>

    <!-- Basic table card end -->



    @endsection