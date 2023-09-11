<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\setting\SchoolSubmitRequest;
use App\Models\setting\class_room;
use App\Models\setting\class_school;
use App\Models\setting\school;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SchoolController extends Controller
{
    public function index(): View
    {
        return view('setting.school.school');
    }

    public function store(SchoolSubmitRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            school::create($request->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toast("Something went wrong....", "error");
            return redirect()->back();
        }
        toast("School added successfully", "success");
        return redirect()->back();
    }

    public function index_report(Request $request)
    {
        try {
            $schools = school::query()->latest()->get();
            return response()->json($schools);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function view_map(school $school): View
    {
        return view('setting.school.view_map', compact('school'));
    }

    public function linkClass(): View
    {
        return view('setting.school.link_class', [
            'schools' => school::query()->get(),
            'classes' => class_room::query()->get()
        ]);
    }

    public function linkClassPost(Request $request)
    {
        DB::beginTransaction();
        try {

            $current_session = getCurrentAcademicSession(FALSE);

            class_school::query()
                ->where('school_id', $request->school_id)
                ->where('academic_session_id', $current_session)
                ->delete();

            foreach ($request->class_id as $class_id => $bool) {
                class_school::create([
                    'class_room_id' => $class_id,
                    'school_id' => $request->school_id,
                    'academic_session_id' => getCurrentAcademicSession(false)
                ]);
            }

            toast("Class Linked successfdully", "success");
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Alert::error("Something went wrong...");
            return redirect()->back();
        }

        return redirect()->back();
    }

    public function schoolForm()
    {
        return view('school.school-form', [
            'schools' => school::query()
                ->whereHas('Classes', function ($q) {
                    $q->where('academic_session_id', getCurrentAcademicSession(false));
                })
                ->get()
        ]);
    }
}
