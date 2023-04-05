@extends('admin.admin_master')
@section('admin')



        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">All Messages</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title mb-4">Blog Categories</h4>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Number</th>
                                        <th>Message</th>
                                        <th>Date/ Time Sent</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @php($i = 1)
                                        @foreach($contact as $item)
                                    <tr>
                                        <td>{{ $i++}}</td>
                                        <td>{{ $item->name}}</td>
                                        <td>{{ $item->email}}</td>
                                        <td>{{ $item->subject}}</td>
                                        <td>{{ $item->phone}}</td>
                                        <td>{{ $item->message}}</td>
                                        <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                                        
                                        <td>
                                            {{-- <a href="{{ route('edit.message', $item->id)}}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a> --}}
                                            
                                            <a href="{{ route('delete.message', $item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-backspace"></i></a>
                                        
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