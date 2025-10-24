<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Terima Kasih - PTSP MTsN 2 Trenggalek">
    <meta name="author" content="MTsN 2 Trenggalek">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Terima Kasih - {{ config('app.name', 'Laravel') }}</title>

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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .success-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.18);
            padding: 3rem;
            text-align: center;
            max-width: 600px;
            margin: 20px;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            animation: scaleIn 0.5s ease-out;
            box-shadow: 0 10px 25px rgba(40, 167, 69, 0.3);
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        .success-icon i {
            font-size: 3rem;
            color: white;
        }

        .success-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2d3748;
            margin-bottom: 1rem;
            animation: slideIn 0.6s ease-out 0.2s both;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .success-message {
            font-size: 1.2rem;
            color: #4a5568;
            margin-bottom: 2rem;
            animation: slideIn 0.6s ease-out 0.4s both;
        }

        .success-details {
            background: rgba(40, 167, 69, 0.1);
            border-left: 4px solid #28a745;
            padding: 1rem 1.5rem;
            margin: 2rem 0;
            border-radius: 0 10px 10px 0;
            animation: slideIn 0.6s ease-out 0.6s both;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 2rem;
            animation: slideIn 0.6s ease-out 0.8s both;
        }

        .btn-success-custom {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-success-custom:hover {
            background: linear-gradient(135deg, #218838 0%, #1ea085 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(40, 167, 69, 0.3);
            color: white;
            text-decoration: none;
        }

        .btn-secondary-custom {
            background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-secondary-custom:hover {
            background: linear-gradient(135deg, #5a6268 0%, #495057 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(108, 117, 125, 0.3);
            color: white;
            text-decoration: none;
        }

        .additional-info {
            margin-top: 2rem;
            padding: 1.5rem;
            background: rgba(78, 115, 223, 0.1);
            border-radius: 15px;
            animation: slideIn 0.6s ease-out 1s both;
        }

        .info-item {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0.5rem 0;
            color: #4a5568;
        }

        .info-item i {
            color: #4e73df;
            margin-right: 0.5rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .success-container {
                padding: 2rem;
                margin: 10px;
            }

            .success-title {
                font-size: 2rem;
            }

            .success-message {
                font-size: 1.1rem;
            }

            .action-buttons {
                flex-direction: column;
            }
        }

        /* Confetti animation */
        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border-radius: 50%;
            animation: confetti-fall 3s linear;
            z-index: 1;
        }

        @keyframes confetti-fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <!-- Success Icon -->
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>

        <!-- Success Title -->
        <h1 class="success-title">Terima Kasih!</h1>

        <!-- Success Message -->
        <p class="success-message">
            Data buku tamu Anda telah berhasil tersimpan.<br>
            Kami sangat menghargai kunjungan Anda ke MTsN 2 Trenggalek.
        </p>

        <!-- Success Details -->
        <div class="success-details">
            <p class="mb-0">
                <i class="fas fa-info-circle mr-2"></i>
                <strong>Informasi:</strong> Data Anda akan segera diproses oleh petugas kami.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="{{ route('public.survei-kepuasan') }}" class="btn-success-custom">
                <i class="fas fa-star mr-2"></i>
                Isi Survei Kepuasan
            </a>
            <a href="{{ url('/') }}" class="btn-secondary-custom">
                <i class="fas fa-home mr-2"></i>
                Kembali ke Beranda
            </a>
        </div>

        <!-- Additional Information -->
        <div class="additional-info">
            <div class="info-item">
                <i class="fas fa-clock"></i>
                <span>Senin - Jumat: 07:00 - 12:30</span>
            </div>
            <div class="info-item">
                <i class="fas fa-phone"></i>
                <span>(0355) 631045</span>
            </div>
            <div class="info-item">
                <i class="fas fa-envelope"></i>
                <span>info@mtsnkampak.sch.id</span>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
            // Create confetti effect
            function createConfetti() {
                const colors = ['#f093fb', '#f5576c', '#4facfe', '#00f2fe', '#43e97b', '#38f9d7'];

                for (let i = 0; i < 30; i++) {
                    setTimeout(() => {
                        const confetti = $('<div class="confetti"></div>');
                        const color = colors[Math.floor(Math.random() * colors.length)];
                        confetti.css({
                            background: color,
                            left: Math.random() * 100 + '%',
                            animationDelay: Math.random() * 0.5 + 's',
                            animationDuration: (Math.random() * 2 + 2) + 's'
                        });
                        $('body').append(confetti);

                        setTimeout(() => confetti.remove(), 4000);
                    }, i * 100);
                }
            }

            // Start confetti after page load
            setTimeout(createConfetti, 500);

            // Add pulse animation to success icon
            $('.success-icon').addClass('animate-pulse');

            // Smooth scroll for buttons
            $('a').on('click', function(e) {
                if ($(this).attr('href').startsWith('#')) {
                    e.preventDefault();
                    const target = $($(this).attr('href'));
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                    }
                }
            });
        });
    </script>
</body>
</html>