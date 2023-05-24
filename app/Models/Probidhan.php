<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Probidhan extends Model
{
    use HasFactory;

    private static $probidhan;

    public static function status($id){
        self::$probidhan = Probidhan::find($id);
        if(self::$probidhan->status == 1){
            self::$probidhan->status = 0;
        }
        else{
            self::$probidhan->status = 1;
        }
        self::$probidhan->save();
    }

    public static function newProbidhan($request){
        self::$probidhan =  new Probidhan();
        self::$probidhan->probidhan = $request->probidhan;
        self::$probidhan->save();
        return self::$probidhan;
    }

    public static function updateProbidhanInfo($request, $id){
        self::$probidhan = Probidhan::find($id);
        self::$probidhan->probidhan = $request->probidhan;
        self::$probidhan->save();
    }

    public static function probidhanDelete($id){
        self::$probidhan = Probidhan::find($id);
        self::$probidhan->delete();
    }
}
