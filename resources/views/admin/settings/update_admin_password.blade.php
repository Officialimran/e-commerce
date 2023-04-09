@extends('admin.layout.layout')

@section('content')

<div class="main-panel">        
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Settings</h4>
                    <h6>Update Admin Password</h6>
                        @if(Session::has('error_message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ session::get('error_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif


                        @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session::get('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    <form class="forms-sample" action="{{ url('admin/update-admin-password') }}" method="post">@csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Admin Email</label>
                            <div class="col-sm-9">
                                <input class="form-control" value="{{ $adminDetails['email']}}" readonly="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Type</label>
                            <div class="col-sm-9">
                                <input class="form-control" value="{{ $adminDetails['type']}}" readonly="">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="current_password" class="col-sm-3 col-form-label">Current Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Type Current Password" required="">
                                <span id="check_password"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_password" class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Type New Password" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirm_password" class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Type Confirm Password" required="">
                            </div>
                        </div>
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Remember me
                            <i class="input-helper"></i></label>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

        </div> 
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>

    

@endsection