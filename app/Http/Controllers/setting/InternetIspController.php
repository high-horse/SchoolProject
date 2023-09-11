<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\internet_isp;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class InternetIspController extends Controller
{
    public function index(): View
    {
        return view('setting.internet_isp', [
            'internt_ips' => internet_isp::query()->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(['name' => 'required|unique:internet_isps', 'description' => 'present']);

        DB::beginTransaction();
        try {
            internet_isp::firstOrCreate(
                ['name' => $request->name, 'description' => $request->description],
                ['name' => $request->name, 'description' => $request->description]
            );
            toast("Internet Isp added successfully", "success");
            DB::commit();
        } catch (\Exception $e) {
            Alert::error("Something went wrong...");
            DB::rollBack();
            return redirect()->back();
        }
        return redirect()->back();
    }
}
