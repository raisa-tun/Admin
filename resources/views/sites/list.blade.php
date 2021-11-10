@extends('admin.layouts.main')

@section('page-header')

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>


 .topnav .search-container {
  float: right;
   
}


.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav input:hover{
    background:#ccc;
}

.topnav .add{
    padding:6px 10px;
    float:right;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
.topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
    
  }
.topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>
</head>

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

                                      <div class = "topnav">
                                          <!--Add button-->
                                          <div class="add">
                                                        <button type="button" class="btn btn-primary">
                                                                <a href = "sites/create">Add</a>
                                                        </button>
                                                    </div>
                                          <div class="search-container">
                                           
                                                <form action="/sites" >
                                                
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
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php 
                                                           // $count = $site_list->perPage()*($site_list->currentPage()-1);
                                                           
                                                        ?>
                                                         @foreach($site_list as $list)
                                                            <tr>
                                                    
                                                                <th scope="row"><?php $count++?>{{$count}}</th>
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
                                                                        <form action="/sites/{{$list->id}}" method="POST">
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
                                            
                  
                
                                              {{$site_list->links()}}  
                                            </div>
                                            
                                        

                                        
                                        <!-- Basic table card end -->
                                        <!--Pagiation-->
                 

@endsection
