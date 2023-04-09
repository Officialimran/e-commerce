@extends('admin.layout.layout')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        @if($slug=="personal")
        <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Settings</h4>
                        <h6>Update Personal Information</h6>
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
                        <form class="forms-sample" action="{{ url('admin/update-vendor-details/personal') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Vendor Email</label>
                                <div class="col-sm-9">
                                    <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="vendor_name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="vendor_name" value="{{ Auth::guard('admin')->user()->name }}" id="vendor_name" required="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vendor_mobile" class="col-sm-3 col-form-label">Mobile</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->mobile }}" name="vendor_mobile" id="vendor_mobile" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vendor_address" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="vendor_address" value="{{ $vendorDetails['address'] }}" id="vendor_address" required="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vendor_city" class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="vendor_city" value="{{ $vendorDetails['city'] }}" id="vendor_city" required="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vendor_state" class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="vendor_state" value="{{ $vendorDetails['state'] }}" id="vendor_state" required="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vendor_country" class="col-sm-3 col-form-label">Country</label>
                                <!-- <div class="col-sm-9">
                                    <input type="text" class="form-control" name="vendor_country" value="{{ $vendorDetails['country'] }}" id="vendor_country" required="">

                                </div> -->
                                <div class="col-sm-9">
                                    <select class="form-control" name="vendor_country" id="vendor_country">
                                        <option value="">Please select country</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country['country_name'] }}" @if($country['country_name']==$vendorDetails['country'] ) selected @endif>{{ $country['country_name'] }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vendor_pincode" class="col-sm-3 col-form-label">Pincode</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="vendor_pincode" value="{{ $vendorDetails['pincode'] }}" id="vendor_pincode" required="">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="vendor_image" class="col-sm-3 col-form-label">Admin Photo</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="vendor_image" id="vendor_image">
                                    @if(!empty(Auth::guard('admin')->user()->image))
                                    <a href="{{ url('admin/images/photos/'.Auth::guard('admin')->user()->image) }}" target="_blank">View Image</a>
                                    <input type="hidden" name="current_vendor_image" value="{{ Auth::guard('admin')->user()->image }}">
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
        @elseif($slug=="business")
        <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Settings</h4>
                        <h6>Update Business Information</h6>
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
                        <form class="forms-sample" action="{{ url('admin/update-vendor-details/business') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Business Email</label>
                                <div class="col-sm-9">
                                    <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="shop_name" class="col-sm-3 col-form-label">Shop Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="shop_name" value="{{ $vendorDetails['shop_name'] }}" id="shop_name" required="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shop_mobile" class="col-sm-3 col-form-label">Mobile</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $vendorDetails['shop_mobile'] }}" name="shop_mobile" id="shop_mobile" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shop_address" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="shop_address" value="{{ $vendorDetails['shop_address'] }}" id="shop_address" required="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shop_city" class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="shop_city" value="{{ $vendorDetails['shop_city'] }}" id="shop_city" required="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shop_state" class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="shop_state" value="{{ $vendorDetails['shop_state'] }}" id="shop_state" required="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shop_country" class="col-sm-3 col-form-label">Country</label>
                                <!-- <div class="col-sm-9">
                                    <input type="text" class="form-control" name="shop_country" value="{{ $vendorDetails['shop_country'] }}" id="shop_country" required="">

                                </div> -->
                                <div class="col-sm-9">
                                    <select class="form-control" name="shop_country" id="shop_country">
                                        <option value="">Please select country</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country['country_name'] }}" @if($country['country_name']==$vendorDetails['shop_country'] ) selected @endif>{{ $country['country_name'] }}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="shop_pincode" class="col-sm-3 col-form-label">Pincode</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="shop_pincode" value="{{ $vendorDetails['shop_pincode'] }}" id="shop_pincode" required="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shop_website" class="col-sm-3 col-form-label">Website</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="shop_website" value="{{ $vendorDetails['shop_website'] }}" id="shop_website" required="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shop_email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="shop_email" value="{{ $vendorDetails['shop_email'] }}" id="shop_email" required="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address_proof " class="col-sm-3 col-form-label">Address Proof</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="address_proof" id="address_proof">
                                        <option value="Passport" @if($vendorDetails['address_proof']=="Passport" ) selected @endif>Passport</option>
                                        <option value="NID Card" @if($vendorDetails['address_proof']=="NID Card" ) selected @endif>NID Card</option>
                                        <option value="PAN" @if($vendorDetails['address_proof']=="PAN" ) selected @endif>Pan</option>
                                        <option value="Driving License" @if($vendorDetails['address_proof']=="Driving License" ) selected @endif>Driving License</option>
                                        <option value="Aadhar Card" @if($vendorDetails['address_proof']=="Aadhar Card" ) selected @endif>Aadhar Card</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="business_license_number" class="col-sm-3 col-form-label">business license number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="business_license_number" value="{{ $vendorDetails['business_license_number'] }}" id="business_license_number" required="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gst_number" class="col-sm-3 col-form-label">GST Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="gst_number" value="{{ $vendorDetails['gst_number'] }}" id="gst_number" required="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pan_number" class="col-sm-3 col-form-label">Pan Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="pan_number" value="{{ $vendorDetails['pan_number'] }}" id="pan_number" required="">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address_proof_image" class="col-sm-3 col-form-label">Shop Photo</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="address_proof_image" id="address_proof_image">
                                    @if(!empty($vendorDetails['address_proof_image']))
                                    <a href="{{ url('admin/images/proofs/'.$vendorDetails['address_proof_image']) }}" target="_blank">View Image</a>
                                    <input type="hidden" name="current_address_proof" value="{{ $vendorDetails['address_proof_image'] }}">
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
        @elseif($slug=="bank")
        <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Settings</h4>
                        <h6>Update Bank Information</h6>
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
                        <form class="forms-sample" action="{{ url('admin/update-vendor-details/bank') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Bank Email Email</label>
                                <div class="col-sm-9">
                                    <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="account_holder_name" class="col-sm-3 col-form-label">Acount Holder Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="account_holder_name" value="{{ $vendorDetails['account_holder_name'] }}" name="account_holder_name" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bank_name" class="col-sm-3 col-form-label">Bank Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="bank_name" value="{{ $vendorDetails['bank_name'] }}" id="bank_name" required="">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="account_number" class="col-sm-3 col-form-label">Account Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $vendorDetails['account_number'] }}" name="account_number" id="account_number" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bank_ifsc_code" class="col-sm-3 col-form-label">Bank IFSC Code</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $vendorDetails['bank_ifsc_code'] }}" name="bank_ifsc_code" id="bank_ifsc_code" required="">
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
        @endif
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>



@endsection