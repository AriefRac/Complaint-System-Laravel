<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $complaints = Complaint::where('user_id', $userId)
            ->latest()
            ->paginate(3);

        $stats = [
            'total' => Complaint::where('user_id', $userId)->count(),
            'pending' => Complaint::where('user_id', $userId)->where('status', 'pending')->count(),
            'in_progress' => Complaint::where('user_id', $userId)->where('status', 'in_progress')->count(),
            'done' => Complaint::where('user_id', $userId)->where('status', 'resolved')->count(),
        ];

        $statPersen = 0;
        if ($stats['total'] > 0) {
            $statPersen = round(($stats['done'] / $stats['total']) * 100);
        }

        $categories = Category::get()->all();

        return view('mahasiswa.dashboard', compact('complaints', 'stats', 'statPersen', 'categories'));
    }

}
