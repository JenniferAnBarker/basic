@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile Page</h4>
                        
                        <form method="post" action="{{ route('store.profile')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="name" class="form-control" type="text" value="{{ $editData->name }}" id="name">
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="email" class="form-control" type="email" value="{{ $editData->email }}" id="email">
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="username" class="form-control" type="text" value="{{ $editData->username }}" id="username">
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="profile_image" class="form-control" type="file" id="image">
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 mb- mt-3">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ asset('backend/assets/images/small/img-5.jpg')}}" alt="Card image cap">
                                </div>
                            </div>
                            <input type="submit" value="Update Profile" class="btn btn-info waves-effect waves-light">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});

</script>

@endsection