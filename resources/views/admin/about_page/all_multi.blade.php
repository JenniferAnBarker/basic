@extends('admin.admin_master')
@section('admin')



        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Data Tables</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Data Tables</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title mb-4">All Multi Images</h4>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>About Multi Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @foreach($allMultiImage as $item)
                                    <tr>
                                        <td>{{ $item->id}}</td>
                                        <td> <img src="{{ asset($item->multi_image)}}" alt="" style="width: 80px; height: 80px;"></td>
                                        
                                        <td>
                                            <a href="{{ route('edit.multi', $item->id)}}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-backspace"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                
            </div> <!-- container-fluid -->
        </div> <!-- page-content -->

@endsection