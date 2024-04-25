<?php

namespace App\Http\Controllers;

use App\Models\tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tikets = tiket::all();
        return view('role.user.index', compact('tikets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.maskapai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_penerbangan' => 'required|string',
            'nama_maskapai' => 'required|string',
            'dari_bandara' => 'required|string',
            'tujuan_bandara' => 'required|string',
            'tanggal_keberangkatan' => 'required|date',
            'jam_pergi' => 'required|date_format:H:i',
            'jam_sampai' => 'required|date_format:H:i',
            'jumlah_kursi' => 'required|integer',
            'price' => 'required|integer',
        ]);

        tiket::create([
            'id_user' => Auth::id(),
            'no_penerbangan' => $request->no_penerbangan,
            'nama_maskapai' => $request->nama_maskapai,
            'dari_bandara' => $request->dari_bandara,
            'tujuan_bandara' => $request->tujuan_bandara,
            'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
            'jam_pergi' => $request->jam_pergi,
            'jam_sampai' => $request->jam_sampai,
            'jumlah_kursi' => $request->jumlah_kursi,
            'price' => $request->price,
        ]);
        return redirect()->route('maskapai.index')->with('success', 'tiket berhasil dibuat!');
    }

    public function destroy($id)
    {
        // Cari tiket berdasarkan ID
        $tiket = tiket::find($id);

        // Jika tiket tidak ditemukan, kembalikan respon error
        if (!$tiket) {
            return response()->json(['message' => 'Tiket not found.'], 404);
        }

        // Hapus tiket
        $tiket->delete();

        // Kembalikan respon sukses
        return response()->json(['message' => 'Tiket deleted successfully.']);
    }

    public function edit($id)
    {
        $tiket = tiket::findOrFail($id);
        return view('role.maskapai.edit', compact('tiket'));
    }

    // Method untuk melakukan update data tiket
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'no_penerbangan' => 'required',
            'nama_maskapai' => 'required',
            'dari_bandara' => 'required',
            'tujuan_bandara' => 'required',
            'tanggal_keberangkatan' => 'required',
            'jam_pergi' => 'required',
            'jam_sampai' => 'required',
            'jumlah_kursi' => 'required|integer',
            'price' => 'required|integer',
        ]);

        // Temukan tiket yang ingin diupdate
        $tiket = tiket::findOrFail($id);

        // Update data tiket berdasarkan input dari form
        $tiket->update([
            'no_penerbangan' => $request->no_penerbangan,
            'nama_maskapai' => $request->nama_maskapai,
            'dari_bandara' => $request->dari_bandara,
            'tujuan_bandara' => $request->tujuan_bandara,
            'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
            'jam_pergi' => $request->jam_pergi,
            'jam_sampai' => $request->jam_sampai,
            'jumlah_kursi' => $request->jumlah_kursi,
            'price' => $request->price,
        ]);

        // Redirect ke halaman yang sesuai setelah update
        return redirect()->route('maskapai.index')->with('success', 'Data tiket berhasil diperbarui.');
    }
}
