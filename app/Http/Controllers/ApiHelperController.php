<?php

namespace App\Http\Controllers;

use App\Models\setting\class_room;
use App\Models\setting\class_school;
use App\Models\setting\school;
use Illuminate\Http\Request;

class ApiHelperController extends Controller
{
    public function linkClass()
    {
        $current_academic_session = getCurrentAcademicSession(false);
        $school = school::query()
            ->where('id', request('school_id'))
            ->first();

        $classes = class_room::query()->get();

        $school_classes = class_school::query()
            ->where('academic_session_id', $current_academic_session)
            ->where('school_id', $school->id)
            ->get();

        $html = '';
        $html .= '<input type="hidden" value="' . $school->id . '" name="school_id">';
        foreach ($classes as $key => $class) {
            $html .= '<div class="col-4 p-2 table-bordered">
                        <div class="position-relative form-group">
                            <label for="class_id" class="font-weight-bold">' . $class->name . '</label>
                            <input  name="class_id[' . $class->id . ']" value="' . $class->id . '" type="checkbox"
                                class="form-control"' . ($school_classes->count() ? (checkIfElementExistInCollection($school_classes, 'class_room_id', $class->id) ? 'checked' : '') : "") . '>
                        </div>
                        </div>';
        }
        return response()->json($html);
    }
}
