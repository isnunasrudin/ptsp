@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manajemen Survei Kepuasan</h1>
    <a href="{{ route('feedback.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Survei
    </a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Total Feedback Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Survei
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['total_feedbacks'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Average Satisfaction Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Rata-rata Kepuasan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format($widget['average_satisfaction'], 1) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-star fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Survei Kepuasan</h6>
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
                        <th>Kebutuhan</th>
                        <th>Prosedur</th>
                        <th>Ketepatan Waktu</th>
                        <th>Biaya</th>
                        <th>Kualitas Produk</th>
                        <th>Kompetensi Staff</th>
                        <th>Kesopanan Staff</th>
                        <th>Penanganan Keluhan</th>
                        <th>Fasilitas</th>
                        <th>Kepuasan Keseluruhan</th>
                        <th>Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kebutuhan</th>
                        <th>Prosedur</th>
                        <th>Ketepatan Waktu</th>
                        <th>Biaya</th>
                        <th>Kualitas Produk</th>
                        <th>Kompetensi Staff</th>
                        <th>Kesopanan Staff</th>
                        <th>Penanganan Keluhan</th>
                        <th>Fasilitas</th>
                        <th>Kepuasan Keseluruhan</th>
                        <th>Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($feedbacks as $feedback)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>@php echo getRatingStars($feedback->requirements_rating) @endphp</td>
                            <td>@php echo getRatingStars($feedback->procedure_rating) @endphp</td>
                            <td>@php echo getRatingStars($feedback->timeliness_rating) @endphp</td>
                            <td>@php echo getRatingStars($feedback->cost_rating) @endphp</td>
                            <td>@php echo getRatingStars($feedback->product_quality_rating) @endphp</td>
                            <td>@php echo getRatingStars($feedback->staff_competence_rating) @endphp</td>
                            <td>@php echo getRatingStars($feedback->staff_politeness_rating) @endphp</td>
                            <td>@php echo getRatingStars($feedback->handling_complaint_rating) @endphp</td>
                            <td>@php echo getRatingStars($feedback->facility_rating) @endphp</td>
                            <td>
                                <span class="badge badge-{{ $feedback->overall_satisfaction >= 4 ? 'success' : ($feedback->overall_satisfaction >= 3 ? 'warning' : 'danger') }}">
                                    @php echo getRatingStars($feedback->overall_satisfaction) @endphp
                                </span>
                            </td>
                            <td>
                                @if($feedback->message)
                                    <span class="text-muted" title="{{ e($feedback->message) }}">
                                        <i class="fas fa-comment"></i>
                                        {{ Str::limit($feedback->message, 30) }}
                                    </span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('feedback.show', $feedback->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center">Tidak ada data survei kepuasan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $feedbacks->links() }}
    </div>
</div>

@php
    function getRatingStars($rating) {
        $stars = '';
        for($i = 1; $i <= 5; $i++) {
            if($i <= $rating) {
                $stars .= '<i class="fas fa-star text-warning"></i>';
            } else {
                $stars .= '<i class="far fa-star text-muted"></i>';
            }
        }
        return $stars . ' ' . $rating;
    }
@endphp
@endsection