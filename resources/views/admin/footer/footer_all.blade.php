@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Footer Page</h4>
                        
                        <form method="post" action="{{ route('update.about',$allfooter->id)}}">
                            @csrf

                                <input type="hidden" name="id" value="{{ $allfooter->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10 mb-3">
                                    <input name="number" class="form-control" type="text" value="{{ $allfooter->number }}" id="number">
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10 mb-3">
                                    <textarea required="" class="form-control" name="short_description" type="text" id="short_description" rows="5">{{ $allfooter->short_description }}</textarea>
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10 mb-3">
                                    <input class="form-control" name="address" type="text" id="address" value="{{ $allfooter->address }}">
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10 mb-3">
                                    <input class="form-control" name="email" type="email" id="email" value="{{ $allfooter->email }}">
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10 mb-3">
                                    <input class="form-control" name="facebook" type="text" id="facebook" value="{{ $allfooter->facebook }}">
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10 mb-3">
                                    <input class="form-control" name="twitter" type="text" id="twitter" value="{{ $allfooter->twitter }}">
                                </div>
                            
                                <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                                <div class="col-sm-10 mb-3">
                                    <input class="form-control" name="copyright" type="text" id="copyright" value="{{ $allfooter->copyright }}">
                                </div>
                            
                            </div>
                            <input type="submit" value="Update Footer Page" class="btn btn-info waves-effect waves-light">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection