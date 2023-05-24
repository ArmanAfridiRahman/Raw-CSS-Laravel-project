<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    private static $teacher, $image, $imageName, $directory, $imageUrl, $extension;

    private static function getImageUrl($request){
        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory = 'adminAsset/images/settings/teacher/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function status($id){
        self::$teacher = Teacher::find($id);
        if(self::$teacher->status == 1){
            self::$teacher->status = 0;
        }
        else{
            self::$teacher->status = 1;
        }
        self::$teacher->save();
    }

    public static function newTeacher($request){
        self::$teacher =  new Teacher();
        self::$teacher->designation_id = $request->designation_id;
        self::$teacher->name = $request->name;
        self::$teacher->department = $request->department;
        self::$teacher->image = self::getImageUrl($request);
        self::$teacher->education = $request->education;
        self::$teacher->blood = $request->blood;
        self::$teacher->email = $request->email;
        self::$teacher->save();
        return self::$teacher;
    }

    public static function updateTeacherInfo($request, $id){
        self::$teacher = Teacher::find($id);
        if ($request->file('image')){
            if(file_exists(self::$teacher->image)){
                unlink(self::$teacher->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else{
            self::$imageUrl = self::$teacher->image;
        }
        self::$teacher->designation_id = $request->designation_id;
        self::$teacher->name = $request->name;
        self::$teacher->department = $request->department;
        self::$teacher->image = self::$imageUrl;
        self::$teacher->education = $request->education;
        self::$teacher->blood = $request->blood;
        self::$teacher->email = $request->email;
        self::$teacher->save();
    }

    public static function teacherDelete($id){
        self::$teacher = Teacher::find($id);
        if(file_exists(self::$teacher->image)){
            unlink(self::$teacher->image);
        }
        self::$teacher->delete();
    }
}
