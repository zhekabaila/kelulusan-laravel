<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function render()
    {
        return view('pages.user.home', [
            'data' => Siswa::where('nis', auth()->user()->nis)->first()
        ]);
    }
}
