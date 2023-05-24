<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Probidhan;
use App\Models\Technology;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    private $curriculum;


    public function index(){
        return view('admin.settings.curriculum.index', [
            'technologies' => Technology::all(),
            'probidhans' => Probidhan::all(),
            'curricula' => Curriculum::all(),
        ]);
    }
    public function status($id){
        Curriculum::status($id);
        return back()->with('message', 'status updated successfully.');
    }
    public function curriculumSave(Request $request){
        $this->curriculum = Curriculum::newCurriculum($request);
        return back()->with('message', 'curriculum saved successfully');
    }
    public function curriculumEdit($id){
        return view('admin.settings.curriculum.edit',[
            'curricula' => Curriculum::all(),
            'curriculum' =>Curriculum::find($id),
            'technologies' => Technology::all(),
            'probidhans' => Probidhan::all(),
        ]);
    }
    public function curriculumUpdate(Request $request, $id){
        Curriculum::updateCurriculumInfo($request, $id);
        return redirect('/settings/curriculum/')->with('message', 'curriculum info updated successfully');
    }
    public function curriculumDelete($id){
        Curriculum::curriculumDelete($id);
        return redirect('/settings/curriculum/')->with('message', 'curriculum deleted successfully.');
    }
}
