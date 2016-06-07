@extends('layout.index')
@section('content')

    <!-- Loading Container -->
    <div class="loading-container">
        <div class="loader"></div>
    </div>
    <!--  /Loading Container -->
    
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            
            <!-- /Page Sidebar -->
            <!-- Chat Bar -->
            
            <!-- /Chat Bar -->
            <!-- Page Content -->
            
                
                <!-- /Page Breadcrumb -->
                
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body">
                    
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="widget">
                                <div class="widget-header ">
                                    <span class="widget-caption">Editable DataTable</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="#" data-toggle="collapse">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="#" data-toggle="dispose">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="table-toolbar">
                                        <a id="editabledatatable_new" href="javascript:void(0);" class="btn btn-default">
                                            Add New User
                                        </a>
                                  
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="editabledatatable">
                                        <thead>
                                            <tr role="row">
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Recipe Name
                                                </th>
                                                <th>
                                                    Preparation
                                                </th>
                                                <th>
                                                    Time
                                                </th>
                                                <th>
                                                    Date
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>

                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($recipes as $recipe)
                                            <tr>
                                                <td>{!! $recipe['id'] !!}</td>
                                                <td>{!! \Illuminate\Support\Str::words($recipe['name'], $words = 5, $end = '...') !!}</td>
                                                <td>{!! \Illuminate\Support\Str::words($recipe['preparation'], $words = 15, $end = '...') !!}</td>
                                                <td>{!! $recipe['time_preparation'] !!}</td>
                                                <td class="center ">{!! $recipe['created_at']->format('d-m-Y') !!}</td>
                                                <td class="center ">{!! $recipe['status'] !!}</td>
                                                <td>
                                                    <button class="btn btn-info btn-xs edit" onclick="editrecipe({!!   $recipe['id'] !!}) " id="edit{!! $recipe['id'] !!}"><i class="fa fa-edit"></i> Edit</button>
                                                    <a href="#" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                        

                    </div>
                    <div class="settable">
                    
                    </div>
                </div>
                <!-- /Page Body -->
            
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>

  


@endsection