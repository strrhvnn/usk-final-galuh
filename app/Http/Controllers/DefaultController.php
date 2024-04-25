<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function selection()
    {
        if (Auth::id()) {

            $role = Auth()->user()->role;

            if ($role == 'Admin') {
                return redirect()->route('admin.index');
            } else if ($role == 'MaskapaiReal') {
                return redirect()->route('maskapai.index');
            } else if ($role == 'User') {
                return redirect()->route('user.index');
            } else if ($role == 'Maskapai') {
                return view('role.none');
            }
        }
    }

    public function index()
    {
        $users = User::where('role', 'Maskapai')->get();
        return view('role.admin.index', compact('users'));
    }

    public function home(){
        $users = User::all();
        return view('role.admin.home', compact('users'));
    }

    public function updateRole($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'MaskapaiReal';
        $user->save();
        return redirect()->back()->with('success', 'Peran pengguna berhasil diubah menjadi MaskapaiReal.');
    }
}
