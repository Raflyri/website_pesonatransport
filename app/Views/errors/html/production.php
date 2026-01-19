<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Kesalahan Sistem - Pesona Trans</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="<?= base_url(get_setting('site_icon', 'favicon.ico')) ?>?v=<?= time() ?>">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e0eaFC 0%, #cfdef3 100%); /* Soft Blue Gradient */
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* Dekorasi Background (Bulatan abstrak) */
        .bg-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
            animation: float 10s infinite ease-in-out;
        }
        .shape-1 {
            width: 300px;
            height: 300px;
            background: rgba(13, 110, 253, 0.2); /* Primary Blue transparent */
            top: -50px;
            left: -50px;
        }
        .shape-2 {
            width: 400px;
            height: 400px;
            background: rgba(220, 53, 69, 0.15); /* Danger Red transparent */
            bottom: -100px;
            right: -100px;
            animation-delay: 5s;
        }

        /* Kartu Utama (Glassmorphism Effect) */
        .error-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 24px;
            padding: 3rem;
            max-width: 550px;
            width: 90%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        /* Ikon Animasi */
        .icon-wrapper {
            position: relative;
            display: inline-block;
            margin-bottom: 1.5rem;
        }
        .main-icon {
            font-size: 5rem;
            color: #ffc107; /* Warning Yellow */
            animation: pulse 3s infinite;
        }
        .gear-icon {
            position: absolute;
            font-size: 2.5rem;
            color: #6c757d;
            bottom: -5px;
            right: -10px;
            animation: spin 8s linear infinite;
        }

        h1 {
            font-weight: 700;
            color: #343a40;
            margin-bottom: 0.5rem;
        }

        p {
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .btn-custom {
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .btn-primary-custom {
            background: #0d6efd;
            border: none;
            color: white;
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
        }
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.4);
            background: #0b5ed7;
        }

        .btn-outline-custom {
            border: 2px solid #dee2e6;
            color: #6c757d;
            background: transparent;
        }
        .btn-outline-custom:hover {
            border-color: #0d6efd;
            color: #0d6efd;
            background: white;
        }

        /* Animations */
        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(20px, 40px); }
        }
        @keyframes spin { 100% { transform: rotate(360deg); } }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>

    <div class="bg-shape shape-1"></div>
    <div class="bg-shape shape-2"></div>

    <div class="container d-flex justify-content-center">
        <div class="error-card">
            <div class="icon-wrapper">
                <i class="fas fa-bolt main-icon text-warning"></i>
                <i class="fas fa-cog gear-icon"></i>
            </div>

            <h1>Oops, Ada Kendala.</h1>
            <p>
                Sistem kami sedang mengalami sedikit gangguan teknis. <br>
                Jangan khawatir, tim kami sudah mengetahuinya dan sedang memperbaikinya.
            </p>

            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="javascript:location.reload()" class="btn btn-outline-custom btn-custom text-decoration-none">
                    <i class="fas fa-sync-alt me-2"></i> Coba Lagi
                </a>
                
                <a href="/" class="btn btn-primary-custom btn-custom text-decoration-none">
                    <i class="fas fa-home me-2"></i> Kembali ke Home
                </a>
            </div>

            <div class="mt-4 pt-3 border-top">
                <small class="text-muted" style="font-size: 0.75rem;">
                    &copy; <?= date('Y') ?> Pesona Adi Batara.
                </small>
            </div>
        </div>
    </div>

</body>
</html>