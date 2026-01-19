<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Halaman Tidak Ditemukan - Pesona Transport</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e0eaFC 0%, #cfdef3 100%);
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* Dekorasi Background */
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
            background: rgba(13, 110, 253, 0.2);
            top: -50px;
            left: -50px;
        }
        .shape-2 {
            width: 400px;
            height: 400px;
            background: rgba(220, 53, 69, 0.15);
            bottom: -100px;
            right: -100px;
            animation-delay: 5s;
        }

        /* Kartu Glassmorphism */
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

        /* Ikon Animasi Khusus 404 */
        .icon-wrapper {
            position: relative;
            display: inline-block;
            margin-bottom: 1.5rem;
        }
        .main-icon {
            font-size: 5rem;
            color: #0d6efd; /* Primary Blue */
            animation: float 4s infinite ease-in-out;
        }
        .sub-icon {
            position: absolute;
            font-size: 2.5rem;
            color: #ffc107; /* Warning Yellow */
            top: -10px;
            right: -15px;
            animation: pulse 2s infinite;
        }

        h1 {
            font-weight: 700;
            color: #343a40;
            margin-bottom: 0.5rem;
        }
        
        .error-code {
            font-size: 5rem;
            font-weight: 800;
            color: rgba(13, 110, 253, 0.05);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
            white-space: nowrap;
            pointer-events: none;
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

        /* Animations */
        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(0, -10px); }
        }
        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.7; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>

    <div class="bg-shape shape-1"></div>
    <div class="bg-shape shape-2"></div>

    <div class="container d-flex justify-content-center">
        <div class="error-card">
            <div class="error-code">404</div>

            <div class="icon-wrapper">
                <i class="fas fa-map-marked-alt main-icon"></i>
                <i class="fas fa-question-circle sub-icon"></i>
            </div>

            <h1>Wah, Nyasar Kak?</h1>
            <p>
                Halaman yang Kakak cari sepertinya sudah pindah alamat atau memang tidak ada. 
                Mari kita kembali ke jalan yang benar.
            </p>

            <a href="/" class="btn btn-primary-custom btn-custom text-decoration-none">
                <i class="fas fa-compass me-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>

</body>
</html>