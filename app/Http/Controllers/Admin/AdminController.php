<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorsBusinessDetails;
use App\Models\VendorsBankDetails;
use App\Models\Country;
use Image;

class AdminController extends Controller
{
    //Dashboard controller
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    //Updated admin password
    public function updateAdminPassword(Request $request)
    {
        // echo "<pre>"; print_r(Auth::guard('admin')->user()); die;

        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            //Check if current password is entered incorrect
            if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
                if ($data['confirm_password'] == $data['new_password']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message', 'Password has been updated successfully!');
                } else {
                    return redirect()->back()->with('error_message', 'Current password and new password dose not match!');
                }
            } else {
                return redirect()->back()->with('error_message', 'Current password is incorrect');
            }
        }
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }



    //Check admin password

    public function checkAdminPassword(Request $request)
    {
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    //Update admin details

    public function updateAdminDetails(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();
            //Update details query

            //echo "<pre>"; print_r($data); die;
            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile' => 'required|numeric',
            ];

            $customMessages = [
                'admin_name.required' => 'Name is required',
                'admin_name.regex' => 'Valid name is required',
                'admin_mobile.required' => 'Mobile number is required',
                'admin_mobile.numeric' => 'Valid mobile number is required',

            ];

            $this->validate($request, $rules, $customMessages);

            //image upload
            if ($request->hasFile('admin_image')) {
                $image_tmp = $request->file('admin_image');

                if ($image_tmp->isValid()) {
                    //get the image extention
                    $extension = $image_tmp->getClientOriginalExtension();
                    $image_name = rand(111, 99999) . '.' . $extension;
                    $image_path = 'admin/images/photos/' . $image_name;
                    Image::make($image_tmp)->save($image_path);
                }
            } else if (!empty($data['current_admin_image'])) {
                $image_name = $data['current_admin_image'];
            } else {
                $image_name = "";
            }

            Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['admin_name'], 'mobile' => $data['admin_mobile'], 'image' => $image_name]);
            return redirect()->back()->with('success_message', 'Admin data has been updated successfully!');
        }
        return view('admin.settings.update_admin_details');
    }

    //Update vendor details

    public function updateVendorsDetails($slug, Request $request)
    {
        if ($slug == "personal") {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $rules = [
                    'vendor_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'vendor_mobile' => 'required|numeric',
                ];

                $customMessages = [
                    'vendor_name.required' => 'Name is required',
                    'vendor_name.regex' => 'Valid name is required',
                    'vendor_mobile.required' => 'Mobile number is required',
                    'vendor_mobile.numeric' => 'Valid mobile number is required',

                ];

                $this->validate($request, $rules, $customMessages);

                //image upload
                if ($request->hasFile('vendor_image')) {
                    $image_tmp = $request->file('vendor_image');

                    if ($image_tmp->isValid()) {
                        //get the image extention
                        $extension = $image_tmp->getClientOriginalExtension();
                        $image_name = rand(111, 99999) . '.' . $extension;
                        $image_path = 'admin/images/photos/' . $image_name;
                        Image::make($image_tmp)->save($image_path);
                    }
                } else if (!empty($data['current_vendor_image'])) {
                    $image_name = $data['current_vendor_image'];
                } else {
                    $image_name = "";
                }

                //Update admin table data
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['vendor_name'], 'mobile' => $data['vendor_mobile'], 'image' => $image_name]);
                //Update vendor table data
                Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->update(
                    [
                        'name' => $data['vendor_name'],
                        'address' => $data['vendor_address'],
                        'mobile' => $data['vendor_mobile'],
                        'city' => $data['vendor_city'],
                        'country' => $data['vendor_country'],
                        'state' => $data['vendor_state'],
                        'pincode' => $data['vendor_pincode'],
                    ]
                );
                return redirect()->back()->with('success_message', 'Vendor data has been updated successfully!');
            }
            $vendorDetails = Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        } else if ($slug == "business") {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $rules = [
                    'shop_name' => 'required',
                    'shop_city' => 'required',
                    'shop_mobile' => 'required|numeric',
                    'address_proof' => 'required',
                ];

                $customMessages = [
                    'shop_name.required' => 'Name is required',
                    'shop_city.required' => 'Shop City is required',
                    'shop_city.required' => 'City name is required',
                    'shop_mobile.required' => 'Mobile number is required',
                    'shop_mobile.numeric' => 'Valid mobile number is required',
                    'address_proof.required' => 'Address proof is required',

                ];

                $this->validate($request, $rules, $customMessages);

                //image upload
                if ($request->hasFile('address_proof_image')) {
                    $image_tmp = $request->file('address_proof_image');

                    if ($image_tmp->isValid()) {
                        //get the image extention
                        $extension = $image_tmp->getClientOriginalExtension();
                        $image_name = rand(111, 99999) . '.' . $extension;
                        $image_path = 'admin/images/proofs/' . $image_name;
                        Image::make($image_tmp)->save($image_path);
                    }
                } else if (!empty($data['current_address_proof'])) {
                    $image_name = $data['current_address_proof'];
                } else {
                    $image_name = "";
                }

                //Update vendor business table data
                VendorsBusinessDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update(
                    [
                        'shop_name' => $data['shop_name'],
                        'shop_mobile' => $data['shop_mobile'],
                        'shop_address' => $data['shop_address'],
                        'shop_city' => $data['shop_city'],
                        'shop_state' => $data['shop_state'],
                        'shop_country' => $data['shop_country'],
                        'shop_pincode' => $data['shop_pincode'],
                        'shop_website' => $data['shop_website'],
                        'address_proof' => $data['address_proof'],
                        'address_proof_image' => $image_name,
                        'business_license_number' => $data['business_license_number'],
                        'gst_number' => $data['gst_number'],
                        'pan_number' => $data['pan_number'],
                    ]
                );

                return redirect()->back()->with('success_message', 'Vendor data has been updated successfully!');
            }
            $vendorDetails = VendorsBusinessDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        } else if ($slug == "bank") {
            if ($request->isMethod('post')) {
                $data = $request->all();
                //dd($data);
                $rules = [
                    'account_holder_name'       => 'required',
                    'bank_name'                 => 'required',
                    'account_number'            => 'required|numeric',
                    'bank_ifsc_code'            => 'required',
                ];

                $customMessages = [
                    'account_holder_name.required' => 'Account holder name  is required',
                    'bank_name.required' => 'Bank name is required',
                    'account_number.required' => 'Account number is required',
                    'bank_ifsc_code.required' => 'Bank ifsc code number is required',

                ];

                $this->validate($request, $rules, $customMessages);


                //Update vendor business table data
                VendorsBankDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update(
                    [
                        'account_holder_name' => $data['account_holder_name'],
                        'bank_name'         => $data['bank_name'],
                        'account_number'    => $data['account_number'],
                        'bank_ifsc_code'    => $data['bank_ifsc_code'],
                    ]
                );

                return redirect()->back()->with('success_message', 'Vendor data has been updated successfully!');
            }
            $vendorDetails = VendorsBankDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        }

        $countries = Country::where('status', 1)->get()->toArray();


        return view('admin.settings.update_vendor_details')->with(compact('slug', 'vendorDetails', 'countries'));
    }



    //Login method
    public function login(Request $request)
    {
        //echo $password = Hash::make('123456'); die;
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customMessages = [
                //custom validate here
                'email.required' => 'Email is required',
                'email.email' => 'Valid Email is required',
                'password.required' => 'Password is required'
            ];

            $this->validate($request, $rules, $customMessages);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) {
                return redirect('admin/dashboard');
            } else {
                return redirect()->back()->with('error_message', 'Invalid email or password');
            }
        }
        return view('admin.login');
    }


    //admin/subadmin/vendors
    public function admins($type = null)
    {
        //$admins = Admin::get()->toArray();
        $admins = Admin::query();
        if (!empty($type)) {
            $admins = $admins->where('type', $type);
            $title = ucfirst($type) . "s";
        } else {
            $title = 'All Admin/Subadmin/Vendors';
        }
        $admins = $admins->get()->toArray();
        return view('admin.admins.admins')->with(compact('admins', 'title'));
        //dd($admins);
    }

    //View Vendor Details inforation
    public function viewVendorDetails($id)
    {
        $vendorDetails = Admin::with('vendorPersonal', 'vendorBusiness', 'vendorBank')->where('id', $id)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails), true);
        return view('admin.admins.view-vendor-details')->with(compact('vendorDetails'));
        //dd($vendorDetails);
    }

    //Update admin status
    public function updateAdminStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>";
            // print_r($data);
            // die;
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Admin::where('id', $data['admin_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'admin_id' => $data['admin_id']]);
        }
    }

    //Logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
