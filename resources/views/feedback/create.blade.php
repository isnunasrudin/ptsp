@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Survei Kepuasan</h1>
    <a href="{{ route('feedback.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
    </a>
</div>

<!-- Content Row -->
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Survei Kepuasan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('feedback.store') }}" method="POST">
                    @csrf

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
                                <label for="requirements_rating">1. Kebutuhan Informasi</label>
                                <small class="form-text text-muted">Seberapa jelas informasi yang dibutuhkan?</small>
                                <select name="requirements_rating" class="form-control" required>
                                    <option value="">-- Pilih Rating --</option>
                                    <option value="5" {{ old('requirements_rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ Sangat Baik</option>
                                    <option value="4" {{ old('requirements_rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ Baik</option>
                                    <option value="3" {{ old('requirements_rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ Cukup</option>
                                    <option value="2" {{ old('requirements_rating') == '2' ? 'selected' : '' }}>⭐⭐ Kurang</option>
                                    <option value="1" {{ old('requirements_rating') == '1' ? 'selected' : '' }}>⭐ Sangat Kurang</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="procedure_rating">2. Prosedur Pelayanan</label>
                                <small class="form-text text-muted">Seberapa mudah prosedur pelayanannya?</small>
                                <select name="procedure_rating" class="form-control" required>
                                    <option value="">-- Pilih Rating --</option>
                                    <option value="5" {{ old('procedure_rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ Sangat Baik</option>
                                    <option value="4" {{ old('procedure_rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ Baik</option>
                                    <option value="3" {{ old('procedure_rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ Cukup</option>
                                    <option value="2" {{ old('procedure_rating') == '2' ? 'selected' : '' }}>⭐⭐ Kurang</option>
                                    <option value="1" {{ old('procedure_rating') == '1' ? 'selected' : '' }}>⭐ Sangat Kurang</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="timeliness_rating">3. Ketepatan Waktu</label>
                                <small class="form-text text-muted">Seberapa tepat waktu pelayanannya?</small>
                                <select name="timeliness_rating" class="form-control" required>
                                    <option value="">-- Pilih Rating --</option>
                                    <option value="5" {{ old('timeliness_rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ Sangat Baik</option>
                                    <option value="4" {{ old('timeliness_rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ Baik</option>
                                    <option value="3" {{ old('timeliness_rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ Cukup</option>
                                    <option value="2" {{ old('timeliness_rating') == '2' ? 'selected' : '' }}>⭐⭐ Kurang</option>
                                    <option value="1" {{ old('timeliness_rating') == '1' ? 'selected' : '' }}>⭐ Sangat Kurang</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cost_rating">4. Biaya/Tarif</label>
                                <small class="form-text text-muted">Seberapa sesuai biaya dengan pelayanan?</small>
                                <select name="cost_rating" class="form-control" required>
                                    <option value="">-- Pilih Rating --</option>
                                    <option value="5" {{ old('cost_rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ Sangat Baik</option>
                                    <option value="4" {{ old('cost_rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ Baik</option>
                                    <option value="3" {{ old('cost_rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ Cukup</option>
                                    <option value="2" {{ old('cost_rating') == '2' ? 'selected' : '' }}>⭐⭐ Kurang</option>
                                    <option value="1" {{ old('cost_rating') == '1' ? 'selected' : '' }}>⭐ Sangat Kurang</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_quality_rating">5. Kualitas Produk/Hasil</label>
                                <small class="form-text text-muted">Seberapa berkualitas hasil pelayanan?</small>
                                <select name="product_quality_rating" class="form-control" required>
                                    <option value="">-- Pilih Rating --</option>
                                    <option value="5" {{ old('product_quality_rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ Sangat Baik</option>
                                    <option value="4" {{ old('product_quality_rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ Baik</option>
                                    <option value="3" {{ old('product_quality_rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ Cukup</option>
                                    <option value="2" {{ old('product_quality_rating') == '2' ? 'selected' : '' }}>⭐⭐ Kurang</option>
                                    <option value="1" {{ old('product_quality_rating') == '1' ? 'selected' : '' }}>⭐ Sangat Kurang</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="staff_competence_rating">6. Kompetensi Staff</label>
                                <small class="form-text text-muted">Seberapa kompeten staff yang melayani?</small>
                                <select name="staff_competence_rating" class="form-control" required>
                                    <option value="">-- Pilih Rating --</option>
                                    <option value="5" {{ old('staff_competence_rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ Sangat Baik</option>
                                    <option value="4" {{ old('staff_competence_rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ Baik</option>
                                    <option value="3" {{ old('staff_competence_rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ Cukup</option>
                                    <option value="2" {{ old('staff_competence_rating') == '2' ? 'selected' : '' }}>⭐⭐ Kurang</option>
                                    <option value="1" {{ old('staff_competence_rating') == '1' ? 'selected' : '' }}>⭐ Sangat Kurang</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="staff_politeness_rating">7. Kesopanan Staff</label>
                                <small class="form-text text-muted">Seberapa sopan staff dalam melayani?</small>
                                <select name="staff_politeness_rating" class="form-control" required>
                                    <option value="">-- Pilih Rating --</option>
                                    <option value="5" {{ old('staff_politeness_rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ Sangat Baik</option>
                                    <option value="4" {{ old('staff_politeness_rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ Baik</option>
                                    <option value="3" {{ old('staff_politeness_rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ Cukup</option>
                                    <option value="2" {{ old('staff_politeness_rating') == '2' ? 'selected' : '' }}>⭐⭐ Kurang</option>
                                    <option value="1" {{ old('staff_politeness_rating') == '1' ? 'selected' : '' }}>⭐ Sangat Kurang</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="handling_complaint_rating">8. Penanganan Keluhan</label>
                                <small class="form-text text-muted">Seberapa baik penanganan keluhan?</small>
                                <select name="handling_complaint_rating" class="form-control" required>
                                    <option value="">-- Pilih Rating --</option>
                                    <option value="5" {{ old('handling_complaint_rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ Sangat Baik</option>
                                    <option value="4" {{ old('handling_complaint_rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ Baik</option>
                                    <option value="3" {{ old('handling_complaint_rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ Cukup</option>
                                    <option value="2" {{ old('handling_complaint_rating') == '2' ? 'selected' : '' }}>⭐⭐ Kurang</option>
                                    <option value="1" {{ old('handling_complaint_rating') == '1' ? 'selected' : '' }}>⭐ Sangat Kurang</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facility_rating">9. Fasilitas</label>
                                <small class="form-text text-muted">Seberapa baik fasilitas yang disediakan?</small>
                                <select name="facility_rating" class="form-control" required>
                                    <option value="">-- Pilih Rating --</option>
                                    <option value="5" {{ old('facility_rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ Sangat Baik</option>
                                    <option value="4" {{ old('facility_rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ Baik</option>
                                    <option value="3" {{ old('facility_rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ Cukup</option>
                                    <option value="2" {{ old('facility_rating') == '2' ? 'selected' : '' }}>⭐⭐ Kurang</option>
                                    <option value="1" {{ old('facility_rating') == '1' ? 'selected' : '' }}>⭐ Sangat Kurang</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="overall_satisfaction">10. Kepuasan Keseluruhan</label>
                                <small class="form-text text-muted">Seberapa puas Anda dengan pelayanan secara keseluruhan?</small>
                                <select name="overall_satisfaction" class="form-control" required>
                                    <option value="">-- Pilih Rating --</option>
                                    <option value="5" {{ old('overall_satisfaction') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ Sangat Puas</option>
                                    <option value="4" {{ old('overall_satisfaction') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ Puas</option>
                                    <option value="3" {{ old('overall_satisfaction') == '3' ? 'selected' : '' }}>⭐⭐⭐ Cukup Puas</option>
                                    <option value="2" {{ old('overall_satisfaction') == '2' ? 'selected' : '' }}>⭐⭐ Kurang Puas</option>
                                    <option value="1" {{ old('overall_satisfaction') == '1' ? 'selected' : '' }}>⭐ Tidak Puas</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message">Pesan/Komentar Tambahan</label>
                        <small class="form-text text-muted">Tuliskan pesan atau komentar tambahan Anda (opsional)</small>
                        <textarea name="message" id="message" class="form-control" rows="4" placeholder="Tuliskan pesan atau komentar Anda di sini...">{{ old('message') }}</textarea>
                        <small class="form-text text-muted">Maksimal 1000 karakter</small>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Survei
                        </button>
                        <a href="{{ route('feedback.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection