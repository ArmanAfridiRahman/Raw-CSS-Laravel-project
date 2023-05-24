<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    private static $technology;

    public static function status($id){
        self::$technology = Technology::find($id);
        if(self::$technology->status == 1){
            self::$technology->status = 0;
        }
        else{
            self::$technology->status = 1;
        }
        self::$technology->save();
    }

    public static function newTechnology($request){
        self::$technology =  new Technology();
        self::$technology->technology_name = $request->technology_name;
        self::$technology->save();
        return self::$technology;
    }

    public static function updateTechnologyInfo($request, $id){
        self::$technology = Technology::find($id);
        self::$technology->technology_name = $request->technology_name;
        self::$technology->save();
    }

    public static function technologyDelete($id){
        self::$technology = Technology::find($id);
        self::$technology->delete();
    }

}
