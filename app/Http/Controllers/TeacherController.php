<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    private $teacher;


    public function index(){
        return view('admin.teacher.index', [
            'designations' => Designation::all(),
            'teachers' => Teacher::all(),
        ]);
    }
    public function status($id){
        Teacher::status($id);
        return back()->with('message', 'status updated successfully.');
    }
    public function teacherSave(Request $request){
        $this->teacher = Teacher::newTeacher($request);
        return back()->with('message', 'teacher saved successfully');
    }
    public function teacherEdit($id){
        return view('admin.teacher.edit',[
            'designations' => Designation::all(),
            'teachers' => teacher::all(),
            'teacher' => teacher::find($id),
        ]);
    }
    public function teacherUpdate(Request $request, $id){
        teacher::updateTeacherInfo($request, $id);
        return redirect('/teacher')->with('message', 'teacher info updated successfully');
    }
    public function teacherDelete($id){
        teacher::teacherDelete($id);
        return redirect('/teacher')->with('message', 'teacher deleted successfully.');
    }
}
