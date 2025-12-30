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
            'pending' => Complaint::where('status', 'pending')->count(),
            'process' => Complaint::where('status', 'process')->count(),
            'done' => Complaint::where('status', 'done')->count(),
        ];

        $statPersen = 0;

        if ($stats['total'] != 0) {
            $statPersen = $stats['done']/$stats['total'];
        }

        $categories = Category::get()->all();

        return view('mahasiswa.dashboard', compact('complaints', 'stats', 'statPersen', 'categories'));
    }

}
