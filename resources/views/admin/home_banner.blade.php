@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-6"> 
                <div class="card p-4">
                    <div class="card-body">
                    
                        <form method="post" action="{{ route('update.banner') }}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="card-title mb-4">Banner Section</h4>
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
                            <div class="">
                                <input type="submit" class="btn btn-info" value="Update">
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-6">
                <div class="card p-4">
                    <div class="card-body">
                    
                        <form method="post" action="{{ route('update.about-content') }}" enctype="multipart/form-data">
                            @csrf

                            @php
                                $aboutData = App\Models\HomeAboutContent::find(1);
                            @endphp
                            <h3 class="card-title mb-4">About Section Content</h3>
                            <input type="hidden" name="id" value="{{ $aboutData->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="title" value="{{ $aboutData->title }}" id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Short Title</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="short_title" value="{{ $aboutData->short_title }}" id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Short Description</label>
                                <div class="col-sm-9">
                                    <textarea required="" class="form-control" rows="5" name="description" style="height: 131px;">{{ $aboutData->description }}</textarea>
                                </div>
                            </div>
                            <div class="">
                                <input type="submit" class="btn btn-info" value="Update">
                            </div>
                        </form>
                        
                    </div>
                </div>

                <div class="card">
                    <div class="card-body p-5">
                    
                        <form method="post" action="{{ route('update.multi-image') }}" enctype="multipart/form-data">
                            @csrf

                            <h4 class="card-title mb-4">About Section MultiImage Add</h4>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">About MultiImage</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" name="multi_image[]"  id="aboutImage" multiple>
                                    <img id="aboutShowImage" src="{{ asset('upload/no_image.jpg') }}" alt="avatar-5" class="rounded avatar-lg mt-3">
                                </div>
                            </div>
                            <div class="">
                                <input type="submit" class="btn btn-info" value="Add MultiImage">
                            </div>
                        </form>
                        
                    </div>
                </div>

                <div class="card p-4">
                    <div class="card-body">

                        @php
                            $multiImage = App\Models\AboutMultiImage::all();
                        @endphp

                        <h4 class="card-title mb-4">About Section MultiImage Edit & Delete</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>About Multi-Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                                @php($i=1)
                                @foreach ($multiImage as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td><img class="rounded avatar-sm" src="{{ asset($item->multi_image) }}" alt=""></td>
                                        <td>
                                            
                                            <a href="{{ route('edit.multi-image', $item->id) }}" class="btn btn-info">Edit </a>
                                            <a href="{{ route('delete.multi-image', $item->id) }}" id="delete" class="btn btn-danger">Delete </a>
                                        </td>
                                    </tr>
                                @endforeach
                            
                            
                            </tbody>
                        </table>



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

    $(document).ready(function(){
        $('#aboutImage').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#aboutShowImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>
@endsection