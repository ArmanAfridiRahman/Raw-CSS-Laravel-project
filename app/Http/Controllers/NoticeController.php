<?php

namespace App\Http\Controllers;

use App\Models\OtherImage;
use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    private $notice;


    public function index(){
        return view('admin.settings.notice.index', [
            'notices' => Notice::all(),
        ]);
    }
    public function status($id){
        Notice::status($id);
        return back()->with('message', 'status updated successfully.');
    }
    public function noticeSave(Request $request){
        $this->notice = Notice::newNotice($request);
        OtherImage::newOtherImage($request, $this->notice->id);
        return back()->with('message', 'Notice saved successfully');
    }
    public function noticeEdit($id){
        return view('admin.settings.notice.edit',[
            'notices' => Notice::all(),
            'notice' => Notice::find($id),
        ]);
    }
    public function noticeUpdate(Request $request, $id){
        Notice::updateNoticeInfo($request, $id);
        if($request->file('other_image')){
            OtherImage::updateOtherImage($request, $id);
        }
        return redirect('/settings/notice/')->with('message', 'Notice info updated successfully');
    }
    public function noticeDelete($id){
        Notice::noticeDelete($id);
        OtherImage::deleteOtherImage($id);
        return redirect('/settings/notice/')->with('message', 'Notice deleted successfully.');
    }
}
