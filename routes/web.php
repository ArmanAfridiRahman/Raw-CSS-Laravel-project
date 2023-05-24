<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\ProbidhanController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StuffController;
use App\Http\Controllers\AitvetController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CampusController;

Route::get('/',[AitvetController::class, 'index'])->name('home');
Route::get('/academic',[AitvetController::class, 'academic'])->name('academic');
Route::get('/teachers',[AitvetController::class, 'teachers'])->name('teachers');
Route::get('/admission',[AitvetController::class, 'admission'])->name('admission');
Route::get('/notice/{id}',[AitvetController::class, 'notice'])->name('notice');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::get('/settings/notice/', [NoticeController::class,'index'])->name('settings.notice');
    Route::post('/settings/notice/save', [NoticeController::class,'noticeSave'])->name('settings.notice.save');
    Route::get('/settings/notice/status/{id}', [NoticeController::class,'status'])->name('settings.notice.status');
    Route::get('/settings/notice/edit/{id}', [NoticeController::class,'noticeEdit'])->name('settings.notice.edit');
    Route::post('/settings/notice/update/{id}', [NoticeController::class,'noticeUpdate'])->name('settings.notice.update');
    Route::get('/settings/notice/delete/{id}', [NoticeController::class,'noticeDelete'])->name('settings.notice.delete');

    Route::get('/settings/admission/', [AdmissionController::class,'index'])->name('settings.admission');
    Route::post('/settings/admission/save', [AdmissionController::class,'admissionSave'])->name('settings.admission.save');
    Route::get('/settings/admission/status/{id}', [AdmissionController::class,'status'])->name('settings.admission.status');
    Route::get('/settings/admission/edit/{id}', [AdmissionController::class,'admissionEdit'])->name('settings.admission.edit');
    Route::post('/settings/admission/update/{id}', [AdmissionController::class,'admissionUpdate'])->name('settings.admission.update');
    Route::get('/settings/admission/delete/{id}', [AdmissionController::class,'admissionDelete'])->name('settings.admission.delete');

    Route::get('/settings/curriculum/', [CurriculumController::class,'index'])->name('settings.curriculum');
    Route::post('/settings/curriculum/save', [CurriculumController::class,'curriculumSave'])->name('settings.curriculum.save');
    Route::get('/settings/curriculum/status/{id}', [CurriculumController::class,'status'])->name('settings.curriculum.status');
    Route::get('/settings/curriculum/edit/{id}', [CurriculumController::class,'curriculumEdit'])->name('settings.curriculum.edit');
    Route::post('/settings/curriculum/update/{id}', [CurriculumController::class,'curriculumUpdate'])->name('settings.curriculum.update');
    Route::get('/settings/curriculum/delete/{id}', [CurriculumController::class,'curriculumDelete'])->name('settings.curriculum.delete');

    Route::get('/technology', [TechnologyController::class,'index'])->name('technology');
    Route::post('/technology/save', [TechnologyController::class,'technologySave'])->name('technology.save');
    Route::get('/technology/status/{id}', [TechnologyController::class,'status'])->name('technology.status');
    Route::get('/technology/edit/{id}', [TechnologyController::class,'technologyEdit'])->name('technology.edit');
    Route::post('/technology/update/{id}', [TechnologyController::class,'technologyUpdate'])->name('technology.update');
    Route::get('/technology/delete/{id}', [TechnologyController::class,'technologyDelete'])->name('technology.delete');

    Route::get('/settings/campus/', [CampusController::class,'index'])->name('settings.campus');
    Route::post('/settings/campus/save', [CampusController::class,'campusSave'])->name('settings.campus.save');
    Route::get('/settings/campus/status/{id}', [CampusController::class,'status'])->name('settings.campus.status');
    Route::get('/settings/campus/edit/{id}', [CampusController::class,'campusEdit'])->name('settings.campus.edit');
    Route::post('/settings/campus/update/{id}', [CampusController::class,'campusUpdate'])->name('settings.campus.update');
    Route::get('/settings/campus/delete/{id}', [CampusController::class,'campusDelete'])->name('settings.campus.delete');

    Route::get('/probidhan', [ProbidhanController::class,'index'])->name('probidhan');
    Route::post('/probidhan/save', [ProbidhanController::class,'probidhanSave'])->name('probidhan.save');
    Route::get('/probidhan/status/{id}', [ProbidhanController::class,'status'])->name('probidhan.status');
    Route::get('/probidhan/edit/{id}', [ProbidhanController::class,'probidhanEdit'])->name('probidhan.edit');
    Route::post('/probidhan/update/{id}', [ProbidhanController::class,'probidhanUpdate'])->name('probidhan.update');
    Route::get('/probidhan/delete/{id}', [ProbidhanController::class,'probidhanDelete'])->name('probidhan.delete');

    Route::get('/settings/academic/', [AcademicController::class,'index'])->name('settings.academic');
    Route::post('/settings/academic/save', [AcademicController::class,'academicSave'])->name('settings.academic.save');
    Route::get('/settings/academic/status/{id}', [AcademicController::class,'status'])->name('settings.academic.status');
    Route::get('/settings/academic/edit/{id}', [AcademicController::class,'academicEdit'])->name('settings.academic.edit');
    Route::post('/settings/academic/update/{id}', [AcademicController::class,'academicUpdate'])->name('settings.academic.update');
    Route::get('/settings/academic/delete/{id}', [AcademicController::class,'academicDelete'])->name('settings.academic.delete');

    Route::get('/settings/home/', [HomeController::class,'index'])->name('settings.home');
    Route::post('/settings/home/save', [HomeController::class,'homeSave'])->name('settings.home.save');
    Route::get('/settings/home/status/{id}', [HomeController::class,'status'])->name('settings.home.status');
    Route::get('/settings/home/edit/{id}', [HomeController::class,'homeEdit'])->name('settings.home.edit');
    Route::post('/settings/home/update/{id}', [HomeController::class,'homeUpdate'])->name('settings.home.update');
    Route::get('/settings/home/delete/{id}', [HomeController::class,'homeDelete'])->name('settings.home.delete');

    Route::get('/teacher', [TeacherController::class,'index'])->name('teacher');
    Route::post('/teacher/save', [TeacherController::class,'teacherSave'])->name('teacher.save');
    Route::get('/teacher/status/{id}', [TeacherController::class,'status'])->name('teacher.status');
    Route::get('/teacher/edit/{id}', [TeacherController::class,'teacherEdit'])->name('teacher.edit');
    Route::post('/teacher/update/{id}', [TeacherController::class,'teacherUpdate'])->name('teacher.update');
    Route::get('/teacher/delete/{id}', [TeacherController::class,'teacherDelete'])->name('teacher.delete');

    Route::get('/stuff', [StuffController::class,'index'])->name('stuff');
    Route::post('/stuff/save', [StuffController::class,'stuffSave'])->name('stuff.save');
    Route::get('/stuff/status/{id}', [StuffController::class,'status'])->name('stuff.status');
    Route::get('/stuff/edit/{id}', [StuffController::class,'stuffEdit'])->name('stuff.edit');
    Route::post('/stuff/update/{id}', [StuffController::class,'stuffUpdate'])->name('stuff.update');
    Route::get('/stuff/delete/{id}', [StuffController::class,'stuffDelete'])->name('stuff.delete');

    Route::get('/designation', [DesignationController::class,'index'])->name('designation');
    Route::post('/designation/save', [DesignationController::class,'designationSave'])->name('designation.save');
    Route::get('/designation/status/{id}', [DesignationController::class,'status'])->name('designation.status');
    Route::get('/designation/edit/{id}', [DesignationController::class,'designationEdit'])->name('designation.edit');
    Route::post('/designation/update/{id}', [DesignationController::class,'designationUpdate'])->name('designation.update');
    Route::get('/designation/delete/{id}', [DesignationController::class,'designationDelete'])->name('designation.delete');
});
