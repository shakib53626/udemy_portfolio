@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">
        
            
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                        
                            <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                                @csrf
                                <h4 class="card-title">Admin Profie Edit</h4>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="name" value="{{ $editData->name }}" id="example-text-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="username" value="{{ $editData->username }}" id="example-text-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="email" value="{{ $editData->email }}" id="example-text-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="profile_image"  id="image">
                                        <img id="showImage" src="{{ (!empty($editData->profile_image))? url('upload/profile_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="avatar-5" class="rounded avatar-lg mt-3">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-info" value="Update Profile">
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