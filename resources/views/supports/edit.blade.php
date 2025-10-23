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
                <form action="{{ route('supports.update', $support->id) }}" method="POST">
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