<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tiket;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();
        $orders = order::where('id_user', $currentUser->id)->get();
        return view('role.user.transaksi', compact('orders'));
    }

    public function create(Request $request, $tiketId)
    {
        $tikets = tiket::find($tiketId);
        $users = User::find(auth()->id());

        return view('role.user.create', compact('tikets', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tiket' => 'required|exists:tikets,id',
            'id_user' => 'required|exists:users,id',
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'jumlah_kursi' => 'required|integer|min:1',
            'total_harga' => 'required|integer|min:0',
        ]);

        $tiket = tiket::findOrFail($request->id_tiket);

        if ($request->jumlah_kursi > $tiket->jumlah_kursi) {
            return back()->withInput()->withErrors(['jumlah_kursi' => 'Jumlah kursi yang diminta melebihi yang tersedia.']);
        }

        $total = $tiket->price * $request->jumlah_kursi;

        order::create([
            'id_user' => $request->id_user,
            'id_tiket' => $request->id_tiket,
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'jumlah_kursi' => $request->jumlah_kursi,
            'total_harga' => $total,
        ]);

        $tiket->jumlah_kursi -= $request->jumlah_kursi;
        $tiket->save();

        return redirect()->route('transaksi')->with('success', 'Pesanan tiket berhasil dibuat.');
    }
}
