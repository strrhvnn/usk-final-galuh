<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tiket;

class MaskapaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tikets = tiket::all();

        return view('role.maskapai.index', compact('tikets'));
    }
}
