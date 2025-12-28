<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index()
    {
        return view('mahasiswa.dashboard');
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'description' => 'required',
            'location' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')){
            $validateData['imgae'] = $request->file('image')->store('bukti_laporan', 'public');
        }

        $validateData['user_id'] = Auth::id();
        $validateData['status'] = 'pending';

        Complaint::create($validateData);

        return redirect()->route('dashboard')->with('success', 'Laporan berhasil dikirim!');
    }
}
