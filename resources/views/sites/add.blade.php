
@extends('admin.layouts.main')
@section('form')



 <!-- Page-header start -->
                              <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <div class="d-inline">
                                                    <h4>Site Inputs</h4>
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
                                                    <li class="breadcrumb-item"><a href="#!">Sites</a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Add New Sites</a>
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
                                                    <h5>Site Inputs</h5>
                                                   <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->


                                                    <div class="card-header-right">
                                                        <i class="icofont icofont-spinner-alt-5"></i>
                                                    </div>

                                                </div>
                                                <div class="card-block">
                                                
                                                <h4 class="sub-title">Site Inputs</h4>
                                                 
                                                
                                                <form action ="{{route('sites.store')}}" method= "Post">
                                                @csrf
                                                       
                                                        <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Server Ip</label>
                                                                <div class="col-sm-10">
                                                                    <select id="filter-select" name="server_id">
                                                                        <option value="">Select..</option>
                                                                        @foreach($server as $ip)
                                                                        <option value="{{$ip->id}}">{{$ip->IP}}</option>
                                                                        @endforeach  
                                                                    </select>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" placeholder="Username" name="name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Username</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" placeholder="Username" name = "username">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Password</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" class="form-control" placeholder="Password input" name="password">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Database Link</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" placeholder="Database Link" name= "db_link" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Database Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" placeholder="Database Name" name="db_name" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Database Username</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" placeholder="Database Username" name="db_user_name" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Database Password</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" class="form-control" placeholder="Database Password" name="db_password" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Note</label>
                                                            <div class="col-sm-10">
                                                                <textarea rows="5" cols="5" class="form-control" placeholder="Note" name= "note"></textarea>
                                                            </div>
                                    

                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Status</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control" placeholder="Status" name="status" >
                                                                    <option>Status</option>
                                                                    <option>1</option>
                                                                    <option>0</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                 
                                                        
                                                        <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                       </div>
                                                    </form>
                                                    
                                              </div>
                                         </div> 
                                     </div> 
                                 </div>                                       
                                 
                                 <!-- Basic Form Inputs card end -->

@endsection