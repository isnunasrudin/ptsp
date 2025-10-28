@extends('layouts.admin')

@push('styles')
<style>
/* Radio Button Card Styles */
.card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.card:hover {
    border-color: #4e73df !important;
    background-color: rgba(78, 115, 223, 0.05);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(78, 115, 223, 0.15);
}

.card input[type="radio"]:checked + .card-body {
    background-color: rgba(78, 115, 223, 0.1);
    border-radius: calc(0.25rem - 1px);
}

.card input[type="radio"]:checked + .card-body .radio-content i {
    color: #4e73df !important;
}

.card input[type="radio"]:checked + .card-body .radio-content h6 {
    color: #4e73df !important;
}

.card:has(input[type="radio"]:checked) {
    border-color: #4e73df !important;
    background-color: rgba(78, 115, 223, 0.1);
}

.card:has(input[type="radio"]:checked) .radio-content i {
    color: #4e73df !important;
}

.card:has(input[type="radio"]:checked) .radio-content h6 {
    color: #4e73df !important;
}

/* Fallback for browsers without :has support */
.card.selected {
    border-color: #4e73df !important;
    background-color: rgba(78, 115, 223, 0.1);
}

.card.selected .radio-content i {
    color: #4e73df !important;
}

.card.selected .radio-content h6 {
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
    <h1 class="h3 mb-0 text-gray-800">Tambah Buku Tamu</h1>
    <a href="{{ route('supports.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
    </a>
</div>

<!-- Content Row -->
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Buku Tamu</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('supports.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
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
                                <label for="name">Nama Lengkap *</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{ old('name') }}" required
                                       placeholder="Masukkan nama lengkap">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Nomor Telepon *</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                       value="{{ old('phone') }}" required
                                       placeholder="Masukkan nomor telepon">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="instansi">Instansi/Perusahaan *</label>
                        <input type="text" name="instansi" id="instansi" class="form-control"
                               value="{{ old('instansi') }}" required
                               placeholder="Masukkan nama instansi atau perusahaan">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_kunjungan">Tanggal Kunjungan *</label>
                                <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control"
                                       value="{{ old('tanggal_kunjungan', date('Y-m-d')) }}" required>
                                <small class="text-muted">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    Tanggal saat pengunjung datang
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keperluan">Keperluan *</label>

                        <!-- Select keperluan -->
                        <select name="keperluan" id="keperluan" class="form-control" required autocomplete="off">
                            <option value="">-- Pilih Tujuan Kunjungan --</option>
                            <option value="Menemui Kepala Madrasah" {{ old('keperluan') == 'Menemui Kepala Madrasah' ? 'selected' : '' }}>
                                Menemui Kepala Madrasah
                            </option>
                            <option value="Menemui Kepala Tata Usaha" {{ old('keperluan') == 'Menemui Kepala Tata Usaha' ? 'selected' : '' }}>
                                Menemui Kepala Tata Usaha
                            </option>
                            <option value="Menemui Wakil Kepala Sekolah Bidang Kurikulum" {{ old('keperluan') == 'Menemui Wakil Kepala Sekolah Bidang Kurikulum' ? 'selected' : '' }}>
                                Menemui Wakil Kepala Sekolah Bidang Kurikulum
                            </option>
                            <option value="Menemui Wakil Kepala Sekolah Bidang Humas dan Kerja Sama" {{ old('keperluan') == 'Menemui Wakil Kepala Sekolah Bidang Humas dan Kerja Sama' ? 'selected' : '' }}>
                                Menemui Wakil Kepala Sekolah Bidang Humas dan Kerja Sama
                            </option>
                            <option value="Menemui Wakil Kepala Sekolah Bidang Sarana dan Prasarana" {{ old('keperluan') == 'Menemui Wakil Kepala Sekolah Bidang Sarana dan Prasarana' ? 'selected' : '' }}>
                                Menemui Wakil Kepala Sekolah Bidang Sarana dan Prasarana
                            </option>
                            <option value="Menemui Wakil Kepala Sekolah Bidang Kesiswaan" {{ old('keperluan') == 'Menemui Wakil Kepala Sekolah Bidang Kesiswaan' ? 'selected' : '' }}>
                                Menemui Wakil Kepala Sekolah Bidang Kesiswaan
                            </option>
                            <option value="Menemui Guru Bimbingan dan Konseling" {{ old('keperluan') == 'Menemui Guru Bimbingan dan Konseling' ? 'selected' : '' }}>
                                Menemui Guru Bimbingan dan Konseling
                            </option>
                            <option value="Menemui Wali Kelas" {{ old('keperluan') == 'Menemui Wali Kelas' ? 'selected' : '' }}>
                                Menemui Wali Kelas
                            </option>
                            <option value="Lainnya">--- Lainnya (tulis manual) ---</option>
                        </select>

                        <!-- Manual input for "Lainnya" (hidden by default) -->
                        <div id="keperluan_manual_container" style="display: none; margin-top: 1rem;">
                            <input type="text" name="keperluan_manual" id="keperluan_manual" class="form-control"
                                   placeholder="Tulis keperluan kunjungan Anda secara manual"
                                   value="{{ old('keperluan_manual') }}" autocomplete="off">
                            <small class="text-muted">
                                <i class="fas fa-info-circle mr-1"></i>
                                Jelaskan keperluan kunjungan Anda dengan jelas
                            </small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan Tambahan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" rows="3"
                                  placeholder="Masukkan keterangan tambahan (opsional)" autocomplete="off">{{ old('keterangan') }}</textarea>
                        <small class="text-muted">Keterangan bersifat opsional</small>
                    </div>

                    <!-- Dokumen Pendukung Section -->
                    <div class="form-group">
                        <label class="font-weight-bold">Dokumen Pendukung</label>
                        <div class="d-flex gap-3">
                            <div class="flex-fill">
                                <div class="card border-2 border-light">
                                    <label class="card-body p-3 text-center mb-0 cursor-pointer">
                                        <input type="radio" name="has_dokumen" value="tidak" checked class="d-none">
                                        <div class="radio-content">
                                            <i class="fas fa-times-circle fa-2x text-muted mb-2"></i>
                                            <h6 class="mb-1 font-weight-bold">Tidak Ada</h6>
                                            <p class="text-muted small mb-0">Tidak ada dokumen pendukung</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="flex-fill">
                                <div class="card border-2 border-light">
                                    <label class="card-body p-3 text-center mb-0 cursor-pointer">
                                        <input type="radio" name="has_dokumen" value="ada" class="d-none">
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
                    <div class="form-group" id="dokumenField" style="display: none;">
                        <label for="dokumen_pendukung">Upload Dokumen Pendukung</label>

                        <!-- Dokumen File Input with Preview -->
                        <div class="card">
                            <div class="card-body">
                                <div class="custom-file mb-3">
                                    <input type="file" name="dokumen_pendukung" id="dokumen_pendukung" class="custom-file-input"
                                           accept="image/*,.pdf,.doc,.docx" autocomplete="off">
                                    <label class="custom-file-label" for="dokumen_pendukung">
                                        <i class="fas fa-file-upload mr-2"></i>Pilih Dokumen
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

                    <div class="form-group">
                        <label for="kartu_identitas">Foto Diri</label>

                        <!-- File Input with Preview -->
                        <div class="card">
                            <div class="card-body">
                                <div class="custom-file mb-3">
                                    <input type="file" name="kartu_identitas" id="kartu_identitas" class="custom-file-input"
                                           accept="image/*" autocomplete="off">
                                    <label class="custom-file-label" for="kartu_identitas">
                                        <i class="fas fa-image mr-2"></i>Pilih Foto
                                    </label>
                                </div>

                                <!-- Alternative Options -->
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <button type="button" class="btn btn-primary btn-sm w-100" id="cameraBtn" title="Ambil Foto dengan Kamera">
                                            <i class="fas fa-camera mr-2"></i>Ambil Foto
                                        </button>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <button type="button" class="btn btn-secondary btn-sm w-100" id="clearFileBtn" title="Hapus File">
                                            <i class="fas fa-trash mr-2"></i>Hapus File
                                        </button>
                                    </div>
                                </div>

                                <!-- File Preview -->
                                <div id="filePreview" class="mt-3" style="display: none;">
                                    <div class="card border-success">
                                        <div class="card-body text-center">
                                            <div id="previewContent"></div>
                                            <small class="text-success font-weight-bold">
                                                <i class="fas fa-check-circle mr-1"></i>
                                                <span id="fileName"></span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <small class="text-muted">
                            <i class="fas fa-info-circle mr-1"></i>
                            Format yang didukung: JPG, PNG, GIF (Max: 5MB)
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="status">Status *</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="menunggu" {{ old('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="diproses" {{ old('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Data
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

<!-- Camera Modal -->
<div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="cameraModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cameraModalLabel">
                    <i class="fas fa-camera mr-2"></i>Ambil Foto
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div id="cameraContainer">
                    <video id="video" class="w-100 mb-3" style="max-height: 400px; border-radius: 10px;" autoplay></video>
                    <canvas id="canvas" style="display: none;"></canvas>
                    <div id="cameraButtons" class="mb-3">
                        <button type="button" class="btn btn-success btn-lg mr-2" id="captureBtn">
                            <i class="fas fa-camera mr-2"></i> Ambil Foto
                        </button>
                        <button type="button" class="btn btn-secondary btn-lg mr-2" id="switchCameraBtn">
                            <i class="fas fa-sync-alt mr-2"></i> Ganti Kamera
                        </button>
                    </div>
                    <div id="capturedImage" style="display: none;">
                        <img id="photo" class="w-100 mb-3" style="max-height: 400px; border-radius: 10px; border: 2px solid #28a745;">
                        <div class="mb-3">
                            <button type="button" class="btn btn-warning mr-2" id="retakeBtn">
                                <i class="fas fa-redo mr-2"></i> Foto Ulang
                            </button>
                            <button type="button" class="btn btn-success" id="usePhotoBtn">
                                <i class="fas fa-check mr-2"></i> Gunakan Foto
                            </button>
                        </div>
                    </div>
                </div>
                <div id="cameraError" class="alert alert-warning" style="display: none;">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <span id="cameraErrorText"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// File and Camera functionality
let stream = null;
let currentCamera = 'user'; // 'user' for front camera, 'environment' for back camera
let capturedImageData = null;

const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const photo = document.getElementById('photo');
const cameraBtn = document.getElementById('cameraBtn');
const captureBtn = document.getElementById('captureBtn');
const switchCameraBtn = document.getElementById('switchCameraBtn');
const retakeBtn = document.getElementById('retakeBtn');
const usePhotoBtn = document.getElementById('usePhotoBtn');
const cameraModal = document.getElementById('cameraModal');
const cameraContainer = document.getElementById('cameraContainer');
const cameraButtons = document.getElementById('cameraButtons');
const capturedImage = document.getElementById('capturedImage');
const cameraError = document.getElementById('cameraError');
const cameraErrorText = document.getElementById('cameraErrorText');

// File handling elements
const fileInput = document.getElementById('kartu_identitas');
const filePreview = document.getElementById('filePreview');
const previewContent = document.getElementById('previewContent');
const fileName = document.getElementById('fileName');
const clearFileBtn = document.getElementById('clearFileBtn');

// Dokumen pendukung elements
const dokumenField = document.getElementById('dokumenField');
const dokumenInput = document.getElementById('dokumen_pendukung');
const dokumenPreview = document.getElementById('dokumenPreview');
const dokumenPreviewContent = document.getElementById('dokumenPreviewContent');
const dokumenFileName = document.getElementById('dokumenFileName');

// File input change handler
fileInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        handleFileSelect(file);
    }
});

// Clear file button
clearFileBtn.addEventListener('click', function() {
    fileInput.value = '';
    filePreview.style.display = 'none';
    fileName.textContent = '';
    previewContent.innerHTML = '';
});

// Dokumen pendukung radio button handler
const dokumenRadios = document.querySelectorAll('input[name="has_dokumen"]');

dokumenRadios.forEach(radio => {
    radio.addEventListener('change', function() {
        // Remove selected class from all radio cards
        document.querySelectorAll('.card').forEach(card => {
            card.classList.remove('selected');
        });

        // Add selected class to the parent card of checked radio
        if (this.checked) {
            this.closest('.card').classList.add('selected');
        }

        if (this.value === 'ada') {
            dokumenField.style.display = 'block';
        } else {
            dokumenField.style.display = 'none';
            dokumenInput.value = '';
            dokumenPreview.style.display = 'none';
            dokumenFileName.textContent = '';
            dokumenPreviewContent.innerHTML = '';
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

// Initialize - hide manual input by default
if (keperluanManualContainer) {
    keperluanManualContainer.style.display = 'none';
}

keperluanSelect.addEventListener('change', function() {
    console.log('Keperluan select changed to:', this.value);

    if (this.value === 'Lainnya') {
        // Show manual input
        console.log('Showing manual input');
        keperluanManualContainer.style.display = 'block';
        keperluanManual.focus();
    } else {
        // Hide manual input
        console.log('Hiding manual input');
        keperluanManualContainer.style.display = 'none';
        keperluanManual.value = '';
    }
});

// Wait for DOM to be ready
document.addEventListener('DOMContentLoaded', function() {
    const keperluanSelectReady = document.getElementById('keperluan');
    const keperluanManualContainerReady = document.getElementById('keperluan_manual_container');
    const keperluanManualReady = document.getElementById('keperluan_manual');

    if (keperluanSelectReady && keperluanManualContainerReady) {
        // Initialize - hide manual input by default
        keperluanManualContainerReady.style.display = 'none';

        keperluanSelectReady.addEventListener('change', function() {
            console.log('DOMContentLoaded keperluan changed to:', this.value);

            if (this.value === 'Lainnya') {
                keperluanManualContainerReady.style.display = 'block';
                if (keperluanManualReady) {
                    keperluanManualReady.focus();
                }
            } else {
                keperluanManualContainerReady.style.display = 'none';
                if (keperluanManualReady) {
                    keperluanManualReady.value = '';
                }
            }
        });
    }
});

// Dokumen input change handler
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

// Handle file selection
function handleFileSelect(file) {
    // Check file size (5MB max)
    const maxSize = 5 * 1024 * 1024; // 5MB
    if (file.size > maxSize) {
        alert('File terlalu besar. Maksimal ukuran file adalah 5MB.');
        fileInput.value = '';
        return;
    }

    // Check file type
    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    if (!allowedTypes.includes(file.type)) {
        alert('Format file tidak didukung. Gunakan format JPG, PNG, atau GIF.');
        fileInput.value = '';
        return;
    }

    fileName.textContent = file.name;

    // Image preview
    const reader = new FileReader();
    reader.onload = function(e) {
        previewContent.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;" alt="Preview">`;
    };
    reader.readAsDataURL(file);

    filePreview.style.display = 'block';
}

// Open camera modal
cameraBtn.addEventListener('click', async function() {
    const modal = new bootstrap.Modal(cameraModal);
    modal.show();
    await startCamera();
});

// Start camera
async function startCamera() {
    try {
        const constraints = {
            video: {
                facingMode: currentCamera,
                width: { ideal: 1280 },
                height: { ideal: 720 }
            }
        };

        stream = await navigator.mediaDevices.getUserMedia(constraints);
        video.srcObject = stream;
        cameraContainer.style.display = 'block';
        cameraButtons.style.display = 'block';
        capturedImage.style.display = 'none';
        cameraError.style.display = 'none';

    } catch (err) {
        console.error('Error accessing camera:', err);
        cameraErrorText.textContent = 'Tidak dapat mengakses kamera. Pastikan Anda telah memberikan izin kamera dan perangkat memiliki kamera yang tersedia.';
        cameraError.style.display = 'block';
        cameraContainer.style.display = 'none';
    }
}

// Capture photo
captureBtn.addEventListener('click', function() {
    const context = canvas.getContext('2d');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    context.drawImage(video, 0, 0);

    const imageData = canvas.toDataURL('image/jpeg', 0.8);
    photo.src = imageData;
    capturedImageData = imageData;

    video.style.display = 'none';
    cameraButtons.style.display = 'none';
    capturedImage.style.display = 'block';
});

// Switch camera
switchCameraBtn.addEventListener('click', async function() {
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
    }
    currentCamera = currentCamera === 'user' ? 'environment' : 'user';
    await startCamera();
});

// Retake photo
retakeBtn.addEventListener('click', function() {
    video.style.display = 'block';
    cameraButtons.style.display = 'block';
    capturedImage.style.display = 'none';
    capturedImageData = null;
});

// Use photo
usePhotoBtn.addEventListener('click', function() {
    // Convert captured image to blob and create file
    canvas.toBlob(function(blob) {
        const file = new File([blob], 'kartu_identitas_' + Date.now() + '.jpg', {
            type: 'image/jpeg',
            lastModified: Date.now()
        });

        // Create DataTransfer to set file to input
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        fileInput.files = dataTransfer.files;

        // Show preview
        handleFileSelect(file);

        // Close modal and show success message
        const modal = bootstrap.Modal.getInstance(cameraModal);
        modal.hide();

        // Create success alert
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-success alert-dismissible fade show';
        alertDiv.setAttribute('role', 'alert');
        alertDiv.innerHTML =
            '<i class="fas fa-check-circle mr-2"></i>Foto berhasil diambil!' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>';

        const form = document.querySelector('form');
        form.insertBefore(alertDiv, form.firstChild);

        setTimeout(function() {
            alertDiv.style.transition = 'opacity 0.5s';
            alertDiv.style.opacity = '0';
            setTimeout(function() {
                if (alertDiv.parentNode) {
                    alertDiv.parentNode.removeChild(alertDiv);
                }
            }, 500);
        }, 3000);
    }, 'image/jpeg', 0.8);
});

// Clean up camera when modal is closed
cameraModal.addEventListener('hidden.bs.modal', function() {
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
        stream = null;
    }
    video.style.display = 'block';
    cameraButtons.style.display = 'block';
    capturedImage.style.display = 'none';
    capturedImageData = null;
});

// Form validation enhancement
const form = document.querySelector('form');
form.addEventListener('submit', function(e) {
    // Validate keperluan
    const keperluanSelect = document.getElementById('keperluan').value;
    const keperluanManual = document.getElementById('keperluan_manual').value;

    if (!keperluanSelect) {
        e.preventDefault();
        alert('Harap pilih keperluan dari daftar.');
        document.getElementById('keperluan').focus();
        return false;
    }

    if (keperluanSelect === 'Lainnya' && !keperluanManual.trim()) {
        e.preventDefault();
        alert('Harap tulis keperluan secara manual karena Anda memilih opsi "Lainnya".');
        document.getElementById('keperluan_manual').focus();
        return false;
    }

    // Validate dokumen pendukung
    const hasDokumenRadio = document.querySelector('input[name="has_dokumen"]:checked');
    const hasDokumenValue = hasDokumenRadio ? hasDokumenRadio.value : null;
    const dokumenFile = document.getElementById('dokumen_pendukung').files[0];

    if (hasDokumenValue === 'ada' && !dokumenFile) {
        e.preventDefault();
        alert('Harap pilih dokumen pendukung karena Anda memilih opsi "Ada dokumen pendukung".');
        document.getElementById('dokumen_pendukung').focus();
        return false;
    }

    // Disable submit button and show loading
    const submitBtn = document.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Menyimpan...';
});

// Check if camera is supported
if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
    cameraBtn.disabled = true;
    cameraBtn.title = 'Kamera tidak didukung pada browser ini';
}
</script>

@endsection