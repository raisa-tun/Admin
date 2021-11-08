@extends('admin.layouts.main')

@section('list')

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
                                <!-- Basic table card start -->
                                <div class="card">
                                            <div class="card-header">
                                                <h5>Site Table</h5>
                                             <!--   <span>use class <code>table</code> inside table element</span>-->

                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                          
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Name</th>
                                                                <th>Username</th>
                                                                <th>Database Link</th>
                                                                <th>Database name</th>
                                                                <th>Database Username</th>
                                                                <th>note</th>
                                                                <th>Status</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                         @foreach($site_list as $list)
                                                            <tr>
                                                                <th scope="row">{{$list->id}}</th>
                                                                <td>{{$list->name}}</td>
                                                                <td>{{$list->username}}</td>
                                                                <td>{{$list->db_link}}</td>
                                                                <td>{{$list->db_name}}</td>
                                                                <td>{{$list->db_user_name}}</td>
                                                                <td>{{$list->note}}</td>
                                                                <td>{{$list->status}}</td>
                                                                <td>
                                                                        <button type="submit" 
                                                                                class="border-b-2 pb-2 border-dotted italic
                                                                                text-red-500">
                                                                                <a href="sites/{{$list->id}}/edit" class="italic" >
                                                                                    Edit &rarr;</a>
                                                                        </button>
                                                                </td>
                                                                <td>
                                                                        <form action="sites/{{$list->id}}" method="POST">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button type="submit" class="border-b-2 pb-2 border-dotted italic
                                                                                    text-red-500">
                                                                                Delete &rarr;
                                                                            
                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                    
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="text-center">
                                                           <button type="button" class="btn btn-primary">
                                                               <a href = "sites/create">Add</a>
                                                           </button>
                                                       </div>
                                        <!-- Basic table card end -->

@endsection