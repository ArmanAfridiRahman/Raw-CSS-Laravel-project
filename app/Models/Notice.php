<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    private static $notice, $image, $imageName, $directory, $imageUrl, $extension;

    private static function getImageUrl($request){
        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory = 'adminAsset/images/settings/notice/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function status($id){
        self::$notice = Notice::find($id);
        if(self::$notice->status == 1){
            self::$notice->status = 0;
        }
        else{
            self::$notice->status = 1;
        }
        self::$notice->save();
    }

    public static function newNotice($request){
        self::$notice =  new Notice();
        self::$notice->image = self::getImageUrl($request);
        self::$notice->notice_heading = $request->notice_heading;
        self::$notice->save();
        return self::$notice;
    }

    public static function updateNoticeInfo($request, $id){
    self::$notice = Notice::find($id);
    if ($request->file('image')){
        if(file_exists(self::$notice->image)){
            unlink(self::$notice->image);
        }
        self::$imageUrl = self::getImageUrl($request);
    }
    else{
        self::$imageUrl = self::$notice->image;
    }

    self::$notice->image = self::$imageUrl;
    self::$notice->notice_heading = $request->notice_heading;
    self::$notice->save();
}

    public function otherImages(){
        return $this->hasMany(OtherImage::class);
    }
    public static function noticeDelete($id){
        self::$notice = Notice::find($id);
        if(file_exists(self::$notice->image)){
            unlink(self::$notice->image);
        }
        self::$notice->delete();
    }

}
