@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Multi Image</h4> </br></br>
                        
                        <form method="post" action="{{ route('store.multi.image')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">About Multi Image</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="multi_image[]" class="form-control" type="file" id="about_image" multiple="">
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 mb- mt-3">
                                    <img id="showImage" class="rounded avatar-lg" src="{{url('upload/about_page/no_image.jpg')}}" alt="Card image cap">
                                    {{-- (empty($aboutpage->about_image))?  --}}
                                    
                                    {{-- : url($aboutpage->about_image) --}}
                                    
                                </div>
                            </div>
                            <input type="submit" value="Add Multi Image" class="btn btn-info waves-effect waves-light">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function(){
    $('#about_image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});

</script>

@endsection