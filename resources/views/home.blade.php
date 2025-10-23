@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard PTSP MTsN 2 Trenggalek</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- Statistics Cards -->
    <div class="row">

        <!-- Total Buku Tamu Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Buku Tamu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['total_buku_tamu'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Survei Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Survei</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['total_survei'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rata-rata Rating Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rating Kepuasan</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $widget['avg_rating'] }}/5.0</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ ($widget['avg_rating'] / 5) * 100 }}%" aria-valuenow="{{ ($widget['avg_rating'] / 5) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Admin Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['total_users'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-shield fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Buku Tamu Status Distribution -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Distribusi Status Buku Tamu</h6>
                </div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Menunggu</div>
                            <div class="h5 mb-0 font-weight-bold text-warning">{{ $widget['buku_tamu_menunggu'] }}</div>
                        </div>
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Proses</div>
                            <div class="h5 mb-0 font-weight-bold text-info">{{ $widget['buku_tamu_proses'] }}</div>
                        </div>
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Selesai</div>
                            <div class="h5 mb-0 font-weight-bold text-success">{{ $widget['buku_tamu_selesai'] }}</div>
                        </div>
                    </div>

                    <div class="text-center mb-3">
                        <h5 class="font-weight-bold text-gray-800">Progress Layanan</h5>
                    </div>

                    @if($widget['total_buku_tamu'] > 0)
                        <h4 class="small font-weight-bold">Menunggu <span class="float-right">{{ round(($widget['buku_tamu_menunggu'] / $widget['total_buku_tamu']) * 100) }}%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ round(($widget['buku_tamu_menunggu'] / $widget['total_buku_tamu']) * 100) }}%" aria-valuenow="{{ round(($widget['buku_tamu_menunggu'] / $widget['total_buku_tamu']) * 100) }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <h4 class="small font-weight-bold">Proses <span class="float-right">{{ round(($widget['buku_tamu_proses'] / $widget['total_buku_tamu']) * 100) }}%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-info" role="progressbar" style="width: {{ round(($widget['buku_tamu_proses'] / $widget['total_buku_tamu']) * 100) }}%" aria-valuenow="{{ round(($widget['buku_tamu_proses'] / $widget['total_buku_tamu']) * 100) }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <h4 class="small font-weight-bold">Selesai <span class="float-right">{{ round(($widget['buku_tamu_selesai'] / $widget['total_buku_tamu']) * 100) }}%</span></h4>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ round(($widget['buku_tamu_selesai'] / $widget['total_buku_tamu']) * 100) }}%" aria-valuenow="{{ round(($widget['buku_tamu_selesai'] / $widget['total_buku_tamu']) * 100) }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    @else
                        <div class="text-center text-muted">
                            <p>Belum ada data buku tamu</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aksi Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <a href="{{ route('supports.index') }}" class="btn btn-primary btn-user btn-block">
                                <i class="fas fa-users mr-2"></i>
                                Kelola Buku Tamu
                            </a>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <a href="{{ route('feedback.index') }}" class="btn btn-success btn-user btn-block">
                                <i class="fas fa-star mr-2"></i>
                                Lihat Survei
                            </a>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <a href="{{ route('supports.create') }}" class="btn btn-info btn-user btn-block">
                                <i class="fas fa-plus mr-2"></i>
                                Tambah Buku Tamu
                            </a>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <a href="{{ route('feedback.create') }}" class="btn btn-warning btn-user btn-block">
                                <i class="fas fa-poll mr-2"></i>
                                Buat Survei
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PTSP Info -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi PTSP</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 text-center mb-3">
                            <h5 class="font-weight-bold text-primary">{{ $widget['total_buku_tamu'] }}</h5>
                            <small class="text-muted">Total Tamu</small>
                        </div>
                        <div class="col-sm-6 text-center mb-3">
                            <h5 class="font-weight-bold text-success">{{ $widget['total_survei'] }}</h5>
                            <small class="text-muted">Total Survei</small>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <small class="text-muted">
                            <i class="fas fa-clock mr-1"></i>
                            Terakhir diperbarui: {{ now()->format('d M Y H:i') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Aktivitas Terkini</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                            <a class="dropdown-item" href="{{ route('supports.index') }}">Lihat Semua Buku Tamu</a>
                            <a class="dropdown-item" href="{{ route('feedback.index') }}">Lihat Semua Survei</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="font-weight-bold text-gray-800 mb-3">
                                <i class="fas fa-users text-primary mr-2"></i>
                                Buku Tamu Terbaru
                            </h6>
                            @php
                                $recentSupports = \App\Models\Support::latest()->take(3)->get();
                            @endphp
                            @if($recentSupports->count() > 0)
                                @foreach($recentSupports as $support)
                                    <div class="border-bottom pb-2 mb-2">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <small class="font-weight-bold text-gray-800">{{ $support->name }}</small>
                                                <br>
                                                <small class="text-muted">{{ $support->instansi }} - {{ $support->keperluan }}</small>
                                            </div>
                                            <div>
                                                <span class="badge badge-{{ $support->status == 'menunggu' ? 'warning' : ($support->status == 'proses' ? 'info' : 'success') }}">
                                                    {{ ucfirst($support->status) }}
                                                </span>
                                                <br>
                                                <small class="text-muted">{{ $support->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted">Belum ada data buku tamu</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h6 class="font-weight-bold text-gray-800 mb-3">
                                <i class="fas fa-star text-success mr-2"></i>
                                Survei Terbaru
                            </h6>
                            @php
                                $recentFeedbacks = \App\Models\Feedback::latest()->take(3)->get();
                            @endphp
                            @if($recentFeedbacks->count() > 0)
                                @foreach($recentFeedbacks as $feedback)
                                    <div class="border-bottom pb-2 mb-2">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <small class="font-weight-bold text-gray-800">Rating: {{ $feedback->overall_satisfaction }}/5</small>
                                                <br>
                                                @if($feedback->message)
                                                    <small class="text-muted">{{ Str::limit($feedback->message, 50) }}</small>
                                                @endif
                                            </div>
                                            <small class="text-muted">{{ $feedback->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted">Belum ada data survei</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
<style>
    .badge-warning { background-color: #f6c23e; }
    .badge-info { background-color: #36b9cc; }
    .badge-success { background-color: #1cc88a; }
</style>
@endpush