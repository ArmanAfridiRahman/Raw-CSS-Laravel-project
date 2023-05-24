<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    private static $home;

    public static function status($id){
        self::$home = home::find($id);
        if(self::$home->status == 1){
            self::$home->status = 0;
        }
        else{
            self::$home->status = 1;
        }
        self::$home->save();
    }

    public static function newHome($request){
        self::$home =  new home();
        self::$home->home_tabs = $request->home_tabs;
        self::$home->home_tab_description = $request->home_tab_description;
        self::$home->home_headline_one = $request->home_headline_one;
        self::$home->home_description_one = $request->home_description_one;
        self::$home->home_headline_two = $request->home_headline_two;
        self::$home->home_description_two = $request->home_description_two;
        self::$home->home_programs = $request->home_programs;
        self::$home->save();
        return self::$home;
    }

    public static function updatehomeInfo($request, $id){
        self::$home = home::find($id);
        self::$home->home_tabs = $request->home_tabs;
        self::$home->home_tab_description = $request->home_tab_description;
        self::$home->home_headline_one = $request->home_headline_one;
        self::$home->home_description_one = $request->home_description_one;
        self::$home->home_headline_two = $request->home_headline_two;
        self::$home->home_description_two = $request->home_description_two;
        self::$home->home_programs = $request->home_programs;
        self::$home->save();
    }
    public static function homeDelete($id){
        self::$home = home::find($id);
        self::$home->delete();
    }
}
