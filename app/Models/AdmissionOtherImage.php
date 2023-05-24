<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionOtherImage extends Model
{
    use HasFactory;
    private static $admissionOtherImage, $admissionOtherImages, $image, $imageName, $directory, $imageUrl, $extension;

    public static function getImageUrl($image){
        self::$extension = $image->getClientOriginalExtension();
        self::$imageName = rand(1000,2000).'.'.self::$extension;
        self::$directory = 'adminAsset/images/settings/admission/other-images/';
        $image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newOtherImage($request, $id)
    {
        foreach($request->admission_other_image as $image){
            self::$admissionOtherImage = new AdmissionOtherImage();
            self::$admissionOtherImage->admission_id   = $id;
            self::$admissionOtherImage->image      = self::getImageUrl($image);
            self::$admissionOtherImage->save();
        }
    }
    public static function deleteOtherImage($id){
        self::$admissionOtherImages = AdmissionOtherImage::where('admission_id', $id)->get();
        foreach (self::$admissionOtherImages as $admissionOtherImage){
            if (file_exists($admissionOtherImage->image)){
                unlink($admissionOtherImage->image);
            }
            $admissionOtherImage->delete();
        }
    }

    public static function updateOtherImage($request, $id){
        self::deleteOtherImage($id);
        self::newOtherImage($request, $id);
    }
}
