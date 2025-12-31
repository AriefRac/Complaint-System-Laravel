<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        // 1. Mulai Query
        $query = Complaint::where('user_id', $userId)->latest();

        // 2. Filter Pencarian (Search)
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        // 3. Filter Status
        if ($request->has('status') && $request->status != '' && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        // 4. Filter Kategori
        if ($request->has('category') && $request->category != '' && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }

        // 5. Eksekusi Pagination (Jangan lupa appends agar filter tidak hilang saat pindah halaman)
        $complaints = $query->paginate(6)->appends($request->query());

        // --- STATISTIK ---
        // Statistik tetap menghitung SEMUA data user, tidak terpengaruh filter
        $stats = [
            'total' => Complaint::where('user_id', $userId)->count(),
            'pending' => Complaint::where('user_id', $userId)->where('status', 'pending')->count(),
            'in_progress' => Complaint::where('user_id', $userId)->where('status', 'in-progress')->count(),
            'done' => Complaint::where('user_id', $userId)->where('status', 'resolved')->count(),
        ];

        $categories = Category::all();

        return view('mahasiswa.complaint.index', compact('complaints', 'stats', 'categories'));
    }

    public function show(Complaint $complaint)
    {
        if ($complaint->user_id != Auth::id()) {
            abort(403, 'Akses Ditolak. Ini bukan laporan Anda.');
        }

        return view('mahasiswa.complaint.show', compact('complaint'));
    }

    public function create()
    {
        $categories = Category::all();
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
        $validateData['priority'] = 'medium'; 

        Complaint::create($validateData);

        return redirect()->route('dashboard')->with('success', 'Laporan berhasil dikirim!');
    }

    /**
     * Menampilkan form edit
     */
    public function edit(Complaint $complaint)
    {
        if ($complaint->user_id != Auth::id()) {
            abort(403, 'Akses Ditolak.');
        }

        if ($complaint->status != 'pending') {
            return back()->with('error', 'Laporan tidak dapat diedit karena sudah diproses oleh admin.');
        }

        $categories = Category::all();
        return view('mahasiswa.complaint.edit', compact('complaint', 'categories'));
    }

    /**
     * Proses update data ke database
     */
    public function update(Request $request, Complaint $complaint)
    {
        if ($complaint->user_id != Auth::id()) {
            abort(403, 'Akses Ditolak.');
        }

        if ($complaint->status != 'pending') {
            return back()->with('error', 'Laporan tidak dapat diubah karena status bukan Menunggu.');
        }

        $rules = [
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'description' => 'required',
            'location' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $validateData = $request->validate($rules);

        if ($request->hasFile('image')) {
            if ($complaint->image) {
                Storage::disk('public')->delete($complaint->image);
            }

            $validateData['image'] = $request->file('image')->store('bukti_laporan', 'public');
        }

        $complaint->update($validateData);

        return redirect()->route('complaints.index')->with('success', 'Laporan berhasil diperbarui!');
    }

    /**
     * Proses hapus laporan
     */
    public function destroy(Complaint $complaint)
    {
        if ($complaint->user_id != Auth::id()) {
            abort(403, 'Akses Ditolak.');
        }

        if ($complaint->status != 'pending') {
            return back()->with('error', 'Laporan tidak dapat dihapus karena sudah diproses.');
        }

        if ($complaint->image) {
            Storage::disk('public')->delete($complaint->image);
        }

        $complaint->delete();

        return redirect()->route('complaints.index')->with('success', 'Laporan berhasil dihapus.');
    }
}