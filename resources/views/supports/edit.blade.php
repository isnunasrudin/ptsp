@extends('layouts.admin')

@push('styles')
<style>
/* Card Enhancement Styles */
.card {
    border: none;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
    border-radius: 0.35rem;
}

.card-header {
    background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    color: white;
    border-bottom: none;
}

.card-body {
    padding: 2rem;
}

.form-control:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
}

.btn-primary {
    background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    border: none;
    padding: 12px 30px;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #2e59d9 0%, #1a3d8e 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

/* Radio Button Card Styles */
.card.radio-card {
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid #e3e6f0 !important;
}

.card.radio-card:hover {
    border-color: #4e73df !important;
    background-color: rgba(78, 115, 223, 0.05);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(78, 115, 223, 0.15);
}

.card.radio-card input[type="radio"]:checked + .card-body {
    background-color: rgba(78, 115, 223, 0.1);
    border-radius: calc(0.25rem - 1px);
}

.card.radio-card input[type="radio"]:checked + .card-body .radio-content i {
    color: #4e73df !important;
}

.card.radio-card input[type="radio"]:checked + .card-body .radio-content h6 {
    color: #4e73df !important;
}

.card.radio-card:has(input[type="radio"]:checked) {
    border-color: #4e73df !important;
    background-color: rgba(78, 115, 223, 0.1);
}

.card.radio-card:has(input[type="radio"]:checked) .radio-content i {
    color: #4e73df !important;
}

.card.radio-card:has(input[type="radio"]:checked) .radio-content h6 {
    color: #4e73df !important;
}

/* Fallback for browsers without :has support */
.card.radio-card.selected {
    border-color: #4e73df !important;
    background-color: rgba(78, 115, 223, 0.1);
}

.card.radio-card.selected .radio-content i {
    color: #4e73df !important;
}

.card.radio-card.selected .radio-content h6 {
    color: #4e73df !important;
}

/* Custom File Input Styles */
.custom-file-label::after {
    content: "Browse";
    background-color: #4e73df;
    color: white;
    border-color: #4e73df;
}

.custom-file-label {
    border: 2px dashed #dee2e6;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.custom-file-label:hover {
    border-color: #4e73df;
    background-color: rgba(78, 115, 223, 0.05);
}

.custom-file-input:focus ~ .custom-file-label {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
}

/* Camera Modal Styles */
#cameraModal {
    z-index: 1050 !important;
}

#cameraModal .modal-dialog {
    margin: 0 auto;
    display: flex;
    align-items: center;
    min-height: 100vh;
    padding: 20px 0;
}

#cameraModal .modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    max-width: 90vw;
    width: 800px;
}

#cameraModal .modal-header {
    background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    border-bottom: none;
    padding: 1.5rem;
}

#cameraModal .modal-title {
    color: white;
    font-weight: 600;
}

#cameraModal .modal-header .close {
    color: white;
    opacity: 0.8;
}

#cameraModal .modal-header .close:hover {
    opacity: 1;
}

#cameraModal .modal-body {
    padding: 2rem;
    background: #f8f9fc;
}

#cameraModal video {
    background: #000;
    border-radius: 10px;
    max-width: 100%;
    height: auto;
}

#cameraModal #capturedImage img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
}

#cameraModal .btn {
    padding: 12px 24px;
    font-weight: 600;
    border-radius: 8px;
    border: none;
    transition: all 0.3s ease;
}

#cameraModal .btn-success {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
}

#cameraModal .btn-success:hover {
    background: linear-gradient(135deg, #218838 0%, #1ea085 100%);
    transform: translateY(-2px);
}

#cameraModal .btn-secondary {
    background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
}

#cameraModal .btn-secondary:hover {
    background: linear-gradient(135deg, #5a6268 0%, #495057 100%);
    transform: translateY(-2px);
}

#cameraModal .btn-warning {
    background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
}

