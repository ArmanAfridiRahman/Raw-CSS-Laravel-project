<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stuff;

class StuffController extends Controller
{
    private $stuff;


    public function index(){
        return view('admin.stuff.index', [
            'stuffs' => stuff::all(),
        ]);
    }
    public function status($id){
        stuff::status($id);
        return back()->with('message', 'status updated successfully.');
    }
    public function stuffSave(Request $request){
        $this->stuff = stuff::newstuff($request);
        return back()->with('message', 'stuff saved successfully');
    }
    public function stuffEdit($id){
        return view('admin.stuff.edit',[
            'stuffs' => stuff::all(),
            'stuff' => stuff::find($id),
        ]);
    }
    public function stuffUpdate(Request $request, $id){
        stuff::updatestuffInfo($request, $id);
        return redirect('/stuff')->with('message', 'stuff info updated successfully');
    }
    public function stuffDelete($id){
        stuff::stuffDelete($id);
        return redirect('/stuff')->with('message', 'stuff deleted successfully.');
    }
}
