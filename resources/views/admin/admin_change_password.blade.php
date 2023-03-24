@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Change Password Page</h4>
                        
                        @if(count($errors)) 
                            @foreach($errors->all() as $error)
                            <p class="alert alert-danger alert-dismissible fade show">{{$error}}</p>
                            @endforeach
                        @endif

                        <form method="post" action="{{ route('update.password')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Current Password</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="old_password" class="form-control" type="password" value="" id="oldpassword">
                                </div>
                                
                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="new_password" class="form-control" type="password" value="" id="newpassword">
                                </div>
                                
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="confirm_password" class="form-control" type="password" value="" id="confirmpassword">
                                </div>
                                
                            </div>
                            <input type="submit" value="Change Password" class="btn btn-info waves-effect waves-light">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>


@endsection