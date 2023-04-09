<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Hash;
use Auth;

class SectionController extends Controller
{
    //Section controller
    public function sections()
    {
        $title = 'I love you Afsana MiM';
        $sections = Section::get()->toArray();
        //dd($sections);
        return view('admin.sections.sections')->with(compact('sections', 'title'));
    }

    //Update status

    public function updateSectionStatus(Request $request)
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
            Section::where('id', $data['section_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'section_id' => $data['section_id']]);
        }
    }


    //add edit section
    public function addEditSection(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Add section | Sexy MiM";
            $section = new Section;
            $message = "Section added successfully!";
        } else {
            $title = "Edit section | Sexy Shabnur";
            $section = Section::find($id);
            $message = "Section updated successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'section_name' => 'required|regex:/^[\pL\s\-]+$/u',
            ];

            $customMessages = [
                //custom validate here
                'section_name.required' => 'Name is required',
                'section_name.regex' => 'Valid name is required',
            ];


            $this->validate($request, $rules, $customMessages);

            $section->name = $data['section_name'];
            $section->status = 1;
            $section->save();

            // echo "<pre>";
            // print_r($request);
            // die;

            return redirect('admin/sections')->with('success_message', $message);
        }



        return view('admin.sections.add_edit_section')->with(compact('title', 'section'));
    }

    // Delete section

    public function deleteSections($id)
    {
        Section::where('id', $id)->delete();
        $message = 'Section has been deleted successfully!';
        return redirect()->back()->with('success_message', $message);
    }
}
