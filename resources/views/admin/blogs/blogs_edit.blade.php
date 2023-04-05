@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Edit blog</h4>
                        
                        <form method="post" action="{{ route('store.blog')}}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{$blog->id}}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10 mb-3">
                                    <select name="blog_category_id" class="form-select" aria-label="Default select example">
                                        <option selected=""></option>
                                        @foreach($categories as $item)
                                        <option value="{{$item->id}}">{{$item->blog_category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="blog_title" class="form-control" type="text" value="{{$blog->blog_title}}" id="blog_title">
                                    @error('blog_title')
                                        <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Tags</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="blog_tags" class="form-control" value="{{$blog->blog_tags}}" type="text" data-role="tagsinput">
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10 mb-3">
                                    <textarea id="elm1" name="blog_description" class="form-control">{{$blog->blog_description}}</textarea>
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="blog_image" class="form-control" type="file" id="blog_image">
                                </div>

                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 mb- mt-3">
                                    <img id="showImage" class="rounded avatar-lg" src="{{(empty($blog->blog_image))? url('upload/about_page/no_image.jpg'): url($blog->blog_image) }}" alt="Card image cap">
                                </div>
                            </div>
                            <input type="submit" value="Edit Blog" class="btn btn-info waves-effect waves-light">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function(){
    $('#blog_image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});

</script>

@endsection