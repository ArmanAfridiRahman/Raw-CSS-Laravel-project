<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use App\Models\Campus;

class CampusController extends Controller
{
    private $campus;

    public function index(){
        return view('admin.settings.campus.index', [
            'technologies' => Technology::all(),
            'campuses' => Campus::all(),
        ]);
    }
    public function status($id){
        campus::status($id);
        return back()->with('message', 'status updated successfully.');
    }
    public function campusSave(Request $request){
        $this->campus = campus::newCampus($request);
        return back()->with('message', 'campus saved successfully');
    }
    public function campusEdit($id){
        return view('admin.settings.campus.edit',[
            'technologies' => Technology::all(),
            'campuses' => campus::all(),
            'campus' =>campus::find($id),
        ]);
    }
    public function campusUpdate(Request $request, $id){
        campus::updateCampusInfo($request, $id);
        return redirect('/settings/campus/')->with('message', 'campus info updated successfully');
    }
    public function campusDelete($id){
        campus::campusDelete($id);
        return redirect('/settings/campus/')->with('message', 'campus deleted successfully.');
    }
}
