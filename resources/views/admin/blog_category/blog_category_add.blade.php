@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Add Blog Category</h4>
                        
                        <form method="post" action="{{ route('store.blog')}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="blog_category" class="form-control" type="text" value="" id="title">
                                    @error('blog_category')
                                        <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <input type="submit" value="Insert Blog Category" class="btn btn-info waves-effect waves-light">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection