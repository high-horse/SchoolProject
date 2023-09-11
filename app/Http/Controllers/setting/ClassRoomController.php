<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\class_room;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ClassRoomController extends Controller
{
    public function index(): View
    {
        return view('setting.class', [
            'classes' => class_room::query()->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(['name' => 'required|unique:class_rooms']);
        DB::beginTransaction();
        try {
            class_room::firstOrCreate(['name' => $request->name], ['name' => $request->name]);
            toast("Class added successfully", "success");
            DB::commit();
        } catch (\Exception $e) {
            Alert::error("Something went wrong...");
            DB::rollBack();
            return redirect()->back();
        }
        return redirect()->back();
    }
}
