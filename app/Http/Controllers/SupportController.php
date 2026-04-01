<?php

namespace App\Http\Controllers;

use App\Exports\SupportExport;
use App\Models\Support;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supports = Support::latest()->paginate(10);
        return view('supports.index', compact('supports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'tanggal_kunjungan' => 'required|date',
            'keperluan' => 'required|string|max:255',
            'keperluan_manual' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'kartu_identitas' => 'required|file|mimes:jpeg,jpg,png,gif|max:5120',
            'dokumen_pendukung' => 'nullable|file|mimes:jpeg,jpg,png,gif,pdf,doc,docx|max:5120',
            'has_dokumen' => 'required|in:tidak,ada',
            'status' => 'required|in:menunggu,diproses,selesai',
        ]);

        // Custom validation for keperluan_manual
        if ($request->keperluan === 'Lainnya' && empty($request->keperluan_manual)) {
            return redirect()->back()
                ->withErrors(['keperluan_manual' => 'Keperluan manual wajib diisi saat memilih opsi "Lainnya".'])
                ->withInput();
        }

        // Handle file uploads
        $data = $request->except(['kartu_identitas', 'dokumen_pendukung', 'keperluan_manual']);

        // Set keperluan based on selection
        if ($request->keperluan === 'Lainnya') {
            $data['keperluan'] = $request->keperluan_manual;
        }

        // Handle kartu identitas upload
        if ($request->hasFile('kartu_identitas')) {
            $file = $request->file('kartu_identitas');
            $fileName = 'kartu_identitas_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/kartu_identitas'), $fileName);
            $data['kartu_identitas'] = 'uploads/kartu_identitas/' . $fileName;
        }

        // Handle dokumen pendukung upload only if user has dokumen
        if ($request->has_dokumen === 'ada' && $request->hasFile('dokumen_pendukung')) {
            $file = $request->file('dokumen_pendukung');
            $fileName = 'dokumen_pendukung_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/dokumen_pendukung'), $fileName);
            $data['dokumen_pendukung'] = 'uploads/dokumen_pendukung/' . $fileName;
        }

        Support::create($data);

        return redirect()->route('supports.index')
            ->with('success', 'Data buku tamu berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support)
    {
        return view('supports.show', compact('support'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Support $support)
    {
        return view('supports.edit', compact('support'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Support $support)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'tanggal_kunjungan' => 'required|date',
            'keperluan' => 'required|string|max:255',
            'keperluan_manual' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'kartu_identitas' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:5120',
            'dokumen_pendukung' => 'nullable|file|mimes:jpeg,jpg,png,gif,pdf,doc,docx|max:5120',
            'status' => 'required|in:menunggu,diproses,selesai',
        ]);

        // Custom validation for keperluan_manual
        if ($request->keperluan === 'Lainnya' && empty($request->keperluan_manual)) {
            return redirect()->back()
                ->withErrors(['keperluan_manual' => 'Keperluan manual wajib diisi saat memilih opsi "Lainnya".'])
                ->withInput();
        }

        // Handle file uploads
        $updateData = $request->except(['kartu_identitas', 'dokumen_pendukung', 'keperluan_manual']);

        // Set keperluan based on selection
        if ($request->keperluan === 'Lainnya') {
            $updateData['keperluan'] = $request->keperluan_manual;
        }

        // Handle kartu identitas upload
        if ($request->hasFile('kartu_identitas')) {
            // Delete old file if exists
            if ($support->kartu_identitas && file_exists(public_path($support->kartu_identitas))) {
                unlink(public_path($support->kartu_identitas));
            }

            // Upload new file
            $file = $request->file('kartu_identitas');
            $fileName = 'kartu_identitas_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/kartu_identitas'), $fileName);
            $updateData['kartu_identitas'] = 'uploads/kartu_identitas/' . $fileName;
        }

        // Handle dokumen pendukung upload
        if ($request->hasFile('dokumen_pendukung')) {
            // Delete old file if exists
            if ($support->dokumen_pendukung && file_exists(public_path($support->dokumen_pendukung))) {
                unlink(public_path($support->dokumen_pendukung));
            }

            // Upload new file
            $file = $request->file('dokumen_pendukung');
            $fileName = 'dokumen_pendukung_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/dokumen_pendukung'), $fileName);
            $updateData['dokumen_pendukung'] = 'uploads/dokumen_pendukung/' . $fileName;
        }

        $support->update($updateData);

        return redirect()->route('supports.index')
            ->with('success', 'Data buku tamu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Support $support)
    {
        // Delete associated files if exists
        if ($support->kartu_identitas && file_exists(public_path($support->kartu_identitas))) {
            unlink(public_path($support->kartu_identitas));
        }

        if ($support->dokumen_pendukung && file_exists(public_path($support->dokumen_pendukung))) {
            unlink(public_path($support->dokumen_pendukung));
        }

        $support->delete();

        return redirect()->route('supports.index')
            ->with('success', 'Data buku tamu berhasil dihapus.');
    }

    public function export(Request $request)
    {
        $validated = $request->validate([
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
        ]);

        return Excel::download(new SupportExport($validated['from'], $validated['to']), 'supports_' . $validated['from'] . '_' . $validated['to'] . '.xlsx');
    }

    public function print(Request $request)
    {
        $validated = $request->validate([
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
        ]);

        return Pdf::loadView('print.recap', [
            'supports' => Support::whereBetween('tanggal_kunjungan', [$validated['from'], $validated['to']])->get(),
            'from' => $validated['from'],
            'to' => $validated['to'],
        ])->stream("Rekap Buku Tamu " . $validated['from'] . "_" . $validated['to'] . ".pdf");
    }


}
