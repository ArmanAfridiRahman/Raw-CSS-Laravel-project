<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;

    private static $campus;

    public static function status($id){
        self::$campus = campus::find($id);
        if(self::$campus->status == 1){
            self::$campus->status = 0;
        }
        else{
            self::$campus->status = 1;
        }
        self::$campus->save();
    }

    public static function newCampus($request){
        self::$campus =  new campus();
        self::$campus->campus_name = $request->campus_name;
        self::$campus->technology_id = $request->technology_id;
        self::$campus->campus_address = $request->campus_address;
        self::$campus->save();
        return self::$campus;
    }

    public static function updateCampusInfo($request, $id){
        self::$campus = campus::find($id);
        self::$campus->campus_name = $request->campus_name;
        self::$campus->technology_id = $request->technology_id;
        self::$campus->campus_address = $request->campus_address;
        self::$campus->save();
    }

    public static function campusDelete($id){
        self::$campus = campus::find($id);
        self::$campus->delete();
    }

}
