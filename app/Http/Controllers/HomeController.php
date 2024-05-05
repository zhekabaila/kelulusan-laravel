<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Siswa;

class HomeController extends Controller
{
    public function render()
    {
        $data = Siswa::where('nis', auth()->user()->nis)->first();
        return view('pages.user.home', [
            'data' => $data,
            'target_date_time' => Setting::first()->target_waktu,
            'nama' => $data->nama ?? '-'
        ]);
    }
}
