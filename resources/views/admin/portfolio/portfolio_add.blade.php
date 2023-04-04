@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Portfolio</h4>
                        
                        <form method="post" action="{{ route('update.about')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="portfolio_name" class="form-control" type="text" value="" id="title">
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="portfolio_title" class="form-control" type="text" value="" id="short_title">
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10 mb-3">
                                    <textarea id="elm1" name="portfolio_description" class="form-control"></textarea>
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="portfolio_image" class="form-control" type="file" id="portfolio_image">
                                </div>
{{-- 
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 mb- mt-3">
                                    <img id="showImage" class="rounded avatar-lg" src="{{(empty($aboutpage->about_image))? url('upload/about_page/no_image.jpg'): url($aboutpage->about_image) }}" alt="Card image cap">
                                </div> --}}
                            </div>
                            <input type="submit" value="Update Portfolio" class="btn btn-info waves-effect waves-light">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function(){
    $('#portfolio_image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});

</script>

@endsection