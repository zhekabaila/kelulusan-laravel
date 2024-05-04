<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiswaCreateRequest;
use App\Http\Requests\SiswaUpdaterequest;
use App\Imports\ImportSiswa;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function render()
    {
        return view('pages.admin.dashboard', [
            'data' => Siswa::orderBy('nis')->paginate(15),
        ]);
    }

    public function import(Request $request)
    {
        $siswa = new ImportSiswa();

        $siswa->import($request->excel);

        if ($siswa->failures()->isNotEmpty()) {
            return back()->with('failures', $siswa->failures());
        }

        return back();
    }

    public function update($id)
    {
        return view('pages.admin.update-siswa', [
            'data' => Siswa::find($id),
            'id' => $id,
        ]);
    }

    public function create()
    {
        return view('pages.admin.create-siswa');
    }

    public function delete($id)
    {
        Siswa::find($id)->delete();

        return back();
    }

    public function action_update(SiswaUpdaterequest $request, $id)
    {
        Siswa::find($id)->update($request->validated());

        return redirect()->route('dashboard');
    }

    public function action_create(SiswaCreateRequest $request)
    {
        Siswa::create($request->validated());

        return redirect()->route('dashboard');
    }
}
