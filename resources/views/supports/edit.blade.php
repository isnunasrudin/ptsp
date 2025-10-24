@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Buku Tamu</h1>
    <a href="{{ route('supports.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
    </a>
</div>

<!-- Content Row -->
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Form Buku Tamu</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('supports.update', $support->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Lengkap *</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{ old('name', $support->name) }}" required
                                       placeholder="Masukkan nama lengkap">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Nomor Telepon *</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                       value="{{ old('phone', $support->phone) }}" required
                                       placeholder="Masukkan nomor telepon">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="instansi">Instansi/Perusahaan *</label>
                        <input type="text" name="instansi" id="instansi" class="form-control"
                               value="{{ old('instansi', $support->instansi) }}" required
                               placeholder="Masukkan nama instansi atau perusahaan">
                    </div>

                    <div class="form-group">
                        <label for="keperluan">Keperluan *</label>
                        <input type="text" name="keperluan" id="keperluan" class="form-control"
                               value="{{ old('keperluan', $support->keperluan) }}" required
                               placeholder="Jelaskan keperluan kunjungan">
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan Tambahan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" rows="3"
                                  placeholder="Masukkan keterangan tambahan (opsional)">{{ old('keterangan', $support->keterangan) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="kartu_identitas">Kartu Identitas</label>
                        <div class="border rounded p-3 bg-light">
                            @if($support->kartu_identitas)
                                @php
                                    $fileExtension = strtolower(pathinfo($support->kartu_identitas, PATHINFO_EXTENSION));
                                    $fileName = basename($support->kartu_identitas);
                                @endphp
                                <div class="mb-3">
                                    <p class="mb-2"><strong>File Saat Ini:</strong></p>
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3">
                                            @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                <i class="fas fa-image fa-lg text-primary"></i>
                                            @else
                                                <i class="fas fa-file-pdf fa-lg text-danger"></i>
                                            @endif
                                        </div>
                                        <div class="flex-grow-1">
                                            <small class="text-muted">{{ $fileName }}</small>
                                            <br>
                                            <a href="{{ asset($support->kartu_identitas) }}" target="_blank" class="btn btn-xs btn-outline-primary">
                                                <i class="fas fa-eye"></i> Lihat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="custom-file">
                                <input type="file" name="kartu_identitas" id="kartu_identitas" class="custom-file-input"
                                       accept="image/*,.pdf">
                                <label class="custom-file-label" for="kartu_identitas">
                                    @if($support->kartu_identitas)
                                        Ganti Kartu Identitas (Opsional)
                                    @else
                                        Pilih File Kartu Identitas
                                    @endif
                                </label>
                            </div>
                            <small class="text-muted">
                                <i class="fas fa-info-circle mr-1"></i>
                                Kosongkan jika tidak ingin mengubah file. Format: JPG, PNG, GIF, PDF (Max: 5MB)
                            </small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Status *</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="menunggu" {{ old('status', $support->status) == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="diproses" {{ old('status', $support->status) == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ old('status', $support->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Data
                        </button>
                        <a href="{{ route('supports.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection