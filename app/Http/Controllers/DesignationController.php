<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    private $designation;


    public function index(){
        return view('admin.designation.index', [
            'designations' => designation::all(),
        ]);
    }
    public function status($id){
        designation::status($id);
        return back()->with('message', 'status updated successfully.');
    }
    public function designationSave(Request $request){
        $this->designation = designation::newdesignation($request);
        return back()->with('message', 'designation saved successfully');
    }
    public function designationEdit($id){
        return view('admin.designation.edit',[
            'designations' => designation::all(),
            'designation' =>designation::find($id),
        ]);
    }
    public function designationUpdate(Request $request, $id){
        designation::updatedesignationInfo($request, $id);
        return redirect('/designation')->with('message', 'designation info updated successfully');
    }
    public function designationDelete($id){
        designation::designationDelete($id);
        return redirect('/designation')->with('message', 'designation deleted successfully.');
    }
}
