<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchoolFormController;
use App\Http\Controllers\setting\AcademicSessionController;
use App\Http\Controllers\setting\BuildingStatusController;
use App\Http\Controllers\setting\ClassRoomController;
use App\Http\Controllers\setting\ExternalMonitoringController;
use App\Http\Controllers\setting\ExtraClassRoomController;
use App\Http\Controllers\setting\InternetIspController;
use App\Http\Controllers\setting\MapController;
use App\Http\Controllers\setting\SchoolController;
use App\Http\Controllers\setting\TeachingMethodController;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dasboard');
    Route::get('setting/user', [AuthController::class, 'index'])->name('setting.user.index');
    Route::post('setting/user', [AuthController::class, 'userStore'])->name('setting.user.store');
    Route::get('school', [SchoolController::class, 'index'])->name('school.index');
    Route::get('school-form', [SchoolController::class, 'schoolForm'])->name('school.form');
    Route::get('school-form/{school}', [SchoolFormController::class, 'index'])->name('school.form_dashboard');
    Route::get('school-form/physical-information/{school}', [SchoolFormController::class, 'physicalInfortmation'])->name('school.physical_infortmation');
    Route::get('school-form/medical-facility/{school}', [SchoolFormController::class, 'medicalFacility'])->name('school.medical_facility');
    Route::get('school-form/class-detail/{school}', [SchoolFormController::class, 'classDetail'])->name('school.class_detail');
    Route::post('school-form/class-detail/{school}', [SchoolFormController::class, 'classDetailStore'])->name('school.class_detail_store');
    Route::get('school-form/external-monitoring-status/{school}', [SchoolFormController::class, 'externalMonitoringStatus'])->name('school.external_monitoring_status');
    Route::post('school-form/external-monitoring-status/{school}', [SchoolFormController::class, 'externalMonitoringStatusStore'])->name('school.external_monitoring_status_store');
    Route::post('school-form/physical-information/{school}', [SchoolFormController::class, 'physicalInfortmationStore'])->name('school.physical_infortmation_store');
    Route::post('school-form/medical-facility/{school}', [SchoolFormController::class, 'medicalFacilityStore'])->name('school.medical_facility_store');
    Route::get('link-school-class', [SchoolController::class, 'linkClass'])->name('school_class.link');
    Route::post('link-school-class', [SchoolController::class, 'linkClassPost'])->name('link_class');
    Route::post('school', [SchoolController::class, 'store'])->name('school.store');
    Route::post('api/school', [SchoolController::class, 'index_report'])->name('school.index_report');
    Route::get('school/view-map/{school}', [SchoolController::class, 'view_map'])->name('school.view_map');
    Route::get('map', [MapController::class, 'index'])->name('map.index');
    Route::resource('class', ClassRoomController::class);
    Route::resource('extra-class', ExtraClassRoomController::class);
    Route::resource('internet-isp', InternetIspController::class);
    Route::resource('teaching-method', TeachingMethodController::class);
    Route::resource('external-monitoring-status', ExternalMonitoringController::class);
    Route::resource('building-status', BuildingStatusController::class);
    Route::resource('academic-session', AcademicSessionController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
