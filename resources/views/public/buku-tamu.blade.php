<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Buku Tamu PTSP">
    <meta name="author" content="PTSP">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
            margin-bottom: 2rem;
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
                    <div class="p-5">
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

                        <form action="{{ route('public.buku-tamu.store') }}" method="POST" enctype="multipart/form-data">
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
                                               placeholder="Masukkan nama lengkap Anda">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="phone" class="font-weight-bold text-gray-700">
                                            <i class="fas fa-phone mr-1"></i> Nomor Telepon *
                                        </label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                               value="{{ old('phone') }}" required
                                               placeholder="Masukkan nomor telepon Anda">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="instansi" class="font-weight-bold text-gray-700">
                                    <i class="fas fa-building mr-1"></i> Instansi / Alamat Rumah *
                                </label>
                                <input type="text" name="instansi" id="instansi" class="form-control"
                                       value="{{ old('instansi') }}" required
                                       placeholder="Masukkan nama instansi atau alamat rumah">
                            </div>

                            <div class="form-group mb-4">
                                <label for="keperluan" class="font-weight-bold text-gray-700">
                                    <i class="fas fa-briefcase mr-1"></i> Keperluan *
                                </label>
                                <select name="keperluan" id="keperluan" class="form-control" required>
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
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="keterangan" class="font-weight-bold text-gray-700">
                                    <i class="fas fa-comment-alt mr-1"></i> Keterangan Tambahan
                                </label>
                                <textarea name="keterangan" id="keterangan" class="form-control" rows="3"
                                          placeholder="Masukkan keterangan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                                <small class="text-muted">Keterangan bersifat opsional</small>
                            </div>

                            <div class="form-group mb-4">
                                <label for="kartu_identitas" class="font-weight-bold text-gray-700">
                                    <i class="fas fa-id-card mr-1"></i> Kartu Identitas (KTP/SIM/Paspor/dll) *
                                </label>

                                <!-- File Input with Preview -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="custom-file mb-3">
                                            <input type="file" name="kartu_identitas" id="kartu_identitas" class="custom-file-input"
                                                   accept="image/*,.pdf" required>
                                            <label class="custom-file-label" for="kartu_identitas">
                                                <i class="fas fa-cloud-upload-alt mr-2"></i>Pilih File (Gambar/PDF)
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
                                    Format yang didukung: JPG, PNG, GIF, PDF (Max: 5MB)
                                </small>
                            </div>

                            <!-- Camera Modal -->
                            <div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="cameraModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="cameraModalLabel">
                                                <i class="fas fa-camera mr-2"></i>Scan Kartu Identitas
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
        $('form').on('submit', function() {
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
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'application/pdf'];
            if (!allowedTypes.includes(file.type)) {
                alert('Format file tidak didukung. Gunakan format JPG, PNG, GIF, atau PDF.');
                fileInput.value = '';
                return;
            }

            fileName.textContent = file.name;

            if (file.type === 'application/pdf') {
                // PDF preview
                previewContent.innerHTML = '<i class="fas fa-file-pdf fa-3x text-danger mb-2"></i><p class="mb-0">Dokumen PDF</p>';
            } else {
                // Image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewContent.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;" alt="Preview">`;
                };
                reader.readAsDataURL(file);
            }

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
                    '<i class="fas fa-check-circle mr-2"></i>Foto kartu identitas berhasil diambil!' +
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