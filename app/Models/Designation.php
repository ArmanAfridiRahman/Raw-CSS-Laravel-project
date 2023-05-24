<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    private static $designation;

    public static function status($id){
        self::$designation = designation::find($id);
        if(self::$designation->status == 1){
            self::$designation->status = 0;
        }
        else{
            self::$designation->status = 1;
        }
        self::$designation->save();
    }

    public static function newdesignation($request){
        self::$designation =  new designation();
        self::$designation->designation_name = $request->designation_name;
        self::$designation->save();
        return self::$designation;
    }

    public static function updatedesignationInfo($request, $id){
        self::$designation = designation::find($id);
        self::$designation->designation_name = $request->designation_name;
        self::$designation->save();
    }

    public static function designationDelete($id){
        self::$designation = designation::find($id);
        self::$designation->delete();
    }
}
