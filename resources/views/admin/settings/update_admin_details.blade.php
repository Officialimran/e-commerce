@extends('admin.layout.layout')

@section('content')

<div class="main-panel">        
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Settings</h4>
                    <h6>Update Admin Details</h6>
                        @if(Session::has('error_message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ session::get('error_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif


                        @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
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
                    <form class="forms-sample" action="{{ url('admin/update-admin-details') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="form-group row">
                            <label for="admin_email" class="col-sm-3 col-form-label">Admin Email</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="admin_email" name="admin_email" value="{{ Auth::guard('admin')->user()->email }}" readonly="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="admin_type" class="col-sm-3 col-form-label">Type</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="admin_type" value="{{ Auth::guard('admin')->user()->type }}" name="admin_type" readonly="">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="admin_name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="admin_name" value="{{ Auth::guard('admin')->user()->name }}" id="admin_name" required="">
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="admin_mobile" class="col-sm-3 col-form-label">Mobile</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->mobile }}" name="admin_mobile" id="admin_mobile" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="admin_image" class="col-sm-3 col-form-label">Admin Photo</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="admin_image" id="admin_image">
                                @if(!empty(Auth::guard('admin')->user()->image))
                                    <a href="{{ url('admin/images/photos/'.Auth::guard('admin')->user()->image) }}" target="_blank">View Image</a>
                                    <input type="hidden" name="current_admin_image" value="{{ Auth::guard('admin')->user()->image }}">
                                @endif
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