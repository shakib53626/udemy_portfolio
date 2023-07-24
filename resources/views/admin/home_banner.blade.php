@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                    
                        <form method="post" action="{{ route('update.banner') }}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="card-title">Home Page Banner</h4>
                            <input type="hidden" name="id" value="{{ $homebanner->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="title" value="{{ $homebanner->title }}" id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Short Description</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="short_desc" value="{{ $homebanner->short_desc }}" id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Video Url</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="video_url" value="{{ $homebanner->video_url }}" id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Banner Image</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" name="banner_image"  id="image">
                                    <img id="showImage" src="{{ (!empty($homebanner->banner_image))? url($homebanner->banner_image):url('upload/no_image.jpg') }}" alt="avatar-5" class="rounded avatar-lg mt-3">
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-info" value="Update Banner">
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        
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