<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academic;
use App\Models\AcademicOtherImage;

class AcademicController extends Controller
{
    private $academic;

    public function index(){
        return view('admin.settings.academic.index', [
            'academics' => academic::all(),
        ]);
    }
    public function status($id){
        academic::status($id);
        return back()->with('message', 'status updated successfully.');
    }
    public function academicSave(Request $request){
        $this->academic = academic::newAcademic($request);
        academicOtherImage::newOtherImage($request, $this->academic->id);
        return back()->with('message', 'academic saved successfully');
    }
    public function academicEdit($id){
        return view('admin.settings.academic.edit',[
            'academics' => academic::all(),
            'academic' => academic::find($id),
        ]);
    }
    public function academicUpdate(Request $request, $id){
        academic::updateAcademicInfo($request, $id);
        if($request->file('academic_other_image')){
            academicOtherImage::updateOtherImage($request, $id);
        }
        return redirect('/settings/academic/')->with('message', 'academic info updated successfully');
    }
    public function academicDelete($id){
        academic::academicDelete($id);
        academicOtherImage::deleteOtherImage($id);
        return redirect('/settings/academic/')->with('message', 'academic deleted successfully.');
    }
}
