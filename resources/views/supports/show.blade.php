@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Buku Tamu</h1>
    <a href="{{ route('supports.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
    </a>
</div>

<!-- Content Row -->
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Buku Tamu</h6>
                <span class="badge badge-{{ $support->status == 'selesai' ? 'success' : ($support->status == 'diproses' ? 'info' : 'warning') }}">
                    {{ ucfirst($support->status) }}
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><strong>Nama Lengkap</strong></label>
                            <p class="form-control-plaintext">{{ e($support->name) }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><strong>Nomor Telepon</strong></label>
                            <p class="form-control-plaintext">{{ e($support->phone) }}</p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label><strong>Instansi/Perusahaan</strong></label>
                    <p class="form-control-plaintext">{{ e($support->instansi) }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Keperluan</strong></label>
                    <p class="form-control-plaintext">{{ e($support->keperluan) }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Status</strong></label>
                    <p class="form-control-plaintext">
                        <span class="badge badge-{{ $support->status == 'selesai' ? 'success' : ($support->status == 'diproses' ? 'info' : 'warning') }}">
                            {{ ucfirst($support->status) }}
                        </span>
                    </p>
                </div>

                @if($support->keterangan)
                <div class="form-group">
                    <label><strong>Keterangan Tambahan</strong></label>
                    <p class="form-control-plaintext">{{ e($support->keterangan) }}</p>
                </div>
                @endif

                <div class="form-group">
                    <label><strong>Tanggal Dibuat</strong></label>
                    <p class="form-control-plaintext">{{ $support->created_at->format('d F Y H:i:s') }}</p>
                </div>

                <div class="form-group">
                    <label><strong>Terakhir Diupdate</strong></label>
                    <p class="form-control-plaintext">{{ $support->updated_at->format('d F Y H:i:s') }}</p>
                </div>

                <hr>

                <div class="text-center">
                    <a href="{{ route('supports.edit', $support->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Data
                    </a>
                    <form action="{{ route('supports.destroy', $support->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="fas fa-trash"></i> Hapus Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection