<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function render()
    {
        return view('pages.admin.setting', [
            'data' => Setting::first()
        ]);
    }

    public function update(SettingRequest $request)
    {
        Setting::first()
            ->update($request->validated());

        return back();
    }
}
