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

                @if($support->kartu_identitas)
                <div class="form-group">
                    <label><strong>Foto</strong></label>
                    <div class="border rounded p-3 bg-light">
                        @php
                            $fileExtension = strtolower(pathinfo($support->kartu_identitas, PATHINFO_EXTENSION));
                            $fileName = basename($support->kartu_identitas);
                        @endphp

                        <div class="d-flex align-items-center mb-3">
                            <div class="mr-3">
                                <i class="fas fa-image fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">{{ $fileName }}</h6>
                                <small class="text-muted">Format: {{ strtoupper($fileExtension) }}</small>
                            </div>
                        </div>

                        <!-- Image preview -->
                        <div class="text-center mb-3">
                            <img src="{{ asset($support->kartu_identitas) }}"
                                 class="img-fluid rounded border"
                                 style="max-height: 300px;"
                                 alt="Foto">
                        </div>

                        <div class="text-center">
                            <a href="{{ asset($support->kartu_identitas) }}"
                               target="_blank"
                               class="btn btn-sm btn-primary">
                                <i class="fas fa-external-link-alt mr-1"></i>
                                Buka di Tab Baru
                            </a>
                            <a href="{{ asset($support->kartu_identitas) }}"
                               download="{{ $fileName }}"
                               class="btn btn-sm btn-success">
                                <i class="fas fa-download mr-1"></i>
                                Download
                            </a>
                        </div>
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label><strong>Foto</strong></label>
                    <p class="form-control-plaintext text-muted">
                        <i class="fas fa-exclamation-circle mr-2"></i> Tidak ada file foto
                    </p>
                </div>
                @endif

                @if($support->dokumen_pendukung)
                <div class="form-group">
                    <label><strong>Dokumen Pendukung</strong></label>
                    <div class="border rounded p-3 bg-light">
                        @php
                            $docExtension = strtolower(pathinfo($support->dokumen_pendukung, PATHINFO_EXTENSION));
                            $docFileName = basename($support->dokumen_pendukung);
                        @endphp

                        <div class="d-flex align-items-center mb-3">
                            <div class="mr-3">
                                @if(in_array($docExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                    <i class="fas fa-image fa-2x text-success"></i>
                                @elseif($docExtension === 'pdf')
                                    <i class="fas fa-file-pdf fa-2x text-danger"></i>
                                @elseif(in_array($docExtension, ['doc', 'docx']))
                                    <i class="fas fa-file-word fa-2x text-primary"></i>
                                @else
                                    <i class="fas fa-file fa-2x text-secondary"></i>
                                @endif
                            </div>
                            <div>
                                <h6 class="mb-0">{{ $docFileName }}</h6>
                                <small class="text-muted">Format: {{ strtoupper($docExtension) }}</small>
                            </div>
                        </div>

                        <!-- File preview based on type -->
                        <div class="text-center mb-3">
                            @if(in_array($docExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                <!-- Image preview -->
                                <img src="{{ asset($support->dokumen_pendukung) }}"
                                     class="img-fluid rounded border"
                                     style="max-height: 300px;"
                                     alt="Dokumen Pendukung">
                            @elseif($docExtension === 'pdf')
                                <!-- PDF preview icon -->
                                <div class="py-5">
                                    <i class="fas fa-file-pdf fa-5x text-danger mb-3"></i>
                                    <h5 class="text-muted">Document PDF</h5>
                                    <p class="text-muted">Klik tombol di bawah untuk melihat dokumen</p>
                                </div>
                            @elseif(in_array($docExtension, ['doc', 'docx']))
                                <!-- Word document preview icon -->
                                <div class="py-5">
                                    <i class="fas fa-file-word fa-5x text-primary mb-3"></i>
                                    <h5 class="text-muted">Document Word</h5>
                                    <p class="text-muted">Klik tombol di bawah untuk melihat dokumen</p>
                                </div>
                            @else
                                <!-- Generic file preview -->
                                <div class="py-5">
                                    <i class="fas fa-file fa-5x text-secondary mb-3"></i>
                                    <h5 class="text-muted">Document</h5>
                                    <p class="text-muted">Klik tombol di bawah untuk melihat dokumen</p>
                                </div>
                            @endif
                        </div>

                        <div class="text-center">
                            <a href="{{ asset($support->dokumen_pendukung) }}"
                               target="_blank"
                               class="btn btn-sm btn-primary">
                                <i class="fas fa-external-link-alt mr-1"></i>
                                Buka di Tab Baru
                            </a>
                            <a href="{{ asset($support->dokumen_pendukung) }}"
                               download="{{ $docFileName }}"
                               class="btn btn-sm btn-success">
                                <i class="fas fa-download mr-1"></i>
                                Download
                            </a>
                        </div>
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label><strong>Dokumen Pendukung</strong></label>
                    <p class="form-control-plaintext text-muted">
                        <i class="fas fa-exclamation-circle mr-2"></i> Tidak ada dokumen pendukung
                    </p>
                </div>
                @endif

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