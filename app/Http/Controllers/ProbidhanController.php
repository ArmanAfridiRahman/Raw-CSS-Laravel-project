<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Probidhan;

class ProbidhanController extends Controller
{
    private $probidhan;


    public function index(){
        return view('admin.probidhan.index', [
            'technologies' => Probidhan::all(),
        ]);
    }
    public function status($id){
        Probidhan::status($id);
        return back()->with('message', 'status updated successfully.');
    }
    public function probidhanSave(Request $request){
        $this->probidhan = Probidhan::newProbidhan($request);
        return back()->with('message', 'probidhan saved successfully');
    }
    public function probidhanEdit($id){
        return view('admin.probidhan.edit',[
            'technologies' => Probidhan::all(),
            'probidhan' =>Probidhan::find($id),
        ]);
    }
    public function probidhanUpdate(Request $request, $id){
        Probidhan::updateProbidhanInfo($request, $id);
        return redirect('/probidhan')->with('message', 'probidhan info updated successfully');
    }
    public function probidhanDelete($id){
        Probidhan::probidhanDelete($id);
        return redirect('/probidhan')->with('message', 'probidhan deleted successfully.');
    }
}
