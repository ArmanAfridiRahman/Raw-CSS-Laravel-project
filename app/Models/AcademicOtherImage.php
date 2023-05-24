<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicOtherImage extends Model
{
    use HasFactory;
    private static $academicOtherImage, $academicOtherImages, $image, $imageName, $directory, $imageUrl, $extension;

    public static function getImageUrl($image){
        self::$extension = $image->getClientOriginalExtension();
        self::$imageName = rand(1000,2000).'.'.self::$extension;
        self::$directory = 'adminAsset/images/settings/academic/other-images/';
        $image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newOtherImage($request, $id)
    {
        foreach($request->academic_other_image as $image){
            self::$academicOtherImage = new AcademicOtherImage();
            self::$academicOtherImage->academic_id   = $id;
            self::$academicOtherImage->image      = self::getImageUrl($image);
            self::$academicOtherImage->save();
        }
    }
    public static function deleteOtherImage($id){
        self::$academicOtherImages = AcademicOtherImage::where('academic_id', $id)->get();
        foreach (self::$academicOtherImages as $academicOtherImage){
            if (file_exists($academicOtherImage->image)){
                unlink($academicOtherImage->image);
            }
            $academicOtherImage->delete();
        }
    }

    public static function updateOtherImage($request, $id){
        self::deleteOtherImage($id);
        self::newOtherImage($request, $id);
    }
}
