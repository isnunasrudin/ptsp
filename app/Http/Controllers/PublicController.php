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
        return view('public.landing');
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
        ]);

        Support::create([
            'name' => $request->name,
            'instansi' => $request->instansi,
            'phone' => $request->phone,
            'keperluan' => $request->keperluan,
            'keterangan' => $request->keterangan,
            'status' => 'menunggu',
        ]);

        return redirect()->route('public.buku-tamu')
            ->with('success', 'Terima kasih! Data buku tamu Anda telah berhasil disimpan.');
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
