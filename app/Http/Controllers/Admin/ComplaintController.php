<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        $query = Complaint::with(['user', 'category'])->latest();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($u) use ($search) {
                        $u->where('name', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->has('status') && $request->status != '' && $request->status != 'Semua Status') {
            $query->where('status', $request->status);
        }

        if ($request->has('priority') && $request->priority != '' && $request->priority != 'Semua Prioritas') {
            $query->where('priority', $request->priority);
        }

        if ($request->has('category') && $request->category != '' && $request->category != 'Semua Kategori') {
            $query->where('category_id', $request->category);
        }

        $complaints = $query->paginate(8)->appends($request->query());

        $stats = [
            'total' => Complaint::count(),
            'pending' => Complaint::where('status', 'pending')->count(),
            'process' => Complaint::where('status', 'in-progress')->count(),
            'done' => Complaint::where('status', 'resolved')->count(),
        ];

        $categories = Category::all();

        return view('admin.complaint.index', compact('complaints', 'stats', 'categories'));
    }


    public function update(Request $request, Complaint $complaint)
    {
        $request->validate([
            'status' => 'required',
            'priority' => 'required',
            'admin_note' => 'nullable|string'
        ]);

        $complaint->update([
            'status' => $request->status,
            'priority' => $request->priority,
            'admin_note' => $request->admin_note,
        ]);

        return back()->with('success', 'Status dan Prioritas pengaduan berhasil diperbarui!');
    }
}
