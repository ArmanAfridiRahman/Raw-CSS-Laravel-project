<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;
    private static $academic;

    public static function status($id){
        self::$academic = Academic::find($id);
        if(self::$academic->status == 1){
            self::$academic->status = 0;
        }
        else{
            self::$academic->status = 1;
        }
        self::$academic->save();
    }

    public static function newAcademic($request){
        self::$academic =  new Academic();
        self::$academic->academic_information = $request->academic_information;
        self::$academic->save();
        return self::$academic;
    }

    public static function updateAcademicInfo($request, $id){
        self::$academic = Academic::find($id);
        self::$academic->academic_information = $request->academic_information;
        self::$academic->save();
    }

    public function academicOtherImages(){
        return $this->hasMany(academicOtherImage::class);
    }
    public static function academicDelete($id){
        self::$academic = Academic::find($id);
        self::$academic->delete();
    }
}
