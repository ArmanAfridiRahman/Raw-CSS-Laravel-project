<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;
    private static $otherImage, $otherImages, $image, $imageName, $directory, $imageUrl, $extension;

    public static function getImageUrl($image){
        self::$extension = $image->getClientOriginalExtension();
        self::$imageName = rand(1000,2000).'.'.self::$extension;
        self::$directory = 'adminAsset/images/settings/notice/other-images/';
        $image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newOtherImage($request, $id)
    {
        foreach($request->other_image as $image){
            self::$otherImage = new OtherImage();
            self::$otherImage->notice_id   = $id;
            self::$otherImage->image      = self::getImageUrl($image);
            self::$otherImage->save();
        }
    }
    public static function deleteOtherImage($id){
        self::$otherImages = OtherImage::where('notice_id', $id)->get();
        foreach (self::$otherImages as $otherImage){
            if (file_exists($otherImage->image)){
                unlink($otherImage->image);
            }
            $otherImage->delete();
        }
    }

    public static function updateOtherImage($request, $id){
        self::deleteOtherImage($id);
        self::newOtherImage($request, $id);
    }

}
