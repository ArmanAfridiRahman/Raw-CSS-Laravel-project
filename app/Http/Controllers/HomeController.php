<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Home;
use App\Models\Technology;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $home;

    public function index(){
        return view('admin.settings.home.index', [
            'homes' => home::all(),
        ]);
    }
    public function status($id){
        home::status($id);
        return back()->with('message', 'status updated successfully.');
    }
    public function homeSave(Request $request){
        $this->home = home::newHome($request);
        return back()->with('message', 'home saved successfully');
    }
    public function homeEdit($id){
        return view('admin.settings.home.edit',[
            'homes' => home::all(),
            'home' => home::find($id),
        ]);
    }
    public function homeUpdate(Request $request, $id){
        home::updatehomeInfo($request, $id);
        return redirect('/settings/home/')->with('message', 'home info updated successfully');
    }
    public function homeDelete($id){
        home::homeDelete($id);
        return redirect('/settings/home/')->with('message', 'home deleted successfully.');
    }
}
