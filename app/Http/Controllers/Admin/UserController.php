<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreaterequest;
use App\Http\Requests\UserUpdaterequest;
use App\Imports\ImportUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function render()
    {
        return view('pages.admin.user', [
            'data' => User::orderBy('nis')->paginate(15)
        ]);
    }

    public function import(Request $request)
    {
        $user = new ImportUser();

        $user->import($request->excel);

        if ($user->failures()->isNotEmpty()) {
            return back()->with('failures', $user->failures());
        }

        return back();
    }

    public function update($id)
    {
        return view('pages.admin.update-user', [
            'data' => User::find($id)
        ]);
    }

    public function create()
    {
        return view('pages.admin.create-user');
    }

    public function delete($id)
    {
        User::find($id)->delete();

        return back();
    }

    public function action_update(UserUpdaterequest $request, $id)
    {
        if (empty($request->validated('password'))) {
            $data = [
                'nis' => $request->validated('nis'),
                'role' => $request->validated('role'),
            ];
        } else {
            $data = [
                'nis' => $request->validated('nis'),
                'role' => $request->validated('role'),
                'password' => Hash::make($request->validated('password')),
            ];
        }

        User::find($id)->update($data);

        return redirect()->route('user');
    }

    public function action_create(UserCreaterequest $request)
    {
        $data = [
            'nis' => $request->validated('nis'),
            'password' => Hash::make($request->validated('password')),
            'role' => $request->validated('role'),
        ];

        User::create($data);

        return redirect()->route('user');
    }
}
