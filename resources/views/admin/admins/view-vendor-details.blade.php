@extends('admin.layout.layout')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <p><a href="{{ url('admin/admins/vendor') }}" class="float-right"><- Back to Vendor</a></p>
        <br>
        <hr>
        <div class="row">

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Settings</h4>
                        <h6>Personal Information</h6>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Vendor Email</label>
                            <div class="col-sm-9">
                                <input class="form-control" value="{{ $vendorDetails['vendor_personal']['email'] }}" readonly="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vendor_name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['name'] }}" readonly="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vendor_mobile" class="col-sm-3 col-form-label">Mobile</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['mobile'] }}" readonly="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vendor_address" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['address'] }}" readonly="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vendor_city" class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['city'] }}" readonly="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vendor_state" class="col-sm-3 col-form-label">State</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['state'] }}" readonly="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vendor_country" class="col-sm-3 col-form-label">Country</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['country'] }}" readonly="">

                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="vendor_pincode" class="col-sm-3 col-form-label">Pincode</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['pincode'] }}" readonly="">

                            </div>
                        </div>
                        @if(!empty( $vendorDetails['image']))
                        <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">

                                <img src="{{ url('admin/images/photos/'.$vendorDetails['image']) }}" style="width:100%; height:500px">


                            </div>
                        </div>
                        @endif
                    </div>

                </div>

            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Settings</h4>
                        <h6>Business Information</h6>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Shop Name</label>
                            <div class="col-sm-9">
                                <input class="form-control" value="{{ $vendorDetails['vendor_business']['shop_name'] }}" readonly="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Shop Adress</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_address'] }}" readonly="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Shop City</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_city'] }}" readonly="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Shop State</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_state'] }}" readonly="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Shop Country</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_country'] }}" readonly="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Shop Pincode</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_pincode'] }}" readonly="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Shop Mobile</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_mobile'] }}" readonly="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Shop Website</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_website'] }}" readonly="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Shop Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_email'] }}" readonly="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Shop Adress Proof</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['address_proof'] }}" readonly="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Shop Busincess License Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['business_license_number'] }}" readonly="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">GST Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['gst_number'] }}" readonly="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pan Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['pan_number'] }}" readonly="">

                            </div>
                        </div>
                        @if(!empty( $vendorDetails['vendor_business']['address_proof_image']))
                        <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">

                                <img src="{{ url('admin/images/proofs/'.$vendorDetails['vendor_business']['address_proof_image']) }}" style="width:100%; height:500px">


                            </div>
                        </div>
                        @endif
                    </div>
                </div>

            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Settings</h4>
                        <h6>Bank Information</h6>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Account Holder Name</label>
                            <div class="col-sm-9">
                                <input class="form-control" value="{{ $vendorDetails['vendor_bank']['account_holder_name'] }}" readonly="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bank Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_bank']['bank_name'] }}" readonly="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Account Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_bank']['account_number'] }}" readonly="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bank IFSC Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_bank']['bank_ifsc_code'] }}" readonly="">

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