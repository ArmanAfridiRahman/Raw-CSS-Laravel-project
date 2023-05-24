<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    use HasFactory;
    private static $stuff, $image, $imageName, $directory, $imageUrl, $extension;

    private static function getImageUrl($request){
        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory = 'adminAsset/images/settings/stuff/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function status($id){
        self::$stuff = stuff::find($id);
        if(self::$stuff->status == 1){
            self::$stuff->status = 0;
        }
        else{
            self::$stuff->status = 1;
        }
        self::$stuff->save();
    }

    public static function newStuff($request){
        self::$stuff =  new stuff();
        self::$stuff->name = $request->name;
        self::$stuff->blood = $request->blood;
        self::$stuff->image = self::getImageUrl($request);
        self::$stuff->post = $request->post;

        self::$stuff->save();
        return self::$stuff;
    }

    public static function updateStuffInfo($request, $id){
        self::$stuff = stuff::find($id);
        if ($request->file('image')){
            if(file_exists(self::$stuff->image)){
                unlink(self::$stuff->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else{
            self::$imageUrl = self::$stuff->image;
        }
        self::$stuff->name = $request->name;
        self::$stuff->blood = $request->blood;
        self::$stuff->image = self::$imageUrl;
        self::$stuff->post = $request->post;

        self::$stuff->save();
    }

    public static function stuffDelete($id){
        self::$stuff = stuff::find($id);
        if(file_exists(self::$stuff->image)){
            unlink(self::$stuff->image);
        }
        self::$stuff->delete();
    }
}
