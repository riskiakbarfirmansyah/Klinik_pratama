<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih | Klinik Feedback</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .thank-you-container {
            max-width: 800px;
            margin: 100px auto;
            padding: 20px;
        }
        
        .thank-you-card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            padding: 40px;
            text-align: center;
        }
        
        .thank-you-icon {
            font-size: 60px;
            color: #3EB8BE;
            margin-bottom: 20px;
        }
        
        .thank-you-title {
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }
        
        .thank-you-message {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }
        
        .btn-home {
            background-color: #3EB8BE;
            color: white;
            padding: 10px 25px;
            font-size: 16px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }
        
        .btn-home:hover {
            background-color: #339ea3;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container thank-you-container">
        <div class="thank-you-card">
            <div class="thank-you-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1 class="thank-you-title">Terima Kasih!</h1>
            <p class="thank-you-message">Feedback Anda sangat berarti bagi kami untuk meningkatkan pelayanan.</p>
            
            @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif
            
            <a href="{{ route('home') }}" class="btn btn-home">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>