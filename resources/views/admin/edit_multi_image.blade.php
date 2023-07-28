@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-6">

                <div class="card">
                    <div class="card-body p-5">
                    
                        <form method="post" action="{{ route('update.image') }}" enctype="multipart/form-data">
                            @csrf

                            <h4 class="card-title mb-4">Edit Multi Image</h4>
                            <input type="hidden" name="id" value="{{ $multi_image->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Choose New Image</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" name="multi_image"  id="image">
                                    <img id="showImage" src="{{ (!empty($multi_image->multi_image))? url($multi_image->multi_image):url('upload/no_image.jpg') }}" alt="avatar-5" class="rounded avatar-lg mt-3">
                                </div>
                            </div>
                            <div class="">
                                <input type="submit" class="btn btn-info" value="Update Image">
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