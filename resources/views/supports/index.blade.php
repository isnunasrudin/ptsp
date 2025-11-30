@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manajemen Buku Tamu</h1>
    <a href="{{ route('supports.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Buku Tamu
    </a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Total Tamu Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Tamu
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $supports->total() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menunggu Proses Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Menunggu Proses
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $supports->where('status', 'menunggu')->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sedang Diproses Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Sedang Diproses
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $supports->where('status', 'diproses')->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-spinner fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Selesai Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Selesai
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $supports->where('status', 'selesai')->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Buku Tamu</h6>
        <form action="{{ route('supports.export') }}" method="POST" class="form-inline">
            @csrf
            <div class="form-group mx-sm-3 mb-2">
                <label for="from" class="mr-2">Dari Tanggal : </label>
                <input type="date" class="form-control" id="from" name="from" required value="{{ old('from', now()->subDays(7)->format('Y-m-d')) }}">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="to" class="mr-2">Sampai Tanggal : </label>
                <input type="date" class="form-control" id="to" name="to" required value="{{ old('to', now()->format('Y-m-d')) }}">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Export</button>
        </form>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Keperluan</th>
                        <th>Lampiran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Keperluan</th>
                        <th>Lampiran</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($supports as $support)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ e($support->name) }}</td>
                            <td>{{ e($support->instansi) }}</td>
                            <td>
                                @if($support->tanggal_kunjungan)
                                    <span class="badge badge-info">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        {{ \Carbon\Carbon::parse($support->tanggal_kunjungan)->locale('id')->translatedFormat('d F Y') }}
                                    </span>
                                    <br>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($support->tanggal_kunjungan)->diffForHumans() }}
                                    </small>
                                @else
                                    <span class="text-muted">
                                        <i class="fas fa-times-circle"></i>
                                        <small> Tidak ada</small>
                                    </span>
                                @endif
                            </td>
                            <td>
                                <span title="{{ e($support->keperluan) }}">
                                    {{ Str::limit($support->keperluan, 40) }}
                                </span>
                                <br>
                                <small class="text-muted">
                                    <span class="badge badge-{{ $support->status == 'selesai' ? 'success' : ($support->status == 'diproses' ? 'info' : 'warning') }}">
                                        {{ ucfirst($support->status) }}
                                    </span>
                                </small>
                            </td>
                            <td>
                                <!-- Foto -->
                                @if($support->kartu_identitas)
                                    @php
                                        $fileExtension = strtolower(pathinfo($support->kartu_identitas, PATHINFO_EXTENSION));
                                    @endphp
                                    <div class="mb-1">
                                        <a href="{{ asset($support->kartu_identitas) }}" target="_blank" class="btn btn-xs btn-outline-primary" title="Lihat Foto">
                                            <i class="fas fa-image"></i> Foto
                                        </a>
                                        <small class="d-block text-muted">
                                            {{ strtoupper($fileExtension) }}
                                        </small>
                                    </div>
                                @endif

                                <!-- Dokumen Pendukung -->
                                @if($support->dokumen_pendukung)
                                    @php
                                        $docExtension = strtolower(pathinfo($support->dokumen_pendukung, PATHINFO_EXTENSION));
                                    @endphp
                                    <div class="mb-1">
                                        @if(in_array($docExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                            <a href="{{ asset($support->dokumen_pendukung) }}" target="_blank" class="btn btn-xs btn-outline-success" title="Lihat Dokumen">
                                                <i class="fas fa-file-image"></i> Dokumen
                                            </a>
                                        @elseif($docExtension === 'pdf')
                                            <a href="{{ asset($support->dokumen_pendukung) }}" target="_blank" class="btn btn-xs btn-outline-danger" title="Lihat Dokumen">
                                                <i class="fas fa-file-pdf"></i> Dokumen
                                            </a>
                                        @elseif(in_array($docExtension, ['doc', 'docx']))
                                            <a href="{{ asset($support->dokumen_pendukung) }}" target="_blank" class="btn btn-xs btn-outline-primary" title="Lihat Dokumen">
                                                <i class="fas fa-file-word"></i> Dokumen
                                            </a>
                                        @else
                                            <a href="{{ asset($support->dokumen_pendukung) }}" target="_blank" class="btn btn-xs btn-outline-secondary" title="Lihat Dokumen">
                                                <i class="fas fa-file"></i> Dokumen
                                            </a>
                                        @endif
                                        <small class="d-block text-muted">
                                            {{ strtoupper($docExtension) }}
                                        </small>
                                    </div>
                                @endif

                                <!-- Jika tidak ada lampiran -->
                                @if(!$support->kartu_identitas && !$support->dokumen_pendukung)
                                    <span class="text-muted">
                                        <i class="fas fa-times-circle"></i>
                                        <small> Tidak ada</small>
                                    </span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('supports.destroy', $support->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('supports.show', $support->id) }}" class="btn btn-info btn-sm" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('supports.edit', $support->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data buku tamu</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $supports->links() }}
    </div>
</div>
@endsection