<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;

class LaporanController extends Controller
{
    public function index()
    {
        // Ambil ID user yang sedang login
        $userId = auth()->id();

        // Ambil pesanan yang terkait dengan tiket yang dimiliki oleh user
        $pendingOrders = Order::whereHas('tiket', function ($query) use ($userId) {
            $query->where('id_user', $userId);
        })->where('status', 'success')->get();

        return view('role.maskapai.transaksi', ['pendingOrders' => $pendingOrders]);
    }


    public function konfirmasi()
    {
        $pendingOrders = order::where('status', 'pending')->get();
        return view('role.admin.konfirmasi', ['pendingOrders' => $pendingOrders]);
    }

    public function markAsSuccess($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->status = 'success';
        $order->save();
        return redirect()->back()->with('success', 'Order status has been updated to success.');
    }
}
