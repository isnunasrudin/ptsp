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

                        <form action="{{ route('public.buku-tamu.store') }}" method="POST">
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
                                    <i class="fas fa-building mr-1"></i> Instansi/Perusahaan *
                                </label>
                                <input type="text" name="instansi" id="instansi" class="form-control"
                                       value="{{ old('instansi') }}" required
                                       placeholder="Masukkan nama instansi atau perusahaan">
                            </div>

                            <div class="form-group mb-4">
                                <label for="keperluan" class="font-weight-bold text-gray-700">
                                    <i class="fas fa-briefcase mr-1"></i> Keperluan *
                                </label>
                                <input type="text" name="keperluan" id="keperluan" class="form-control"
                                       value="{{ old('keperluan') }}" required
                                       placeholder="Jelaskan keperluan kunjungan Anda">
                            </div>

                            <div class="form-group mb-4">
                                <label for="keterangan" class="font-weight-bold text-gray-700">
                                    <i class="fas fa-comment-alt mr-1"></i> Keterangan Tambahan
                                </label>
                                <textarea name="keterangan" id="keterangan" class="form-control" rows="3"
                                          placeholder="Masukkan keterangan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                                <small class="text-muted">Keterangan bersifat opsional</small>
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
    </script>
</body>
</html>