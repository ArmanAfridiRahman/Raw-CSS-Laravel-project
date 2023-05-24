<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;
    private static $curriculum;

    public static function status($id){
        self::$curriculum = Curriculum::find($id);
        if(self::$curriculum->status == 1){
            self::$curriculum->status = 0;
        }
        else{
            self::$curriculum->status = 1;
        }
        self::$curriculum->save();
    }

    public static function newCurriculum($request){
        self::$curriculum =  new Curriculum();
        self::$curriculum->technology_id = $request->technology_id;
        self::$curriculum->probidhan_id = $request->probidhan_id;
        self::$curriculum->links = $request->lin+ks;
        self::$curriculum->semester = $request->semester;
        self::$curriculum->save();
        return self::$curriculum;
    }
    public function technology(){
        return $this->belongsTo(Technology::class);
    }
    public static function updateCurriculumInfo($request, $id){
        self::$curriculum = Curriculum::find($id);
        self::$curriculum->technology_id = $request->technology_id;
        self::$curriculum->probidhan_id = $request->probidhan_id;
        self::$curriculum->links = $request->links;
        self::$curriculum->semester = $request->semester;
        self::$curriculum->save();
    }
    public static function curriculumDelete($id){
        self::$curriculum = Curriculum::find($id);
        self::$curriculum->delete();
    }
}
