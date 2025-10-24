<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\Feedback;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Menampilkan landing page PTSP
     */
    public function landing()
    {
        // Menghitung statistik real dari database
        $totalBukuTamu = Support::count();
        $totalSurvei = Feedback::count();
        $bukuTamuSelesai = Support::where('status', 'selesai')->count();

        // Menghitung rata-rata rating kepuasan
        $avgRating = 0;
        if ($totalSurvei > 0) {
            $avgRating = Feedback::avg('overall_satisfaction') ?: 0;
        }

        // Konversi rating ke persentase kepuasan
        $kepuasanPersen = $avgRating > 0 ? round(($avgRating / 5) * 100) : 95; // Default 95% jika belum ada data

        $stats = [
            'total_pengunjung' => $totalBukuTamu,
            'kepuasan_persen' => $kepuasanPersen,
            'hari_layanan' => 7, // Senin-Sabtu
            'jenis_layanan' => 15, // Estimasi jumlah layanan
        ];

        return view('public.landing', compact('stats'));
    }

    /**
     * Menampilkan halaman buku tamu publik
     */
    public function bukuTamu()
    {
        return view('public.buku-tamu');
    }

    /**
     * Menyimpan data buku tamu dari form publik
     */
    public function storeBukuTamu(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'keperluan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'kartu_identitas' => 'required|file|mimes:jpeg,jpg,png,gif,pdf|max:5120',
        ]);

        // Handle file upload
        $kartuIdentitasPath = null;
        if ($request->hasFile('kartu_identitas')) {
            $file = $request->file('kartu_identitas');
            $fileName = 'kartu_identitas_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/kartu_identitas'), $fileName);
            $kartuIdentitasPath = 'uploads/kartu_identitas/' . $fileName;
        }

        Support::create([
            'name' => $request->name,
            'instansi' => $request->instansi,
            'phone' => $request->phone,
            'keperluan' => $request->keperluan,
            'keterangan' => $request->keterangan,
            'kartu_identitas' => $kartuIdentitasPath,
            'status' => 'menunggu',
        ]);

        return redirect()->route('public.buku-tamu.success');
    }

    /**
     * Menampilkan halaman sukses setelah buku tamu
     */
    public function bukuTamuSuccess()
    {
        return view('public.buku-tamu-success');
    }

    /**
     * Menampilkan halaman survei kepuasan publik
     */
    public function surveiKepuasan()
    {
        return view('public.survei-kepuasan');
    }

    /**
     * Menyimpan data survei kepuasan dari form publik
     */
    public function storeSurveiKepuasan(Request $request)
    {
        $request->validate([
            'requirements_rating' => 'required|integer|min:1|max:5',
            'procedure_rating' => 'required|integer|min:1|max:5',
            'timeliness_rating' => 'required|integer|min:1|max:5',
            'cost_rating' => 'required|integer|min:1|max:5',
            'product_quality_rating' => 'required|integer|min:1|max:5',
            'staff_competence_rating' => 'required|integer|min:1|max:5',
            'staff_politeness_rating' => 'required|integer|min:1|max:5',
            'handling_complaint_rating' => 'required|integer|min:1|max:5',
            'facility_rating' => 'required|integer|min:1|max:5',
            'overall_satisfaction' => 'required|integer|min:1|max:5',
            'message' => 'nullable|string|max:1000',
        ]);

        Feedback::create($request->all());

        return redirect()->route('public.survei-kepuasan')
            ->with('success', 'Terima kasih! Survei kepuasan Anda telah berhasil disimpan.');
    }
}
