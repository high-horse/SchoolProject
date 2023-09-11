<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\academic_session;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AcademicSessionController extends Controller
{
    public function index(): View
    {
        return view('setting.academic_session', [
            'academic_sessions' => academic_session::query()->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(['name' => 'required|unique:academic_sessions']);
        DB::beginTransaction();
        try {
            academic_session::firstOrCreate(['name' => $request->name], ['name' => $request->name]);
            toast("Academic session added successfully", "success");
            DB::commit();
        } catch (\Exception $e) {
            Alert::error("Something went wrong...");
            DB::rollBack();
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function edit(academic_session $academic_session)
    {
        $academic_sessions = academic_session::query()->where(['is_active' => true]);

        if ($academic_sessions != null) {
            $academic_sessions->update(['is_active' => false]);
        }

        $academic_session->update(['is_active' => true]);

        toast("Current academic session set successfully", "success");
        return redirect()->back();
    }
}
