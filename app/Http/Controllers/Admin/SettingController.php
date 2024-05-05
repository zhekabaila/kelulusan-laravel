<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;

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
            ->update([
                'nama_sekolah' => $request->validated('nama_sekolah'),
                'tahun_ajaran' => $request->validated('tahun_ajaran'),
                'target_waktu' => $request->validated('target_waktu'),
                'no_hp' => '62' . $request->validated('no_hp'),
            ]);

        notify()->success('Pengaturan telah berhasil diubah!');

        return back();
    }
}
