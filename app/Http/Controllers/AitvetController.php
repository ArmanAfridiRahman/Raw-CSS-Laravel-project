<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use App\Models\Admission;
use App\Models\Campus;
use App\Models\Home;
use App\Models\Stuff;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Notice;
use App\Models\Designation;

class AitvetController extends Controller
{
    public function index(){
        return view('frontEnd.home.home', [
            'homes' => Home::where('status', 1)->get(),
            'notices' => Notice::where('status', 1)->get(),
            'campuses' => Campus::where('status', 1)->get(),
            'technologies' =>Technology::where('status', 1)->get()
        ]);

    }

    public function academic(){
        return view('frontEnd.menu.academic', [
            'campuses' => Campus::where('status', 1)->get(),
            'homes' => Home::where('status', 1)->get(),
            'notices' => Notice::where('status', 1)->get(),
            'academics' => Academic::where('status', 1)->get()
        ]);
    }
    public function admission(){
        return view('frontEnd.menu.admission', [
            'campuses' => Campus::where('status', 1)->get(),
            'homes' => Home::where('status', 1)->get(),
            'notices' => Notice::where('status', 1)->get(),
            'admissions' => Admission::where('status', 1)->get()
        ]);
    }
    public function notice(){
        return view('frontEnd.menu.notice', [
            'campuses' => Campus::where('status', 1)->get(),
            'homes' => Home::where('status', 1)->get(),
            'notices' => Notice::where('status', 1)->get(),
        ]);
    }
    public function teachers(){
        return view('frontEnd.menu.teachers', [
            'campuses' => Campus::where('status', 1)->get(),
            'homes' => Home::where('status', 1)->get(),
            'teachers' => Teacher::where('status', 1)->get(),
            'stuffs' => Stuff::where('status', 1)->get(),
            'designations' => Designation::where('status', 1)->get(),
            'notices' => Notice::where('status', 1)->get(),
        ]);
    }

}
