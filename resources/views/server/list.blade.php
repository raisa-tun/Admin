@extends('admin.layouts.main')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('assets\admin\css\search.css')}}">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

<!-- <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>-->
@endsection
<!-- Page-header start -->
@section('breadcrumb')
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

      {{--  @if (Session::has('message'))
        <div class="alert">
            <div class="location-selector">
                <div class="bit top" data-position="top center">{{ Session::get('message') }}</div>
            </div>
            @php
                Session::forget('message');
            @endphp
        </div>
        @endif--}}

        <div class="topnav">
            <!--Add button-->
            <div class="add">
                <button type="button" class="btn btn-secondary">
                    <a href="{{route('servers.create')}}">Add</a>
                </button>
            </div>

        </div>



        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table" id="table_id">

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

                            <th scope="row"><?php $count++ ?>{{$count}}</th>
                            <td>{{$list->IP}}</td>
                            <td>{{$list->server_name}}</td>

                            <td style="white-space:nowrap; width:1%;">
                                <div class="tabledit-toolbar btn-toolbar" style="text-align:left;">
                                    <div class="btn-group btn-group-sm" style="float:none;">

                                        <form action="{{route('servers.destroy',$list->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="tabledit-edit-button btn btn-light waves-effect waves-light" style="float:none;margin:5px;">
                                                <a href="{{route('servers.edit',$list->id)}}">
                                                    <span class="icofont icofont-ui-edit">
                                                        
                                                    </span>
                                                </a>
                                            </button>
                                            <button type="submit" class="tabledit-delete-button btn btn-light waves-effect waves-light" style="float:none;margin:5px;">
                                                <span class="icofont icofont-ui-delete">
                                                      
                                                </span>
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<!--<script type="text/javascript" src="DataTables/datatables.min.js"></script>-->
<script>
    $(document).ready(function() {
        //  $.fn.dataTable.Editor.classes.form.button = "btn";
        $('#table_id').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'collection',
                className: "color",
                text: 'Export',
                buttons: [{
                        extend: "pdf",
                        className: "btn-primary"
                    },
                    {
                        extend: "excel",
                        className: "btn-primary"
                    },
                    {
                        extend: "csv",
                        className: "btn-primary"
                    }
                ],
            }],
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }


        });


    });
</script>
@endsection