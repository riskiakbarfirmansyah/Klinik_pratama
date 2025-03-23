<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Feedback</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .feedback-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        
        .feedback-card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            padding: 30px;
        }
        
        .feedback-title {
            text-align: center;
            color: #333;
            margin-bottom: 40px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }
        
        .feedback-title i {
            color: #3EB8BE;
            font-size: 28px;
        }
        
        .star-rating {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 30px 0;
        }
        
        .star-rating input {
            display: none;
        }
        
        .star-rating .fas {
            color: #FFD700 !important;
        }

        .star-rating label {
            font-size: 40px;
            color: #ccc;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .star-rating label:hover,
        .star-rating label:hover ~ label,
        .star-rating input:checked ~ label {
            color: #FFD700;
        }
        
        .feedback-question {
            font-size: 22px;
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        
        .comment-label {
            font-size: 18px;
            margin-bottom: 10px;
            color: #444;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 15px;
            min-height: 120px;
            box-shadow: none;
            border: 1px solid #ddd;
        }
        
        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #c1c7d0;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 18px;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-submit:hover {
            background-color: #adb5c1;
        }

        .btn-submit i {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container feedback-container">
        <div class="feedback-card">
            <h2 class="feedback-title">
                <i class="fas fa-link"></i> Klinik Feedback
            </h2>
            
            <form method="POST" action="{{ route('feedback.store') }}">
                @csrf
                
                <div class="feedback-question">
                    Bagaimana pengalaman Anda dengan pelayanan kami?
                </div>
                
                <div class="star-rating">
                    <input type="radio" id="star5" name="rating" value="1">
                    <label for="star5" class="far fa-star"></label>
                    
                    <input type="radio" id="star4" name="rating" value="2">
                    <label for="star4" class="far fa-star"></label>
                    
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3" class="far fa-star"></label>
                    
                    <input type="radio" id="star2" name="rating" value="4">
                    <label for="star2" class="far fa-star"></label>
                    
                    <input type="radio" id="star1" name="rating" value="5">
                    <label for="star1" class="far fa-star"></label>
                </div>
                
                <div class="mb-3">
                    <label for="comment" class="form-label comment-label">Berikan Komentar Anda (Opsional)</label>
                    <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Bagikan pengalaman Anda dengan kami..."></textarea>
                </div>
                
                <button type="submit" class="btn btn-submit">
                    Kirim Feedback <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- JavaScript untuk fungsionalitas bintang -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        // Dapatkan semua elemen input radio
        const starInputs = document.querySelectorAll('.star-rating input');
        // Dapatkan semua label bintang
        const starLabels = document.querySelectorAll('.star-rating label');
        
        // Fungsi untuk mewarnai bintang
        function updateStars(rating) {
            // Reset semua bintang ke kosong
            starLabels.forEach(label => {
                label.className = 'far fa-star';
            });
            
            // Isi bintang sampai rating yang dipilih
            for (let i = 0; i < rating; i++) {
                starLabels[i].className = 'fas fa-star';
            }
        }
        
        // Event listener untuk input radio
        starInputs.forEach(input => {
            input.addEventListener('change', function() {
                updateStars(this.value);
            });
        });
        
        // Event listener untuk hover
        starLabels.forEach((label, index) => {
            // Saat mouse masuk ke bintang
            label.addEventListener('mouseenter', function() {
                updateStars(index + 1);
            });
        });
        
        // Event listener untuk mouse meninggalkan area rating
        const ratingContainer = document.querySelector('.star-rating');
        ratingContainer.addEventListener('mouseleave', function() {
            // Cari rating yang dipilih
            const checkedInput = document.querySelector('.star-rating input:checked');
            
            if (checkedInput) {
                // Jika ada yang dipilih, perbarui bintang sesuai pilihan
                updateStars(checkedInput.value);
            } else {
                // Jika tidak ada yang dipilih, reset semua bintang
                starLabels.forEach(label => {
                    label.className = 'far fa-star';
                });
            }
        });
    });
    </script>
</body>
</html>