<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

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
            'keperluan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:menunggu,diproses,selesai',
        ]);

        Support::create($request->all());

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
            'keperluan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'kartu_identitas' => 'nullable|file|mimes:jpeg,jpg,png,gif,pdf|max:5120',
            'status' => 'required|in:menunggu,diproses,selesai',
        ]);

        // Handle file upload
        $updateData = $request->except('kartu_identitas');

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

        $support->update($updateData);

        return redirect()->route('supports.index')
            ->with('success', 'Data buku tamu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Support $support)
    {
        // Delete associated file if exists
        if ($support->kartu_identitas && file_exists(public_path($support->kartu_identitas))) {
            unlink(public_path($support->kartu_identitas));
        }

        $support->delete();

        return redirect()->route('supports.index')
            ->with('success', 'Data buku tamu berhasil dihapus.');
    }
}
