@extends('admin.admin_master')
@section('admin')



        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Portfolio</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title mb-4">Portfolio Data</h4>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @foreach($portfolio as $item)
                                    <tr>
                                        <td>{{ $item->id}}</td>
                                        <td>{{ $item->portfolio_name}}</td>
                                        <td>{{ $item->portfolio_title}}</td>
                                        <td> <img src="{{ asset($item->portfolio_image)}}" alt="" style="width: 80px; height: 80px;"></td>
                                        
                                        <td>
                                            <a href="" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            {{-- {{ route('edit.multi', $item->id)}} --}}
                                            <a href="" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-backspace"></i></a>
                                        {{-- {{ route('delete.multi.image', $item->id)}} --}}
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