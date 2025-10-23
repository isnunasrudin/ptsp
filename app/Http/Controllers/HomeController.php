<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Statistik PTSP
        $totalBukuTamu = \App\Models\Support::count();
        $totalSurvei = \App\Models\Feedback::count();
        $bukuTamuMenunggu = \App\Models\Support::where('status', 'menunggu')->count();
        $bukuTamuProses = \App\Models\Support::where('status', 'proses')->count();
        $bukuTamuSelesai = \App\Models\Support::where('status', 'selesai')->count();
        $totalUsers = User::count();

        // Data untuk grafik bulanan (kompatibel dengan SQLite)
        $bukuTamuBulanan = \App\Models\Support::selectRaw('COUNT(*) as total, strftime("%m", created_at) as bulan')
            ->whereRaw('strftime("%Y", created_at) = ?', [date('Y')])
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        $surveiBulanan = \App\Models\Feedback::selectRaw('COUNT(*) as total, strftime("%m", created_at) as bulan')
            ->whereRaw('strftime("%Y", created_at) = ?', [date('Y')])
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        // Rata-rata rating survei
        $avgRating = \App\Models\Feedback::avg('overall_satisfaction');

        // Distribusi status buku tamu
        $statusDistribution = [
            'menunggu' => $bukuTamuMenunggu,
            'proses' => $bukuTamuProses,
            'selesai' => $bukuTamuSelesai,
        ];

        $widget = [
            'total_buku_tamu' => $totalBukuTamu,
            'total_survei' => $totalSurvei,
            'buku_tamu_menunggu' => $bukuTamuMenunggu,
            'buku_tamu_proses' => $bukuTamuProses,
            'buku_tamu_selesai' => $bukuTamuSelesai,
            'total_users' => $totalUsers,
            'avg_rating' => $avgRating ? round($avgRating, 1) : 0,
            'buku_tamu_bulanan' => $bukuTamuBulanan,
            'survei_bulanan' => $surveiBulanan,
            'status_distribution' => $statusDistribution,
        ];

        return view('home', compact('widget'));
    }
}
