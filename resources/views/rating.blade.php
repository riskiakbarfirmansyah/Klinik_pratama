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

        .numeric-rating {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 8px;
            margin: 30px 0;
        }

        .numeric-rating input {
            display: none;
        }

        .numeric-rating label {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: #f0f0f0;
            color: #555;
            font-weight: bold;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 2px solid transparent;
        }

        .numeric-rating label:hover {
            background-color: #e0e0e0;
            transform: scale(1.05);
        }

        .numeric-rating input:checked + label {
            background-color: #3EB8BE;
            color: white;
            border: 2px solid #2a9599;
            transform: scale(1.1);
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
            box-shadow: none;
            border: 1px solid #ddd;
        }

        textarea.form-control {
            min-height: 120px;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #3EB8BE;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 18px;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.2s ease;
        }

        .btn-submit:hover {
            background-color: #2a9599;
        }

        .btn-submit i {
            font-size: 16px;
        }

        .rating-value-display {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #3EB8BE;
            margin: 15px 0;
            min-height: 36px;
        }

        .rating-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            color: #666;
            font-size: 14px;
        }

        .doctor-select {
            margin-top: 30px;
            margin-bottom: 20px;
        }

        .doctor-label {
            font-size: 18px;
            margin-bottom: 10px;
            color: #444;
        }

        .select-wrapper {
            position: relative;
        }

        .select-wrapper i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #3EB8BE;
            pointer-events: none;
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

                <div class="rating-value-display" id="ratingValueDisplay">
                    Pilih rating 1-10
                </div>

                <div class="numeric-rating">
                    @for($i = 1; $i <= 10; $i++)
                        <input type="radio" id="rating{{ $i }}" name="rating" value="{{ $i }}">
                        <label for="rating{{ $i }}">{{ $i }}</label>
                    @endfor
                </div>

                <div class="rating-labels">
                    <span>Sangat Tidak Puas</span>
                    <span>Sangat Puas</span>
                </div>

                <div class="mb-3 doctor-select">
                    <label for="dokter_id" class="form-label doctor-label">Pilih Dokter</label>
                    <div class="select-wrapper">
                        <select class="form-select form-control" id="dokter_id" name="dokter_id" required>
                            <option value="" selected disabled>-- Pilih Dokter --</option>
                            @foreach($dokters as $dokter)
                                <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                            @endforeach
                        </select>
                        <i class="fas fa-user-md"></i>
                    </div>
                </div>

                <div class="mb-3 mt-4">
                    <label for="comment" class="form-label comment-label">Berikan Komentar Anda (Opsional)</label>
                    <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Bagikan pengalaman Anda dengan kami..."></textarea>
                </div>

                <!-- Alert notifikasi validasi -->
                <div id="formAlert" class="alert alert-danger d-none" role="alert">
                    Silakan isi rating, pilih dokter, dan tulis komentar sebelum mengirim feedback.
                </div>

                <button type="submit" class="btn btn-submit" id="submitBtn" disabled>
                    Kirim Feedback <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- JavaScript untuk validasi -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ratingInputs = document.querySelectorAll('.numeric-rating input');
            const ratingDisplay = document.getElementById('ratingValueDisplay');
            const dokterSelect = document.getElementById('dokter_id');
            const commentTextarea = document.getElementById('comment');
            const submitBtn = document.getElementById('submitBtn');
            const formAlert = document.getElementById('formAlert');

            function validateForm() {
                const selectedRating = document.querySelector('.numeric-rating input:checked');
                const selectedDokter = dokterSelect.value !== '';
                const commentFilled = commentTextarea.value.trim() !== '';

                if (selectedRating && selectedDokter && commentFilled) {
                    submitBtn.disabled = false;
                    formAlert.classList.add('d-none');
                } else {
                    submitBtn.disabled = true;
                }
            }

            ratingInputs.forEach(input => {
                input.addEventListener('change', function() {
                    ratingDisplay.textContent = `Rating Anda: ${this.value}/10`;
                    validateForm();
                });
            });

            dokterSelect.addEventListener('change', validateForm);
            commentTextarea.addEventListener('input', validateForm);

            document.querySelector('form').addEventListener('submit', function(e) {
                const selectedRating = document.querySelector('.numeric-rating input:checked');
                const selectedDokter = dokterSelect.value !== '';
                const commentFilled = commentTextarea.value.trim() !== '';

                if (!(selectedRating && selectedDokter && commentFilled)) {
                    e.preventDefault();
                    formAlert.classList.remove('d-none');
                }
            });
        });
    </script>
</body>
</html>
