<?php

namespace App\Http\Controllers;

use App\Http\Requests\School\ClassDeatilForm;
use App\Http\Requests\School\ExternalMonitoringStatusForm;
use App\Http\Requests\School\PhysicalInformationForm;
use App\Http\Requests\setting\MedicalFacilityForm;
use App\Models\school\medical_toilet_facility;
use App\Models\School\physicalInformationForm as SchoolPhysicalInformationForm;
use App\Models\School\school_class_room_detail;
use App\Models\School\school_class_room_extra_detail;
use App\Models\School\school_external_monitoring_status_form;
use App\Models\School\school_internet_detail;
use App\Models\setting\external_monitoring_status;
use App\Models\setting\extra_class_room;
use App\Models\setting\internet_isp;
use App\Models\setting\school;
use App\Models\setting\teaching_method;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SchoolFormController extends Controller
{
    public function index(school $school)
    {
        return view('school.fill_form', [
            'school' => $school
        ]);
    }

    public function physicalInfortmation(school $school)
    {
        return view('school.physical_information', [
            'school' => $school,
            'isps' => internet_isp::query()->get()
        ]);
    }

    public function physicalInfortmationStore(PhysicalInformationForm $request, school $school): RedirectResponse
    {
        DB::beginTransaction();
        try {

            $physical_information_form = SchoolPhysicalInformationForm::firstOrCreate(
                $request->except('isp_id', 'internet_speed', 'isp_contact_no', '_token') + ['school_id' => $school->id],
                $request->except('isp_id', 'internet_speed', 'isp_contact_no', '_token') + ['school_id' => $school->id]
            );

            if ($request->has('isp_id')) {
                foreach ($request->isp_id as $key => $isp_id) {
                    school_internet_detail::firstOrCreate(
                        [
                            'isp_id' => $isp_id,
                            'internet_speed' => $request->internet_speed[$key],
                            'isp_contact_no' => $request->isp_contact_no[$key],
                            'school_id' => $school->id,
                            'physical_information_form_id' => $physical_information_form->id
                        ],
                        [
                            'isp_id' => $isp_id,
                            'internet_speed' => $request->internet_speed[$key],
                            'isp_contact_no' => $request->isp_contact_no[$key],
                            'school_id' => $school->id,
                            'physical_information_form_id' => $physical_information_form->id
                        ]
                    );
                }
            }
            toast("Physical Information added successfully", "success");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error("Something Went Wrong...");
        }

        return redirect()->route('school.form_dashboard', ['school' => $school->id]);
    }

    /*
    * @method for medical facility 
    */

    public function medicalFacility(school $school)
    {
        $medical_toilet_facility = medical_toilet_facility::query()->where('school_id', $school->id)->first();

        $view = $medical_toilet_facility == null ? 'medical_facility' : 'edit_medical_facility';

        return view('school.' . $view, [
            'school' => $school,
            'isps' => internet_isp::query()->get(),
            'medical_toilet_facility' => $medical_toilet_facility
        ]);
    }

    public function medicalFacilityStore(MedicalFacilityForm $request, school $school): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $medical_toilet_facility = medical_toilet_facility::firstOrCreate(
                $request->except('_token') + ['school_id' => $school->id, 'user_id' => auth()->id()],
                $request->except('_token') + ['school_id' => $school->id, 'user_id' => auth()->id()]
            );

            toast("Medical & Toilet facility added successfully", "success");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error("Something Went Wrong...");
        }

        return redirect()->back();
    }

    /*
    * @method for Class Detail 
    */

    public function classDetail(school $school)
    {
        $school = $school->load('Classes');

        if (!$school->Classes->count()) {
            Alert::error("First Link Class To Fill This Form");
            return redirect()->back();
        }

        $school_class_room_details = school_class_room_detail::query()
            ->where('academic_session_id', getCurrentAcademicSession(false))
            ->with('School', 'classRoom', 'academicSession')
            ->get();

        $school_class_room_extra_detail = school_class_room_extra_detail::query()
            ->where('school_id', $school->id)
            ->with('extraClassRoom', 'School')
            ->get();

        $view = $school_class_room_extra_detail->count() ? 'edit_class_detail' : 'class_detail';

        return view('school.' . $view, [
            'school' => $school,
            'extra_classes' => extra_class_room::query()->get(),
            'school_class_room_details' => $school_class_room_details,
            'school_class_room_extra_details' => $school_class_room_extra_detail

        ]);
    }

    public function classDetailStore(ClassDeatilForm $request, school $school): RedirectResponse
    {
        DB::beginTransaction();
        try {

            $user = auth()->user();
            $current_academic_session = getCurrentAcademicSession(false);

            foreach ($request->no_of_male as $class_id => $no_of_male) {

                $school_create_data_array = [
                    'school_id' => $school->id,
                    'class_room_id' => $class_id,
                    'no_of_male' => $no_of_male,
                    'no_of_female' => $request->no_of_female[$class_id],
                    'academic_session_id' => $current_academic_session,
                    'user_id' => $user->id
                ];

                school_class_room_detail::firstOrCreate($school_create_data_array, $school_create_data_array);
            }

            foreach ($request->extra_class_room_id as $extra_class_room_id => $total) {
                $school_class_room_extra_detail_create_array = [
                    'school_id' => $school->id,
                    'extra_class_room_id' => $extra_class_room_id,
                    'total' => $total
                ];
                school_class_room_extra_detail::firstOrCreate($school_class_room_extra_detail_create_array, $school_class_room_extra_detail_create_array);
            }

            toast("Class Deatil added successfully", "success");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error("Something Went Wrong...");
        }

        return redirect()->back();
    }

    /*
    * @method for External Monitoring status
    */

    public function externalMonitoringStatus(school $school)
    {
        $current_academic_session = getCurrentAcademicSession(false);

        $school_external_monitoring_status_form = school_external_monitoring_status_form::query()
            ->where('academic_session_id', $current_academic_session)
            ->where('school_id', $school->id)
            ->first();

        return view('school.external_monitoring_status', [
            'school' => $school,
            'teaching_methods' => teaching_method::query()->get(),
            'external_monitoring_statuses' => external_monitoring_status::query()
                ->with('schoolEternalMonitoringStatusForm', function ($q) use ($current_academic_session) {
                    $q->where('academic_session_id', $current_academic_session);
                })->get(),
            'school_external_monitoring_status_form' => $school_external_monitoring_status_form
        ]);
    }

    public function externalMonitoringStatusStore(ExternalMonitoringStatusForm $request, school $school): RedirectResponse
    {
        DB::beginTransaction();
        try {

            $user = auth()->user();
            $current_academic_session = getCurrentAcademicSession(false);

            $school_external_monitoring_status_forms = school_external_monitoring_status_form::query()
                ->where('academic_session_id', $current_academic_session)
                ->where('school_id', $school->id)
                ->get();

            if ($school_external_monitoring_status_forms->count()) {
                foreach ($school_external_monitoring_status_forms as $school_external_monitoring_status_form) {
                    $school_external_monitoring_status_form->delete();
                }
                foreach ($request->external_monitoring_status_id as $external_monitoring_status_id => $total) {
                    school_external_monitoring_status_form::create(
                        [
                            'school_id' => $school->id,
                            'user_id' => $user->id,
                            'child_club' => $request->has('child_club') ? true : false,
                            'teaching_method_id' => $request->teaching_method_id,
                            'external_monitoring_status_id' => $external_monitoring_status_id,
                            'total' => $total,
                            'academic_session_id' => $current_academic_session
                        ]
                    );
                }
            } else {
                foreach ($request->external_monitoring_status_id as $external_monitoring_status_id => $total) {
                    school_external_monitoring_status_form::create(
                        [
                            'school_id' => $school->id,
                            'user_id' => $user->id,
                            'child_club' => $request->has('child_club') ? true : false,
                            'teaching_method_id' => $request->teaching_method_id,
                            'external_monitoring_status_id' => $external_monitoring_status_id,
                            'total' => $total,
                            'academic_session_id' => $current_academic_session
                        ]
                    );
                }
            }

            toast("External Monitoring Status Saved successfully", "success");
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            Alert::error("Something Went Wrong...");
        }
        return redirect()->back();
    }
}
