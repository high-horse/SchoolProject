<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\extra_class_room;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ExtraClassRoomController extends Controller
{
    public function index(): View
    {
        return view('setting.extra_class_room', [
            'extra_class_rooms' => extra_class_room::query()->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(['name' => 'required|unique:extra_class_rooms', 'description' => 'present']);

        DB::beginTransaction();
        try {
            extra_class_room::firstOrCreate(
                ['name' => $request->name, 'description' => $request->description],
                ['name' => $request->name, 'description' => $request->description]
            );
            toast("Extra Class added successfully", "success");
            DB::commit();
        } catch (\Exception $e) {
            Alert::error("Something went wrong...");
            DB::rollBack();
            return redirect()->back();
        }
        return redirect()->back();
    }
}
