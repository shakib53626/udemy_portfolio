@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        
            
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                        
                            <form method="post" action="{{ route('update.password') }}" enctype="multipart/form-data">
                                @csrf
                                <h4 class="card-title">Change Password</h4>

                                @if (count($errors))

                                    @foreach ($errors->all() as $error)
                                        <p class="alert alert-danger">{{ $error }}</p>                                        
                                    @endforeach
                                    
                                @endif

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="old_password" placeholder="Enter old password"  id="example-text-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="new_password" placeholder="Enter new password" id="example-text-input">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="confirm_password" placeholder="Confirm password" id="example-text-input">
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

@endsection