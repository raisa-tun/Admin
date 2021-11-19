@extends('admin.layouts.main')
@section('page-header')
<head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="{{asset('assets\admin\css\search.css')}}">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
 <!-- <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>-->
   
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
                        
                     <!--Search from list-->

                    <div class = "topnav">
                                          <!--Add button-->
                            <div class="add">
                                 <button type="button" class="btn btn-primary">
                                      <a href = "servers/create">Add</a>
                                 </button>
                             </div>
                
                     </div>

                                        <!--end search list-->

                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table" id="table_id" >
                                                        
                                                            <form action="/servers" method="GET">
                                                            <div class="dataTables_length" id="table_id_length">
                                                                <select name ="table_id_length" area-controls="table_id" data-column="0" id="filter-select">
                                                                    <option value="">Select..</option>
                                                                    @foreach($server_list as $list)
                                                                    <option value="{{$list->IP}}">{{$list->IP}}</option>
                                                                    @endforeach  
                                                                </select>
                                                                <button type="submit"><i class="fa fa-search"></i></button> 
                                                                </div>
                                                            </form>
                                                        
                                                        <thead>
                                                          
                                                            <tr>
                                                                
                                                                <th>Serial</th>
                                                                <th>IP</th>
                                                                <th>Server Name</th>
                                                                <th>Action</th>
                                                                
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        
                                                          

                                                                @foreach($server_list as $list)
                                                                    <tr>
                                                            
                                                                        <th scope="row"><?php $count++?>{{$count}}</th>
                                                                        <td>{{$list->IP}}</td>
                                                                        <td>{{$list->server_name}}</td>
                                                                        
                                                                        
                                                                        <td>
                                                                                <div class="btn-group" role="group">
                                                                                    <div class="col-md-6 custom">
                                                                                            <a href="servers/{{$list->id}}/edit" class="btn btn-xs" >
                                                                                                <span class="fas fa-edit"> </span>
                                                                                            </a>
                                                                                    </div>
                                                                                    <div class="col-md-6 custom">
                                                                                            <form action="/servers/{{$list->id}}" method="POST">
                                                                                                    @csrf
                                                                                                    @method('delete')
                                                                                                    <button type="submit" class="btn btn-xs">
                                                                                                            <span class="fas fa-trash"></span>
                                                                                                
                                                                                                    </button>
                                                                                            </form>
                                                                                    </div> 
                                                                                </div> 
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tfoot>
                                                    </table>
                                                    
                                                </div>
                                            
                  
                
                                              {{$server_list->links()}}  
                                            </div>
                    </div>                           
                                            
        </div>
                                        
                                        <!-- Basic table card end -->


@endsection

@section('script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<!--<script type="text/javascript" src="DataTables/datatables.min.js"></script>-->
<script>
    $(document).ready( function () {
    $('#table_id').DataTable({
       // dom: 'Plfrtip'
       initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
       
    
    });

    $('#filer-select').change(function(){
        table.column($(this).data('column') )
        .search($(this).val() )
        .draw();
    });
} );

</script>
@endsection