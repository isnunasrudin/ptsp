<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Buku Tamu PTSP">
    <meta name="author" content="PTSP">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Disable autofill -->
    <meta name="autocomplete" content="off">
    <meta name="autofill" content="off">

    <title>Buku Tamu - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        .header-section {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            color: white;
            padding: 2rem 0;
            border-radius: 15px 15px 0 0;
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
        }
        .logo-section {
            text-align: center;
            margin-bottom: 0.5rem;
        }
        .logo-section i {
            font-size: 3rem;
            color: #4e73df;
            margin-bottom: 1rem;
        }

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

        /* Ensure modal is centered vertically */
        .modal.show {
            display: flex !important;
        }

        /* Remove modal backdrop to prevent covering the form */
        .modal-backdrop {
            display: none !important;
        }

        /* Radio Button Card Styles */
        .card-radio {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .card-radio:hover {
            border-color: #4e73df !important;
            background-color: rgba(78, 115, 223, 0.05);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(78, 115, 223, 0.15);
        }

        .card-radio input[type="radio"]:checked + .card-body {
            background-color: rgba(78, 115, 223, 0.1);
            border-radius: calc(0.25rem - 1px);
        }

        .card-radio input[type="radio"]:checked + .card-body .radio-content i {
            color: #4e73df !important;
        }

        .card-radio input[type="radio"]:checked + .card-body .radio-content h6 {
            color: #4e73df !important;
        }

        .card-radio:has(input[type="radio"]:checked) {
            border-color: #4e73df !important;
            background-color: rgba(78, 115, 223, 0.1);
        }

        .card-radio:has(input[type="radio"]:checked) .radio-content i {
            color: #4e73df !important;
        }

        .card-radio:has(input[type="radio"]:checked) .radio-content h6 {
            color: #4e73df !important;
        }

        /* Fallback for browsers without :has support */
        .card-radio.selected {
            border-color: #4e73df !important;
            background-color: rgba(78, 115, 223, 0.1);
        }

        .card-radio.selected .radio-content i {
            color: #4e73df !important;
        }

        .card-radio.selected .radio-content h6 {
            color: #4e73df !important;
        }

        /* Disable autofill styles */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active,
        textarea:-webkit-autofill,
        textarea:-webkit-autofill:hover,
        textarea:-webkit-autofill:focus,
        textarea:-webkit-autofill:active,
        select:-webkit-autofill,
        select:-webkit-autofill:hover,
        select:-webkit-autofill:focus,
        select:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px white inset !important;
            -webkit-text-fill-color: #333 !important;
            background-color: white !important;
            background-image: none !important;
            transition: background-color 5000s ease-in-out 0s !important;
        }

        /* Additional autofill prevention */
        input::-webkit-credentials-auto-fill-button,
        input::-webkit-caps-lock-indicator,
        input::-webkit-strong-password-auto-fill-button {
            visibility: hidden;
            display: none !important;
            pointer-events: none;
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

            .card-radio {
                margin-bottom: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="form-container">
                    <!-- Header -->
                    <div class="header-section text-center">
                        <h1 class="h3 mb-3">
                            <i class="fas fa-book-open mr-2"></i>
                            Buku Tamu
                        </h1>
                        <p class="mb-0">Selamat datang! Silakan isi form buku tamu di bawah ini.</p>
                    </div>

                    <!-- Form Content -->
                    <div class="p-md-5 p-4">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle mr-2"></i>
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                <strong>Perhatian!</strong> Mohon perbaiki kesalahan berikut:
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('public.buku-tamu.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf

                            <!-- Logo Section -->
                            <div class="logo-section">
                                <i class="fas fa-users"></i>
                                <h4 class="text-gray-800">Formulir Buku Tamu</h4>
                                <p class="text-muted">Isi data diri Anda dengan lengkap</p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="name" class="font-weight-bold text-gray-700">
                                            <i class="fas fa-user mr-1"></i> Nama Lengkap *
                                        </label>
                                        <input type="text" name="name" id="name" class="form-control"
                                               value="{{ old('name') }}" required
                                               placeholder="Masukkan nama lengkap Anda" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="phone" class="font-weight-bold text-gray-700">
                                            <i class="fas fa-phone mr-1"></i> Nomor Telepon *
                                        </label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                               value="{{ old('phone') }}" required
                                               placeholder="Masukkan nomor telepon Anda" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="instansi" class="font-weight-bold text-gray-700">
                                    <i class="fas fa-building mr-1"></i> Instansi / Alamat Rumah *
                                </label>
                                <input type="text" name="instansi" id="instansi" class="form-control"
                                       value="{{ old('instansi') }}" required
                                       placeholder="Masukkan nama instansi atau alamat rumah" autocomplete="off">
                            </div>

                            <div class="form-group mb-4">
                                <label for="keperluan" class="font-weight-bold text-gray-700">
                                    <i class="fas fa-briefcase mr-1"></i> Keperluan *
                                </label>

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

                            <div class="form-group mb-4">
                                <label for="keterangan" class="font-weight-bold text-gray-700">
                                    <i class="fas fa-comment-alt mr-1"></i> Keterangan Tambahan
                                </label>
                                <textarea name="keterangan" id="keterangan" class="form-control" rows="3"
                                          placeholder="Masukkan keterangan tambahan (opsional)" autocomplete="off">{{ old('keterangan') }}</textarea>
                                <small class="text-muted">Keterangan bersifat opsional</small>
                            </div>

                            <!-- Dokumen Pendukung Section -->
                            <div class="form-group mb-4">
                                <label class="font-weight-bold text-gray-700">
                                    <i class="fas fa-file-alt mr-1"></i> Dokumen Pendukung
                                </label>
                                <div class="d-flex gap-3">
                                    <div class="flex-fill">
                                        <div class="card border-2 border-light card-radio">
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
                                        <div class="card border-2 border-light card-radio">
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
                                <small class="text-muted">Pilih apakah Anda memiliki dokumen pendukung tambahan</small>
                            </div>

                            <!-- Dokumen Upload Field (Hidden by default) -->
                            <div class="form-group mb-4" id="dokumenField" style="display: none;">
                                <label for="dokumen_pendukung" class="font-weight-bold text-gray-700">
                                    <i class="fas fa-upload mr-1"></i> Upload Dokumen Pendukung
                                </label>

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

                            <div class="form-group mb-4">
                                <label for="kartu_identitas" class="font-weight-bold text-gray-700">
                                    <i class="fas fa-camera mr-1"></i> Foto Diri (Wajib) *
                                </label>

                                <!-- File Input with Preview -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="custom-file mb-3">
                                            <input type="file" name="kartu_identitas" id="kartu_identitas" class="custom-file-input"
                                                   accept="image/*" required autocomplete="off">
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

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fas fa-save mr-2"></i> Simpan Data
                                </button>
                                <a href="{{ url('/') }}" class="btn btn-secondary btn-lg px-5 ml-2">
                                    <i class="fas fa-home mr-2"></i> Kembali
                                </a>
                            </div>

                            <div class="text-center mt-4">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Data Anda akan segera diproses oleh petugas kami. Terima kasih atas kunjungan Anda!
                                </small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Camera Modal (moved outside form for flexibility) -->
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

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Custom JavaScript -->
    <script>
        // Auto-clear success message after 5 seconds
        setTimeout(function() {
            $('.alert-success').fadeOut('slow');
        }, 5000);

        
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

            if (hasDokumenValue === 'ada' && !dokumenFile) {
                e.preventDefault();
                alert('Harap pilih dokumen pendukung karena Anda memilih opsi "Ada dokumen pendukung".');
                $('#dokumen_pendukung').focus();
                return false;
            }

            // Validate foto (required)
            const fotoFile = $('#kartu_identitas')[0].files[0];

            if (!fotoFile) {
                e.preventDefault();
                alert('Foto diri wajib diupload. Silakan pilih foto terlebih dahulu.');
                $('#kartu_identitas').focus();
                return false;
            }

            $('button[type="submit"]').prop('disabled', true);
            $('button[type="submit"]').html('<i class="fas fa-spinner fa-spin mr-2"></i> Menyimpan...');
        });

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
        const cameraModal = $('#cameraModal');
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
        const hasDokumenSelect = document.getElementById('has_dokumen');
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
                document.querySelectorAll('.card-radio').forEach(card => {
                    card.classList.remove('selected');
                });

                // Add selected class to the parent card of checked radio
                if (this.checked) {
                    this.closest('.card-radio').classList.add('selected');
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
            defaultDokumenRadio.closest('.card-radio').classList.add('selected');

            // Hide dokumen field by default since "Tidak Ada" is selected
            const dokumenField = document.getElementById('dokumenField');
            if (dokumenField) {
                dokumenField.style.display = 'none';
            }
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
            cameraModal.modal('show');
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
                cameraModal.modal('hide');

                const alert = $('<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                    '<i class="fas fa-check-circle mr-2"></i>Foto berhasil diambil!' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button></div>');

                $('form').prepend(alert);

                setTimeout(function() {
                    alert.fadeOut('slow');
                }, 3000);
            }, 'image/jpeg', 0.8);
        });

        // Clean up camera when modal is closed
        cameraModal.on('hidden.bs.modal', function() {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
                stream = null;
            }
            video.style.display = 'block';
            cameraButtons.style.display = 'block';
            capturedImage.style.display = 'none';
            capturedImageData = null;
        });

        
        // Check if camera is supported
        if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
            cameraBtn.prop('disabled', true);
            cameraBtn.attr('title', 'Kamera tidak didukung pada browser ini');
        }
    </script>
</body>
</html>