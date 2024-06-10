<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        // Mengambil semua pengguna dengan usertype 'user' dan menghitung jumlah catatan mereka
        $users = User::where('usertype', 'user')->withCount('notes')->get();

        return view('admin.dashboard', compact('users'));
    }

    public function destroy($id)
    {
        // Menghapus pengguna berdasarkan ID
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
    }
}
