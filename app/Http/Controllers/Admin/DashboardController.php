<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => Complaint::count(),
            'pending' => Complaint::where('status', 'pending')->count(),
            'process' => Complaint::where('status', 'in-progress')->count(), // sesuaikan value enum di database kamu
            'done' => Complaint::where('status', 'resolved')->count(),     // sesuaikan value enum di database kamu
        ];

        $recentComplaints = Complaint::with(['user', 'category'])
            ->latest()
            ->take(5)
            ->get();

        $categories = Category::withCount('complaints')->get();

        $userStats = [
            'total' => User::count(),
            'mahasiswa' => User::where('role', 'mahasiswa')->count(),
            'admin' => User::where('role', 'admin')->count(),
            'staff' => User::where('role', 'staff')->count(),
        ];

        return view('admin.dashboard', compact('stats', 'recentComplaints', 'categories', 'userStats'));
    }
}
