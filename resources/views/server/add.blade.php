
@extends('admin.layouts.main')
@section('form')



 <!-- Page-header start -->
 <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <div class="d-inline">
                                                    <h4>Server Inputs</h4>
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
                                                 
                                                
                                                <form action ="/servers" method= "Post">
                                                @csrf
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">IP</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" placeholder="IP" name="ip">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Server Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" placeholder="Servername" name = "servername">
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