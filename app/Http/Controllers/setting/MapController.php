<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Models\setting\school;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        return view('setting.map.map',[
            'schools' => school::query()->get()
        ]);
    }
}
