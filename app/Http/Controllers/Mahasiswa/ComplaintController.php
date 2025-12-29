<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $complaints = Complaint::where('user_id', $userId)
            ->latest()
            ->paginate(10);

        $stats = [
            'total' => Complaint::where('user_id', $userId)->count(),
            'pending' => Complaint::where('status', 'pending')->count(),
            'process' => Complaint::where('status', 'process')->count(),
            'done' => Complaint::where('status', 'done')->count(),
        ];

        $categories = Category::get()->all();

        return view('mahasiswa.complaint.index', compact('complaints', 'stats', 'categories'));
    }

    public function show(Complaint $complaint)
    {
        if($complaint->user_id != Auth::id()){
            abort(403, 'Akses Ditolak. Ini bukan laporan Anda.');
        }

        return view('mahasiswa.complaint.show', compact('complaint'));
    }

    public function create()
    {
        $categories = Category::get()->all();

        return view('mahasiswa.complaint.create', compact('categories'));
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

        if ($request->hasFile('image')) {
            $validateData['image'] = $request->file('image')->store('bukti_laporan', 'public');
        }

        $validateData['user_id'] = Auth::id();
        $validateData['status'] = 'pending';

        Complaint::create($validateData);

        return redirect()->route('dashboard')->with('success', 'Laporan berhasil dikirim!');
    }

    public function update()
    {
        
    }
}
