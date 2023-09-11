<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSubmitRequest;
use App\Models\setting\school;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('setting.user.user', [
            'users' => User::query()
                ->where('is_admin', false)
                ->whereNotNull('school_id')
                ->with('School')
                ->get(),

            'schools' => school::query()->get()
        ]);
    }

    public function userStore(UserSubmitRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create($request->validated());
            toast("User Created Successfully", "success");
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            Alert::error("Something went wrong");
            return redirect()->back();
        }

        return redirect()->back();
    }
}
