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
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required',
            'description' => 'required',
            'location' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pathImage = null;
        if ($request->hasFile('image')){
            $pathImage = $request->file('image')->store('bukti_laporan', 'public');
        }

        Complaint::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'image' => $pathImage,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Laporan berhasil dikirim!');
    }
}
