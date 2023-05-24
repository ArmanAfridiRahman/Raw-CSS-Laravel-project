<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    private static $admission, $image, $imageName, $directory, $imageUrl, $extension;

    private static function getImageUrl($request){
        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory = 'adminAsset/images/settings/admission/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function status($id){
        self::$admission = Admission::find($id);
        if(self::$admission->status == 1){
            self::$admission->status = 0;
        }
        else{
            self::$admission->status = 1;
        }
        self::$admission->save();
    }

    public static function newAdmission($request){
        self::$admission =  new Admission();
        self::$admission->image = self::getImageUrl($request);
        self::$admission->links = $request->links;
        self::$admission->links_name = $request->links_name;
        self::$admission->save();
        return self::$admission;
    }

    public static function updateadmissionInfo($request, $id){
        self::$admission = Admission::find($id);
        if ($request->file('image')){
            if(file_exists(self::$admission->image)){
                unlink(self::$admission->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else{
            self::$imageUrl = self::$admission->image;
        }

        self::$admission->image = self::$imageUrl;
        self::$admission->links = $request->links;
        self::$admission->links_name = $request->links_name;
        self::$admission->save();
    }

    public function admissionOtherImages(){
        return $this->hasMany(AdmissionOtherImage::class);
    }
    public static function admissionDelete($id){
        self::$admission = Admission::find($id);
        if(file_exists(self::$admission->image)){
            unlink(self::$admission->image);
        }
        self::$admission->delete();
    }
}
