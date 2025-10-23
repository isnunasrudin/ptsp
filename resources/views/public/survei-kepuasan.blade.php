<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Survei Kepuasan PTSP">
    <meta name="author" content="PTSP">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Survei Kepuasan - {{ config('app.name', 'Laravel') }}</title>

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
            background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%);
            color: white;
            padding: 2rem 0;
            border-radius: 15px 15px 0 0;
        }
        .form-control:focus, select.form-control:focus {
            border-color: #1cc88a;
            box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.25);
        }
        .btn-success {
            background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%);
            border: none;
            padding: 12px 30px;
        }
        .btn-success:hover {
            background: linear-gradient(135deg, #17a673 0%, #0f6d4a 100%);
        }
        .logo-section {
            text-align: center;
            margin-bottom: 2rem;
        }
        .logo-section i {
            font-size: 3rem;
            color: #1cc88a;
            margin-bottom: 1rem;
        }
        .rating-group {
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: #f8f9fc;
            border-radius: 8px;
            border-left: 4px solid #1cc88a;
        }
        .rating-label {
            font-weight: 600;
            color: #5a5c69;
            margin-bottom: 0.5rem;
        }
        .rating-help {
            font-size: 0.875rem;
            color: #858796;
            margin-bottom: 0.5rem;
        }
        .star-rating {
            font-size: 1.2rem;
        }
        .star-rating option {
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <div class="form-container">
                    <!-- Header -->
                    <div class="header-section text-center">
                        <h1 class="h3 mb-3">
                            <i class="fas fa-star mr-2"></i>
                            Survei Kepuasan
                        </h1>
                        <p class="mb-0">Bantu kami meningkatkan kualitas pelayanan dengan memberikan penilaian Anda.</p>
                    </div>

                    <!-- Form Content -->
                    <div class="p-4 p-md-5">
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
                                <strong>Perhatian!</strong> Mohon periksa kembali penilaian Anda:
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('public.survei-kepuasan.store') }}" method="POST">
                            @csrf

                            <!-- Logo Section -->
                            <div class="logo-section">
                                <i class="fas fa-clipboard-list"></i>
                                <h4 class="text-gray-800">Formulir Survei Kepuasan</h4>
                                <p class="text-muted">Beri penilaian Anda terhadap kualitas pelayanan kami</p>
                            </div>

                            <!-- Survey Questions -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="rating-group">
                                        <div class="rating-label">1. Kebutuhan Informasi</div>
                                        <div class="rating-help">Seberapa jelas informasi yang Anda butuhkan?</div>
                                        <select name="requirements_rating" class="form-control star-rating" required>
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
                                    <div class="rating-group">
                                        <div class="rating-label">2. Prosedur Pelayanan</div>
                                        <div class="rating-help">Seberapa mudah prosedur pelayanannya?</div>
                                        <select name="procedure_rating" class="form-control star-rating" required>
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
                                    <div class="rating-group">
                                        <div class="rating-label">3. Ketepatan Waktu</div>
                                        <div class="rating-help">Seberapa tepat waktu pelayanannya?</div>
                                        <select name="timeliness_rating" class="form-control star-rating" required>
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
                                    <div class="rating-group">
                                        <div class="rating-label">4. Biaya/Tarif</div>
                                        <div class="rating-help">Seberapa sesuai biaya dengan pelayanan?</div>
                                        <select name="cost_rating" class="form-control star-rating" required>
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
                                    <div class="rating-group">
                                        <div class="rating-label">5. Kualitas Produk/Hasil</div>
                                        <div class="rating-help">Seberapa berkualitas hasil pelayanan?</div>
                                        <select name="product_quality_rating" class="form-control star-rating" required>
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
                                    <div class="rating-group">
                                        <div class="rating-label">6. Kompetensi Staff</div>
                                        <div class="rating-help">Seberapa kompeten staff yang melayani?</div>
                                        <select name="staff_competence_rating" class="form-control star-rating" required>
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
                                    <div class="rating-group">
                                        <div class="rating-label">7. Kesopanan Staff</div>
                                        <div class="rating-help">Seberapa sopan staff dalam melayani?</div>
                                        <select name="staff_politeness_rating" class="form-control star-rating" required>
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
                                    <div class="rating-group">
                                        <div class="rating-label">8. Penanganan Keluhan</div>
                                        <div class="rating-help">Seberapa baik penanganan keluhan?</div>
                                        <select name="handling_complaint_rating" class="form-control star-rating" required>
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
                                    <div class="rating-group">
                                        <div class="rating-label">9. Fasilitas</div>
                                        <div class="rating-help">Seberapa baik fasilitas yang disediakan?</div>
                                        <select name="facility_rating" class="form-control star-rating" required>
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
                                    <div class="rating-group">
                                        <div class="rating-label">10. Kepuasan Keseluruhan</div>
                                        <div class="rating-help">Seberapa puas Anda dengan pelayanan kami?</div>
                                        <select name="overall_satisfaction" class="form-control star-rating" required>
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

                            <!-- Additional Message -->
                            <div class="rating-group">
                                <div class="rating-label">Pesan/Komentar Tambahan</div>
                                <div class="rating-help">Bagikan pendapat atau saran Anda (opsional)</div>
                                <textarea name="message" id="message" class="form-control" rows="4"
                                          placeholder="Tuliskan pesan atau komentar Anda di sini...">{{ old('message') }}</textarea>
                                <small class="text-muted">Maksimal 1000 karakter</small>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-lg px-5">
                                    <i class="fas fa-paper-plane mr-2"></i> Kirim Survei
                                </button>
                                <a href="{{ url('/') }}" class="btn btn-secondary btn-lg px-5 ml-2">
                                    <i class="fas fa-home mr-2"></i> Kembali
                                </a>
                            </div>

                            <div class="text-center mt-4">
                                <small class="text-muted">
                                    <i class="fas fa-heart text-danger mr-1"></i>
                                    Terima kasih atas partisipasi Anda dalam survei kepuasan ini!
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
            var allSelected = true;
            $('select[required]').each(function() {
                if (!$(this).val()) {
                    allSelected = false;
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });

            if (!allSelected) {
                $('.alert-danger').show();
                return false;
            }

            $('button[type="submit"]').prop('disabled', true);
            $('button[type="submit"]').html('<i class="fas fa-spinner fa-spin mr-2"></i> Mengirim...');
            return true;
        });

        // Remove invalid class on change
        $('select[required]').on('change', function() {
            if ($(this).val()) {
                $(this).removeClass('is-invalid');
            }
        });
    </script>
</body>
</html>