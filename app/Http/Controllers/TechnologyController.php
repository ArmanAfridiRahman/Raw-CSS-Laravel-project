<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;


class TechnologyController extends Controller
{
    private $technology;

    public function index(){
        return view('admin.technology.index', [
            'technologies' => Technology::all(),
        ]);
    }
    public function status($id){
        technology::status($id);
        return back()->with('message', 'status updated successfully.');
    }
    public function technologySave(Request $request){
        $this->technology = Technology::newTechnology($request);
        return back()->with('message', 'technology saved successfully');
    }
    public function technologyEdit($id){
        return view('admin.technology.edit',[
            'technologies' => Technology::all(),
            'technology' =>Technology::find($id),
        ]);
    }
    public function technologyUpdate(Request $request, $id){
        Technology::updateTechnologyInfo($request, $id);
        return redirect('/technology')->with('message', 'technology info updated successfully');
    }
    public function technologyDelete($id){
        Technology::technologyDelete($id);
        return redirect('/technology')->with('message', 'technology deleted successfully.');
    }
}
