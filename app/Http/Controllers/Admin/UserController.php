<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // 1. Mulai Query
        // Kita exclude user yang sedang login agar tidak hapus diri sendiri (opsional)
        $query = User::where('id', '!=', Auth::id())->latest();

        // 2. Filter Search (Nama atau Email)
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // 3. Filter Role
        if ($request->has('role') && $request->role != '' && $request->role != 'Semua Role') {
            // Pastikan value di option select view sesuai dengan value di database (lowercase)
            $query->where('role', strtolower($request->role));
        }

        // 4. Filter Status (Jika ada kolom is_active atau status)
        if ($request->has('status') && $request->status != '' && $request->status != 'Semua Status') {
            $isActive = $request->status == 'Aktif' ? 1 : 0; // Sesuaikan dengan logika DB Anda
            $query->where('is_active', $isActive);
        }

        $users = $query->paginate(10)->appends($request->query());

        // Statistik User
        $stats = [
            'total' => User::count(),
            'admin' => User::where('role', 'admin')->count(),
            'mahasiswa' => User::where('role', 'mahasiswa')->count(),
            'dosen' => User::where('role', 'dosen')->count(),
        ];

        return view('admin.users.index', compact('users', 'stats'));
    }

    public function destroy(User $user)
    {
        // Cegah hapus diri sendiri (Double protection)
        if ($user->id == Auth::id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun sendiri.');
        }

        $user->delete();
        return back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