#cameraModal .btn-warning:hover {
    background: linear-gradient(135deg, #ffb300 0%, #f0b500 100%);
    transform: translateY(-2px);
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    #cameraModal .modal-dialog {
        padding: 10px 0;
    }

    #cameraModal .modal-content {
        width: 95vw;
        margin: 0 auto;
    }

    #cameraModal video {
        max-height: 250px;
    }

    #cameraModal #capturedImage img {
        max-height: 250px;
    }

    .d-flex.gap-3 {
        gap: 1rem !important;
    }
}
</style>
@endpush

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
                <form action="{{ route('supports.update', $support->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            <strong>Perhatian!</strong> Mohon perbaiki kesalahan berikut:
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="name" class="font-weight-bold text-gray-700">
                                    <i class="fas fa-user mr-1"></i> Nama Lengkap *
                                </label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{ old('name', $support->name) }}" required
                                       placeholder="Masukkan nama lengkap Anda" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="phone" class="font-weight-bold text-gray-700">
                                    <i class="fas fa-phone mr-1"></i> Nomor Telepon *
                                </label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                       value="{{ old('phone', $support->phone) }}" required
                                       placeholder="Masukkan nomor telepon Anda" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="instansi" class="font-weight-bold text-gray-700">
                            <i class="fas fa-building mr-1"></i> Instansi / Alamat Rumah *
                        </label>
                        <input type="text" name="instansi" id="instansi" class="form-control"
                               value="{{ old('instansi', $support->instansi) }}" required
                               placeholder="Masukkan nama instansi atau alamat rumah" autocomplete="off">
                    </div>

                    <div class="form-group mb-4">
                        <label for="keperluan" class="font-weight-bold text-gray-700">
                            <i class="fas fa-briefcase mr-1"></i> Keperluan *
                        </label>

                        <!-- Select keperluan -->
                        <select name="keperluan" id="keperluan" class="form-control" required autocomplete="off">
                            <option value="">-- Pilih Tujuan Kunjungan --</option>
                            <option value="Menemui Kepala Madrasah" {{ old('keperluan', $support->keperluan) == 'Menemui Kepala Madrasah' ? 'selected' : '' }}>
                                Menemui Kepala Madrasah
                            </option>
                            <option value="Menemui Kepala Tata Usaha" {{ old('keperluan', $support->keperluan) == 'Menemui Kepala Tata Usaha' ? 'selected' : '' }}>
                                Menemui Kepala Tata Usaha
                            </option>
                            <option value="Menemui Wakil Kepala Sekolah Bidang Kurikulum" {{ old('keperluan', $support->keperluan) == 'Menemui Wakil Kepala Sekolah Bidang Kurikulum' ? 'selected' : '' }}>
                                Menemui Wakil Kepala Sekolah Bidang Kurikulum
                            </option>
                            <option value="Menemui Wakil Kepala Sekolah Bidang Humas dan Kerja Sama" {{ old('keperluan', $support->keperluan) == 'Menemui Wakil Kepala Sekolah Bidang Humas dan Kerja Sama' ? 'selected' : '' }}>
                                Menemui Wakil Kepala Sekolah Bidang Humas dan Kerja Sama
                            </option>
                            <option value="Menemui Wakil Kepala Sekolah Bidang Sarana dan Prasarana" {{ old('keperluan', $support->keperluan) == 'Menemui Wakil Kepala Sekolah Bidang Sarana dan Prasarana' ? 'selected' : '' }}>
                                Menemui Wakil Kepala Sekolah Bidang Sarana dan Prasarana
                            </option>
                            <option value="Menemui Wakil Kepala Sekolah Bidang Kesiswaan" {{ old('keperluan', $support->keperluan) == 'Menemui Wakil Kepala Sekolah Bidang Kesiswaan' ? 'selected' : '' }}>
                                Menemui Wakil Kepala Sekolah Bidang Kesiswaan
                            </option>
                            <option value="Menemui Guru Bimbingan dan Konseling" {{ old('keperluan', $support->keperluan) == 'Menemui Guru Bimbingan dan Konseling' ? 'selected' : '' }}>
                                Menemui Guru Bimbingan dan Konseling
                            </option>
                            <option value="Menemui Wali Kelas" {{ old('keperluan', $support->keperluan) == 'Menemui Wali Kelas' ? 'selected' : '' }}>
                                Menemui Wali Kelas
                            </option>
                            <option value="Lainnya" {{ old('keperluan', $support->keperluan) == 'Lainnya' || !in_array(old('keperluan', $support->keperluan), ['Menemui Kepala Madrasah', 'Menemui Kepala Tata Usaha', 'Menemui Wakil Kepala Sekolah Bidang Kurikulum', 'Menemui Wakil Kepala Sekolah Bidang Humas dan Kerja Sama', 'Menemui Wakil Kepala Sekolah Bidang Sarana dan Prasarana', 'Menemui Wakil Kepala Sekolah Bidang Kesiswaan', 'Menemui Guru Bimbingan dan Konseling', 'Menemui Wali Kelas']) ? 'selected' : '' }}>
                                --- Lainnya (tulis manual) ---
                            </option>
                        </select>

                        <!-- Manual input for "Lainnya" (hidden by default) -->
                        <div id="keperluan_manual_container" style="display: {{ (old('keperluan', $support->keperluan) == 'Lainnya' || !in_array(old('keperluan', $support->keperluan), ['Menemui Kepala Madrasah', 'Menemui Kepala Tata Usaha', 'Menemui Wakil Kepala Sekolah Bidang Kurikulum', 'Menemui Wakil Kepala Sekolah Bidang Humas dan Kerja Sama', 'Menemui Wakil Kepala Sekolah Bidang Sarana dan Prasarana', 'Menemui Wakil Kepala Sekolah Bidang Kesiswaan', 'Menemui Guru Bimbingan dan Konseling', 'Menemui Wali Kelas'])) ? 'block' : 'none' }}; margin-top: 1rem;">
                            <input type="text" name="keperluan_manual" id="keperluan_manual" class="form-control"
                                   placeholder="Tulis keperluan kunjungan Anda secara manual"
                                   value="{{ old('keperluan_manual', (old('keperluan', $support->keperluan) == 'Lainnya' || !in_array(old('keperluan', $support->keperluan), ['Menemui Kepala Madrasah', 'Menemui Kepala Tata Usaha', 'Menemui Wakil Kepala Sekolah Bidang Kurikulum', 'Menemui Wakil Kepala Sekolah Bidang Humas dan Kerja Sama', 'Menemui Wakil Kepala Sekolah Bidang Sarana dan Prasarana', 'Menemui Wakil Kepala Sekolah Bidang Kesiswaan', 'Menemui Guru Bimbingan dan Konseling', 'Menemui Wali Kelas'])) ? $support->keperluan : '') }}" autocomplete="off">
                            <small class="text-muted">
                                <i class="fas fa-info-circle mr-1"></i>
                                Jelaskan keperluan kunjungan Anda dengan jelas
                            </small>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="keterangan" class="font-weight-bold text-gray-700">
                            <i class="fas fa-comment-alt mr-1"></i> Keterangan Tambahan
                        </label>
                        <textarea name="keterangan" id="keterangan" class="form-control" rows="3"
                                  placeholder="Masukkan keterangan tambahan (opsional)" autocomplete="off">{{ old('keterangan', $support->keterangan) }}</textarea>
                        <small class="text-muted">Keterangan bersifat opsional</small>
                    </div>

                    <!-- Dokumen Pendukung Section -->
                    <div class="form-group mb-4">
                        <label class="font-weight-bold text-gray-700">
                            <i class="fas fa-file-alt mr-1"></i> Dokumen Pendukung
                        </label>
                        <div class="d-flex gap-3">
                            <div class="flex-fill">
                                <div class="card radio-card">
                                    <label class="card-body p-3 text-center mb-0 cursor-pointer">
                                        <input type="radio" name="has_dokumen" value="tidak" {{ !$support->dokumen_pendukung ? 'checked' : '' }} class="d-none">
                                        <div class="radio-content">
                                            <i class="fas fa-times-circle fa-2x text-muted mb-2"></i>
                                            <h6 class="mb-1 font-weight-bold">Tidak Ada</h6>
                                            <p class="text-muted small mb-0">Tidak ada dokumen pendukung</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="flex-fill">
                                <div class="card radio-card">
                                    <label class="card-body p-3 text-center mb-0 cursor-pointer">
                                        <input type="radio" name="has_dokumen" value="ada" {{ $support->dokumen_pendukung ? 'checked' : '' }} class="d-none">
                                        <div class="radio-content">
                                            <i class="fas fa-file-upload fa-2x text-muted mb-2"></i>
                                            <h6 class="mb-1 font-weight-bold">Ada</h6>
                                            <p class="text-muted small mb-0">Ada dokumen pendukung</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">Pilih apakah ada dokumen pendukung tambahan</small>
                    </div>

                    <!-- Dokumen Upload Field (Hidden by default) -->
                    <div class="form-group mb-4" id="dokumenField" style="display: {{ $support->dokumen_pendukung ? 'block' : 'none' }};">
                        <label for="dokumen_pendukung" class="font-weight-bold text-gray-700">
                            <i class="fas fa-file-upload mr-1"></i> Upload Dokumen Pendukung
                        </label>

                        <!-- Current Document Display -->
                        @if($support->dokumen_pendukung)
                            @php
                                $fileExtension = strtolower(pathinfo($support->dokumen_pendukung, PATHINFO_EXTENSION));
                                $fileName = basename($support->dokumen_pendukung);
                            @endphp
                            <div class="mb-3">
                                <p class="mb-2"><strong>File Saat Ini:</strong></p>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                            <i class="fas fa-image fa-lg text-primary"></i>
                                        @elseif($fileExtension === 'pdf')
                                            <i class="fas fa-file-pdf fa-lg text-danger"></i>
                                        @elseif(in_array($fileExtension, ['doc', 'docx']))
                                            <i class="fas fa-file-word fa-lg text-primary"></i>
                                        @else
                                            <i class="fas fa-file fa-lg text-secondary"></i>
                                        @endif
                                    </div>
                                    <div class="flex-grow-1">
                                        <small class="text-muted">{{ $fileName }}</small>
                                        <br>
                                        <a href="{{ asset($support->dokumen_pendukung) }}" target="_blank" class="btn btn-xs btn-outline-primary">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Dokumen File Input with Preview -->
                        <div class="card">
                            <div class="card-body">
                                <div class="custom-file mb-3">
                                    <input type="file" name="dokumen_pendukung" id="dokumen_pendukung" class="custom-file-input"
                                           accept="image/*,.pdf,.doc,.docx" autocomplete="off">
                                    <label class="custom-file-label" for="dokumen_pendukung">
                                        <i class="fas fa-file-upload mr-2"></i>
                                        @if($support->dokumen_pendukung)
                                            Ganti Dokumen (Opsional)
                                        @else
                                            Pilih Dokumen
                                        @endif
                                    </label>
                                </div>

                                <!-- Dokumen Preview -->
                                <div id="dokumenPreview" class="mt-3" style="display: none;">
                                    <div class="card border-info">
                                        <div class="card-body text-center">
                                            <div id="dokumenPreviewContent"></div>
                                            <small class="text-info font-weight-bold">
                                                <i class="fas fa-check-circle mr-1"></i>
                                                <span id="dokumenFileName"></span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <small class="text-muted">
                            <i class="fas fa-info-circle mr-1"></i>
                            Format yang didukung: JPG, PNG, GIF, PDF, DOC, DOCX (Max: 5MB)
                        </small>
                    </div>

                    <div class="form-group mb-4">
                        <label for="kartu_identitas" class="font-weight-bold text-gray-700">
                            <i class="fas fa-camera mr-1"></i> Foto Diri
                        </label>
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
                                            <i class="fas fa-image fa-lg text-primary"></i>
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
                                       accept="image/*">
                                <label class="custom-file-label" for="kartu_identitas">
                                    @if($support->kartu_identitas)
                                        Ganti Foto (Opsional)
                                    @else
                                        Pilih Foto
                                    @endif
                                </label>
                            </div>
                            <small class="text-muted">
                                <i class="fas fa-info-circle mr-1"></i>
                                Kosongkan jika tidak ingin mengubah file. Format: JPG, PNG, GIF (Max: 5MB)
                            </small>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="status" class="font-weight-bold text-gray-700">
                            <i class="fas fa-tasks mr-1"></i> Status *
                        </label>
                        <select name="status" id="status" class="form-control" required autocomplete="off">
                            <option value="">-- Pilih Status --</option>
                            <option value="menunggu" {{ old('status', $support->status) == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="diproses" {{ old('status', $support->status) == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ old('status', $support->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg px-5">
                            <i class="fas fa-save mr-2"></i> Update Data
                        </button>
                        <a href="{{ route('supports.index') }}" class="btn btn-secondary btn-lg px-5 ml-2">
                            <i class="fas fa-home mr-2"></i> Kembali
                        </a>
                    </div>

                    </form>
            </div>
        </div>
    </div>
</div>

<script>
// Dokumen pendukung radio button handler
const dokumenRadios = document.querySelectorAll('input[name="has_dokumen"]');

dokumenRadios.forEach(radio => {
    radio.addEventListener('change', function() {
        // Remove selected class from all radio cards
        document.querySelectorAll('.radio-card').forEach(card => {
            card.classList.remove('selected');
        });

        // Add selected class to the parent card of checked radio
        if (this.checked) {
            this.closest('.radio-card').classList.add('selected');
        }

        if (this.value === 'ada') {
            document.getElementById('dokumenField').style.display = 'block';
        } else {
            document.getElementById('dokumenField').style.display = 'none';
        }
    });
});

// Initialize selected state for default checked radio
const defaultDokumenRadio = document.querySelector('input[name="has_dokumen"]:checked');
if (defaultDokumenRadio) {
    defaultDokumenRadio.closest('.card').classList.add('selected');
}

// Keperluan select change handler
const keperluanSelect = document.getElementById('keperluan');
const keperluanManualContainer = document.getElementById('keperluan_manual_container');
const keperluanManual = document.getElementById('keperluan_manual');

keperluanSelect.addEventListener('change', function() {
    if (this.value === 'Lainnya') {
        // Show manual input
        keperluanManualContainer.style.display = 'block';
    } else {
        // Hide manual input
        keperluanManualContainer.style.display = 'none';
        keperluanManual.value = '';
    }
});

// Dokumen input change handler
const dokumenInput = document.getElementById('dokumen_pendukung');
const dokumenPreview = document.getElementById('dokumenPreview');
const dokumenPreviewContent = document.getElementById('dokumenPreviewContent');
const dokumenFileName = document.getElementById('dokumenFileName');

dokumenInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        handleDokumenSelect(file);
    }
});

// Handle dokumen selection
function handleDokumenSelect(file) {
    // Check file size (5MB max)
    const maxSize = 5 * 1024 * 1024; // 5MB
    if (file.size > maxSize) {
        alert('File terlalu besar. Maksimal ukuran file adalah 5MB.');
        dokumenInput.value = '';
        return;
    }

    // Check file type
    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    if (!allowedTypes.includes(file.type)) {
        alert('Format file tidak didukung. Gunakan format JPG, PNG, GIF, PDF, DOC, atau DOCX.');
        dokumenInput.value = '';
        return;
    }

    dokumenFileName.textContent = file.name;

    // Preview based on file type
    if (file.type.startsWith('image/')) {
        // Image preview
        const reader = new FileReader();
        reader.onload = function(e) {
            dokumenPreviewContent.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;" alt="Preview">`;
        };
        reader.readAsDataURL(file);
    } else if (file.type === 'application/pdf') {
        // PDF preview
        dokumenPreviewContent.innerHTML = `
            <div class="text-center">
                <i class="fas fa-file-pdf fa-3x text-danger mb-2"></i>
                <p class="mb-0">Document PDF</p>
            </div>
        `;
    } else if (file.type.includes('word') || file.type.includes('document')) {
        // Word document preview
        dokumenPreviewContent.innerHTML = `
            <div class="text-center">
                <i class="fas fa-file-word fa-3x text-primary mb-2"></i>
                <p class="mb-0">Document Word</p>
            </div>
        `;
    } else {
        // Generic file preview
        dokumenPreviewContent.innerHTML = `
            <div class="text-center">
                <i class="fas fa-file fa-3x text-secondary mb-2"></i>
                <p class="mb-0">Document</p>
            </div>
        `;
    }

    dokumenPreview.style.display = 'block';
}

// Form validation enhancement
$('form').on('submit', function(e) {
    // Validate keperluan
    const keperluanSelect = $('#keperluan').val();
    const keperluanManual = $('#keperluan_manual').val();

    if (!keperluanSelect) {
        e.preventDefault();
        alert('Harap pilih keperluan dari daftar.');
        $('#keperluan').focus();
        return false;
    }

    if (keperluanSelect === 'Lainnya' && !keperluanManual.trim()) {
        e.preventDefault();
        alert('Harap tulis keperluan secara manual karena Anda memilih opsi "Lainnya".');
        $('#keperluan_manual').focus();
        return false;
    }

    // Validate dokumen pendukung
    const hasDokumenValue = $('input[name="has_dokumen"]:checked').val();
    const dokumenFile = $('#dokumen_pendukung')[0].files[0];

    if (hasDokumenValue === 'ada' && !dokumenFile && !('{{ $support->dokumen_pendukung }}')) {
        e.preventDefault();
        alert('Harap pilih dokumen pendukung karena Anda memilih opsi "Ada dokumen pendukung".');
        $('#dokumen_pendukung').focus();
        return false;
    }

    $('button[type="submit"]').prop('disabled', true);
    $('button[type="submit"]').html('<i class="fas fa-spinner fa-spin mr-2"></i> Update Data...');
});
</script>

@endsection