<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\setting\builiding_status;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BuildingStatusController extends Controller
{
    public function index(): View
    {
        return view('setting.building_status', [
            'building_statuses' => builiding_status::query()->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(['name' => 'required|unique:builiding_statuses', 'description' => 'present']);

        DB::beginTransaction();
        try {
            builiding_status::firstOrCreate(
                ['name' => $request->name, 'description' => $request->description],
                ['name' => $request->name, 'description' => $request->description]
            );
            toast("Building status added successfully", "success");
            DB::commit();
        } catch (\Exception $e) {
            Alert::error("Something went wrong...");
            DB::rollBack();
            return redirect()->back();
        }
        return redirect()->back();
    }
}
