<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::latest()->get();

        return view('admin.complaint.index', compact('complaints'));
    }

    public function update(Request $request, Complaint $complaint)
    {
        $request->validate([
            'status' => 'required|in:pending,proses,selesai,ditolak',
            'priority' => 'required|in:low,medium,high,urgent',
        ]);

        $complaint->update([
            'status' => $request->status,
            'priority' => $request->priority,
        ]);

        return back()->with('success', 'Status dan Prioritas diperbarui!');
    }
}
