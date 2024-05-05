<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiswaCreateRequest;
use App\Http\Requests\SiswaUpdaterequest;
use App\Imports\ImportSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function render(Request $request)
    {
        return view('pages.admin.dashboard', [
            'data' => Siswa::when($request->search, function ($q) use ($request) {
                $q
                    ->where('nis', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('nama', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('nisn', 'LIKE', '%' . $request->search . '%');
            })
                ->orderBy('nis')
                ->paginate(15),
        ]);
    }

    public function import(Request $request)
    {
        $siswa = new ImportSiswa();

        $siswa->import($request->excel);

        if ($siswa->failures()->isNotEmpty()) {

            notify()->error('Terjadi kesalahan saat mengimport siswa!');

            return back()->with('failures', $siswa->failures());
        }

        notify()->success('Siswa telah berhasil diimport!');

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

        notify()->success('Siswa telah berhasil dihapus!');

        return back();
    }

    public function action_update(SiswaUpdaterequest $request, $id)
    {
        Siswa::find($id)->update($request->validated());

        notify()->success('Siswa telah berhasil diubah!');

        return redirect()->route('dashboard');
    }

    public function action_create(SiswaCreateRequest $request)
    {
        Siswa::create($request->validated());

        notify()->success('Siswa telah berhasil ditambahkan!');

        return redirect()->route('dashboard');
    }
}
