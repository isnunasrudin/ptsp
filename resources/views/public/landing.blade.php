<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="PTSP MTsN 2 Trenggalek - Sistem Pencatatan Pelayanan dan Survei Kepuasan Layanan Madrasah">
    <meta name="author" content="MTsN 2 Trenggalek">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PTSP MTsN 2 Trenggalek - Pelayanan Terpadu Satu Pintu</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            overflow-x: hidden;
            background: #f8f9fc;
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color:rgb(18, 138, 26) !important;
        }

        .navbar.scrolled {
            padding: 0.5rem 0;
            background: rgba(255, 255, 255, 0.98);
        }

        .nav-link {
            color: #5a5c69 !important;
            font-weight: 600;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: #4e73df !important;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg,rgb(41, 78, 34) 0%, rgba(53, 115, 45, 0.46) 100%), url("{{ asset('img/background.jpeg') }}") no-repeat center center/cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .hero-particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-content p {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .btn-hero {
            padding: 15px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin: 0.5rem;
        }

        .btn-primary-hero {
            background: white;
            color: #667eea;
            border: 2px solid transparent;
        }

        .btn-primary-hero:hover {
            background: transparent;
            color: white;
            border: 2px solid white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary-hero {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-secondary-hero:hover {
            background: white;
            color: #667eea;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* Service Cards */
        .service-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            border-top: 4px solid #4e73df;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }

        /* Statistics Section */
        .stats-section {
            background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%);
            padding: 5rem 0;
            color: white;
        }

        .stat-card {
            text-align: center;
            padding: 2rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Features Section */
        .feature-item {
            padding: 1rem;
            margin-bottom: 1rem;
            border-left: 4px solid #4e73df;
            background: rgba(78, 115, 223, 0.05);
            border-radius: 0 10px 10px 0;
        }

        .feature-icon {
            color: #4e73df;
            font-size: 1.5rem;
            margin-right: 1rem;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            padding: 5rem 0;
            text-align: center;
            color: white;
        }

        /* Footer */
        footer {
            background: #2d3748;
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer-widget h4 {
            color: white;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .footer-widget ul {
            list-style: none;
            padding: 0;
        }

        .footer-widget ul li {
            margin-bottom: 0.5rem;
        }

        .footer-widget ul li a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-widget ul li a:hover {
            color: white;
        }

        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin: 0 0.5rem;
            color: white;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background: #4e73df;
            transform: translateY(-3px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1.1rem;
            }

            .stat-number {
                font-size: 2rem;
            }
        }

        /* Scroll to top button */
        .scroll-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #4e73df;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .scroll-top.show {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:hover {
            background: #224abe;
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="PTSP MTsN 2 Trenggalek" width="34">
                PTSP MTsN 2 Trenggalek
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="hero-particles">
            <div class="hero-particle" style="width: 80px; height: 80px; top: 10%; left: 10%;"></div>
            <div class="hero-particle" style="width: 60px; height: 60px; top: 70%; left: 80%; animation-delay: 1s;"></div>
            <div class="hero-particle" style="width: 100px; height: 100px; top: 40%; left: 60%; animation-delay: 2s;"></div>
            <div class="hero-particle" style="width: 40px; height: 40px; top: 80%; left: 20%; animation-delay: 3s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="hero-content">
                        <h1>Selamat Datang di PTSP MTsN 2 Trenggalek</h1>
                        <p>Pelayanan Terpadu Satu Pintu untuk pencatatan layanan dan survei kepuasan masyarakat. Sistem digital untuk meningkatkan kualitas pelayanan madrasah kami.</p>
                        <div class="hero-buttons">
                            <a href="{{ route('public.buku-tamu') }}" class="btn-hero btn-primary-hero">
                                <i class="fas fa-book-open mr-2"></i> Buku Tamu
                            </a>
                            <a href="{{ route('public.survei-kepuasan') }}" class="btn-hero btn-secondary-hero">
                                <i class="fas fa-star mr-2"></i> Survei Kepuasan
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="hero-image text-center">
                        <i class="fas fa-users-cog" style="font-size: 20rem; color: rgba(255, 255, 255, 0.2);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-4 font-weight-bold text-gray-800 mb-3">Layanan PTSP Madrasah</h2>
                <p class="lead text-muted">Sistem pencatatan pelayanan dan survei kepuasan untuk meningkatkan kualitas layanan madrasah</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h4 class="text-center font-weight-bold mb-3">Buku Tamu Digital</h4>
                        <p class="text-muted text-center">Pencatatan digital untuk pengunjung dan tamu madrasah. Mencatat keperluan kunjungan dan instansi asal dengan sistem yang terorganisir.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h4 class="text-center font-weight-bold mb-3">Survei Kepuasan</h4>
                        <p class="text-muted text-center">Evaluasi kepuasan masyarakat terhadap pelayanan madrasah. 10 aspek penilaian untuk pengukuran kualitas layanan yang komprehensif.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="stat-card">
                        <div class="stat-number" data-count="500">0</div>
                        <div class="stat-label">Pengunjung Terlayani</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="stat-card">
                        <div class="stat-number" data-count="95">0%</div>
                        <div class="stat-label">Kepuasan Masyarakat</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="stat-card">
                        <div class="stat-number" data-count="7">0</div>
                        <div class="stat-label">Hari Layanan/Minggu</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="stat-card">
                        <div class="stat-number" data-count="15">0+</div>
                        <div class="stat-label">Jenis Layanan</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="display-4 font-weight-bold text-gray-800 mb-4">Keunggulan PTSP Madrasah</h2>
                    <div class="feature-item">
                        <i class="fas fa-check-circle feature-icon"></i>
                        <div class="mt-3">
                            <h5 class="mb-0">Pencatatan Digital Terintegrasi</h5>
                            <p class="text-muted mb-0">Sistem buku tamu dan survei kepuasan dalam satu platform terpadu</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-clock feature-icon"></i>
                        <div class="mt-3">
                            <h5 class="mb-0">Pelayanan Cepat dan Akurat</h5>
                            <p class="text-muted mb-0">Proses pencatatan yang efisien tanpa mengurangi kualitas layanan</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-mobile-alt feature-icon"></i>
                        <div class="mt-3">
                            <h5 class="mb-0">Akses Mudah dari Mana Saja</h5>
                            <p class="text-muted mb-0">Responsive design untuk akses optimal dari berbagai perangkat</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-shield-alt feature-icon"></i>
                        <div class="mt-3">
                            <h5 class="mb-0">Data Terlindungi dan Aman</h5>
                            <p class="text-muted mb-0">Keamanan data terjamin dengan sistem proteksi terbaik</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="{{ asset('img/background-mini.jpg') }}" class="img-fluid rounded-lg shadow" alt="PTSP Dashboard">
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container" data-aos="zoom-in">
            <h2 class="display-4 font-weight-bold mb-4">Meningkatkan Kualitas Layanan Madrasah?</h2>
            <p class="lead mb-4">Bergabung dengan sistem PTSP kami untuk pencatatan pelayanan dan evaluasi kepuasan masyarakat</p>
            <div class="cta-buttons">
                <a href="{{ route('public.buku-tamu') }}" class="btn-hero btn-primary-hero">
                    <i class="fas fa-book-open mr-2"></i> Isi Buku Tamu
                </a>
                <a href="{{ route('public.survei-kepuasan') }}" class="btn-hero btn-secondary-hero">
                    <i class="fas fa-star mr-2"></i> Berikan Penilaian
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h4><i class="fas fa-graduation-cap mr-2"></i>PTSP MTsN 2 Trenggalek</h4>
                        <p>Pelayanan Terpadu Satu Pintu - Sistem digital untuk pencatatan layanan dan survei kepuasan masyarakat terhadap layanan madrasah.</p>
                        <div class="social-icons mt-3">
                            <a href="https://www.facebook.com/mtsn2trenggalek" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/mtsn2trenggalek" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://twitter.com/mtsn2trenggalek" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.youtube.com/@mtsn2trenggalek" target="_blank"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h4>Layanan PTSP</h4>
                        <ul>
                            <li><a href="{{ route('public.buku-tamu') }}"><i class="fas fa-angle-right mr-2"></i> Buku Tamu Digital</a></li>
                            <li><a href="{{ route('public.survei-kepuasan') }}"><i class="fas fa-angle-right mr-2"></i> Survei Kepuasan</a></li>
                            <li><a href="#contact"><i class="fas fa-angle-right mr-2"></i> Hubungi Kami</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h4>Informasi Kontak</h4>
                        <ul>
                            <li><i class="fas fa-map-marker-alt mr-2"></i> JL. Raya Sugihan - Kampak, Trenggalek, Jawa Timur</li>
                            <li><i class="fas fa-phone mr-2"></i> (0355) 631045</li>
                            <li><i class="fas fa-envelope mr-2"></i> info@mtsnkampak.sch.id</li>
                            <li><i class="fas fa-clock mr-2"></i> Senin - Jumat: 07:00 - 12:30</li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="border-color: rgba(255, 255, 255, 0.1);">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="mb-0">&copy; {{ date('Y') }} MTsN 2 Trenggalek | <a href="https://pelajartrenggalek.or.id" target="_blank"><img src="{{ asset('img/edo.png') }}" alt="PC IPNU & IPPNU Trenggalek" height="20"></a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <div class="scroll-top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Navbar scroll effect
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('.navbar').addClass('scrolled');
            } else {
                $('.navbar').removeClass('scrolled');
            }
        });

        // Smooth scrolling for navigation links
        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 70
                }, 1000);
            }
        });

        // Counter animation for statistics
        $(window).on('scroll', function() {
            var statsSection = $('.stats-section');
            if (statsSection.length && statsSection.offset().top < $(window).scrollTop() + $(window).height()) {
                $('.stat-number').each(function() {
                    var $this = $(this);
                    var countTo = $this.attr('data-count');
                    var countNum = parseInt(countTo);
                    var duration = 2000;
                    var step = countNum / (duration / 16);
                    var current = 0;

                    if (!$this.hasClass('counted')) {
                        $this.addClass('counted');
                        var timer = setInterval(function() {
                            current += step;
                            if (current >= countNum) {
                                current = countNum;
                                clearInterval(timer);
                            }
                            if (countTo.includes('%')) {
                                $this.text(Math.floor(current) + '%');
                            } else if (countTo.includes('+')) {
                                $this.text(Math.floor(current) + '+');
                            } else {
                                $this.text(Math.floor(current));
                            }
                        }, 16);
                    }
                });
            }
        });

        // Scroll to top button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $('.scroll-top').addClass('show');
            } else {
                $('.scroll-top').removeClass('show');
            }
        });

        $('.scroll-top').on('click', function() {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });

        // Add floating animation to hero particles
        $('.hero-particle').each(function(index) {
            var $particle = $(this);
            var duration = 6000 + (index * 1000);
            var delay = index * 500;

            setInterval(function() {
                $particle.css({
                    transform: 'translateY(' + (Math.random() * 40 - 20) + 'px) translateX(' + (Math.random() * 40 - 20) + 'px)'
                });
            }, duration);
        });
    </script>
</body>
</html>