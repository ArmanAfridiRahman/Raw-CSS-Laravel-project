<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\AdmissionOtherImage;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    private $admission;


    public function index(){
        return view('admin.settings.admission.index', [
            'admissions' => Admission::all(),
        ]);
    }
    public function status($id){
        Admission::status($id);
        return back()->with('message', 'status updated successfully.');
    }
    public function admissionSave(Request $request){
        $this->admission = Admission::newAdmission($request);
        AdmissionOtherImage::newOtherImage($request, $this->admission->id);
        return back()->with('message', 'admission saved successfully');
    }
    public function admissionEdit($id){
        return view('admin.settings.admission.edit',[
            'admissions' => Admission::all(),
            'admission' => Admission::find($id),
        ]);
    }
    public function admissionUpdate(Request $request, $id){
        Admission::updateadmissionInfo($request, $id);
        if($request->file('admission_other_image')){
            AdmissionOtherImage::updateOtherImage($request, $id);
        }
        return redirect('/settings/admission/')->with('message', 'admission info updated successfully');
    }
    public function admissionDelete($id){
        Admission::admissionDelete($id);
        AdmissionOtherImage::deleteOtherImage($id);
        return redirect('/settings/admission/')->with('message', 'admission deleted successfully.');
    }
}
