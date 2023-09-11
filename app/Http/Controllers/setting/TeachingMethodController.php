<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\teaching_method;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TeachingMethodController extends Controller
{
    public function index(): View
    {
        return view('setting.teaching_method', [
            'teaching_methods' => teaching_method::query()->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(['name' => 'required|unique:teaching_methods', 'description' => 'present']);

        DB::beginTransaction();
        try {
            teaching_method::firstOrCreate(
                ['name' => $request->name, 'description' => $request->description],
                ['name' => $request->name, 'description' => $request->description]
            );
            toast("Teaching Method added successfully", "success");
            DB::commit();
        } catch (\Exception $e) {
            Alert::error("Something went wrong...");
            DB::rollBack();
            return redirect()->back();
        }
        return redirect()->back();
    }
}
