@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Survei Kepuasan</h1>
    <div>
        <a href="{{ route('feedback.edit', $feedback->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
            <i class="fas fa-edit fa-sm text-white-50"></i> Edit
        </a>
        <a href="{{ route('feedback.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>
</div>

<!-- Content Row -->
<div class="row justify-content-center">
    <div class="col-lg-8">
        <!-- Detail Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Hasil Survei</h6>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <p><strong>ID Survei:</strong> #{{ $feedback->id }}</p>
                        <p><strong>Tanggal:</strong> {{ $feedback->created_at->format('d F Y H:i') }}</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <span class="badge badge-{{ $feedback->overall_satisfaction >= 4 ? 'success' : ($feedback->overall_satisfaction >= 3 ? 'warning' : 'danger') }} p-2">
                            <h5 class="mb-0">Kepuasan Keseluruhan: {{ $feedback->overall_satisfaction }}/5</h5>
                        </span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Aspek Penilaian</th>
                                <th>Rating</th>
                                <th>Visualisasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><strong>Kebutuhan Informasi</strong></td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $feedback->requirements_rating >= 4 ? 'success' : ($feedback->requirements_rating >= 3 ? 'warning' : 'danger') }}">
                                        {{ $feedback->requirements_rating }}/5
                                    </span>
                                </td>
                                <td>@php echo getRatingStars($feedback->requirements_rating) @endphp</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><strong>Prosedur Pelayanan</strong></td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $feedback->procedure_rating >= 4 ? 'success' : ($feedback->procedure_rating >= 3 ? 'warning' : 'danger') }}">
                                        {{ $feedback->procedure_rating }}/5
                                    </span>
                                </td>
                                <td>@php echo getRatingStars($feedback->procedure_rating) @endphp</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><strong>Ketepatan Waktu</strong></td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $feedback->timeliness_rating >= 4 ? 'success' : ($feedback->timeliness_rating >= 3 ? 'warning' : 'danger') }}">
                                        {{ $feedback->timeliness_rating }}/5
                                    </span>
                                </td>
                                <td>@php echo getRatingStars($feedback->timeliness_rating) @endphp</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><strong>Biaya/Tarif</strong></td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $feedback->cost_rating >= 4 ? 'success' : ($feedback->cost_rating >= 3 ? 'warning' : 'danger') }}">
                                        {{ $feedback->cost_rating }}/5
                                    </span>
                                </td>
                                <td>@php echo getRatingStars($feedback->cost_rating) @endphp</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><strong>Kualitas Produk/Hasil</strong></td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $feedback->product_quality_rating >= 4 ? 'success' : ($feedback->product_quality_rating >= 3 ? 'warning' : 'danger') }}">
                                        {{ $feedback->product_quality_rating }}/5
                                    </span>
                                </td>
                                <td>@php echo getRatingStars($feedback->product_quality_rating) @endphp</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td><strong>Kompetensi Staff</strong></td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $feedback->staff_competence_rating >= 4 ? 'success' : ($feedback->staff_competence_rating >= 3 ? 'warning' : 'danger') }}">
                                        {{ $feedback->staff_competence_rating }}/5
                                    </span>
                                </td>
                                <td>@php echo getRatingStars($feedback->staff_competence_rating) @endphp</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td><strong>Kesopanan Staff</strong></td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $feedback->staff_politeness_rating >= 4 ? 'success' : ($feedback->staff_politeness_rating >= 3 ? 'warning' : 'danger') }}">
                                        {{ $feedback->staff_politeness_rating }}/5
                                    </span>
                                </td>
                                <td>@php echo getRatingStars($feedback->staff_politeness_rating) @endphp</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td><strong>Penanganan Keluhan</strong></td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $feedback->handling_complaint_rating >= 4 ? 'success' : ($feedback->handling_complaint_rating >= 3 ? 'warning' : 'danger') }}">
                                        {{ $feedback->handling_complaint_rating }}/5
                                    </span>
                                </td>
                                <td>@php echo getRatingStars($feedback->handling_complaint_rating) @endphp</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td><strong>Fasilitas</strong></td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $feedback->facility_rating >= 4 ? 'success' : ($feedback->facility_rating >= 3 ? 'warning' : 'danger') }}">
                                        {{ $feedback->facility_rating }}/5
                                    </span>
                                </td>
                                <td>@php echo getRatingStars($feedback->facility_rating) @endphp</td>
                            </tr>
                            <tr class="bg-light font-weight-bold">
                                <td>10</td>
                                <td><strong>Kepuasan Keseluruhan</strong></td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $feedback->overall_satisfaction >= 4 ? 'success' : ($feedback->overall_satisfaction >= 3 ? 'warning' : 'danger') }}">
                                        {{ $feedback->overall_satisfaction }}/5
                                    </span>
                                </td>
                                <td>@php echo getRatingStars($feedback->overall_satisfaction) @endphp</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                @if($feedback->message)
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card bg-light">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0"><i class="fas fa-comment-dots"></i> Pesan/Komentar Tambahan</h5>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">{{ nl2br(e($feedback->message)) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card bg-success text-white">
                            <div class="card-body text-center">
                                <h5 class="card-title">Rata-rata Rating</h5>
                                <h2 class="mb-0">
                                    {{ number_format(($feedback->requirements_rating + $feedback->procedure_rating + $feedback->timeliness_rating + $feedback->cost_rating + $feedback->product_quality_rating + $feedback->staff_competence_rating + $feedback->staff_politeness_rating + $feedback->handling_complaint_rating + $feedback->facility_rating + $feedback->overall_satisfaction) / 10, 1) }}/5
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-info text-white">
                            <div class="card-body text-center">
                                <h5 class="card-title">Status Kepuasan</h5>
                                <h2 class="mb-0">
                                    @if($feedback->overall_satisfaction >= 4)
                                        Sangat Puas
                                    @elseif($feedback->overall_satisfaction >= 3)
                                        Cukup Puas
                                    @else
                                        Kurang Puas
                                    @endif
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="card shadow mb-4">
            <div class="card-body text-center">
                <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit Data
                </a>
                <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        <i class="fas fa-trash"></i> Hapus Data
                    </button>
                </form>
                <a href="{{ route('feedback.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
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