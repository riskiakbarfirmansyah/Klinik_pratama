<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <title>Reservasi - Kalisari Healthcare</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Instrument Sans', Arial, sans-serif;
            font-weight: 700;
            background: url('{{ asset("/image/khc_frontdesk.png") }}') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slide-up {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.8);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes slide-out {
            from {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
            to {
                opacity: 0;
                transform: translateY(-50px) scale(0.8);
            }
        }

        /* Background Blur */
        .background-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(10px);
            z-index: 1;
        }

        /* Container Form */
        .reservasi-container {
            position: relative;
            z-index: 2;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            padding: 40px 30px;
            max-width: 600px;
            width: 100%;
            animation: fade-in 1s ease-in-out;
        }

        .reservasi-container img.logo {
            max-width: 200px;
            height: auto;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin: 15px 0;
        }

        .form-group label {
            width: 150px;
            font-size: 14px;
            color: #333;
            text-align: left;
            margin-right: 10px;
        }

        .form-group input,
        .form-group select {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }

        .form-group select {
            appearance: none;
        }

        /* Tombol Next */
        .reservasi-container .btn-next {
            background-color: #67CED1;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            transition: all 0.3s;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .reservasi-container .btn-next:hover {
            background-color: #5BB3B8;
        }

        .reservasi-container .btn-next:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .pernyataan {
            display: flex;
            align-items: center;
            margin-top: 10px;
            margin-right: 1100px;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .pernyataan input[type="checkbox"] {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        .pernyataan label {
            font-weight: bold;
            color: red;
            white-space: nowrap;
        }

        /* Pop-up Notification Styles */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup-container {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            animation: slide-up 0.3s ease-out;
        }

        .popup-container.closing {
            animation: slide-out 0.3s ease-in;
        }

        .popup-icon {
            width: 80px;
            height: 80px;
            background: #4CAF50;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            position: relative;
        }

        .popup-icon::after {
            content: '✓';
            color: white;
            font-size: 40px;
            font-weight: bold;
        }

        .popup-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .popup-message {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .popup-button {
            background: #67CED1;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .popup-button:hover {
            background: #5BB3B8;
            transform: translateY(-2px);
        }

        /* Loading state */
        .btn-next.loading {
            background-color: #ccc;
            cursor: not-allowed;
            position: relative;
            color: transparent;
        }

        .btn-next.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border: 2px solid #fff;
            border-top: 2px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Blur Background -->
    <div class="background-overlay"></div>

    <!-- Reservasi Form -->
    <div class="reservasi-container">
        <!-- Gambar Logo -->
        <img src="{{ asset('/image/kalisari.png') }}" alt="Kalisari Healthcare" class="logo">

        <!-- Form -->
        <form id="reservasi-form" action="{{ route('reservasi.process') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_pasien">Nama</label>
                <input type="text" id="nama_pasien" name="nama_pasien" required>
            </div>
        
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" required>
            </div>
        
            <div class="form-group">
                <label for="no_hp">No. HP/WA</label>
                <input type="text" id="no_hp" name="no_hp" required>
            </div>
        
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
        
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="" disabled selected>Pilih</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
        
            <div class="form-group">
                <label for="poliklinik">Poliklinik</label>
                <input type="text" placeholder="HC/HOMECARE" id="poliklinik" name="poliklinik" required>
            </div>
        
            <div class="form-group">
                <label for="dokter">Dokter</label>
                <select id="dokter" name="dokter" required onchange="updateJamPraktek()">
                    <option value="" disabled selected>Pilih Dokter</option>
                    <option value="dr_salwa">dr. Salwa</option>
                    <option value="dr_ece">dr. Ece Yurika Wulandari</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="jaminan">Jaminan</label>
                <select id="jaminan" name="jaminan" required>
                    <option value="" disabled selected>Pilih Jaminan</option>
                    <option value="umum">Umum</option>
                    <option value="asuransi">Asuransi</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="tanggal_booking">Tanggal Booking</label>
                <select id="tanggal_booking" name="tanggal_booking" required>
                    <option value="" disabled selected>Pilih Tanggal</option>
                </select>
            </div>            
        
            <div class="form-group">
                <label for="jam_praktek">Jam Praktek</label>
                <select id="jam_praktek" name="jam_praktek" required>
                    <option value="" disabled selected>Pilih Jam</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="jam_kedatangan">Jam Kedatangan</label>
                <input type="text" placeholder="Sesuai Jam Praktek yang dipilih" id="jam_kedatangan" name="jam_kedatangan" required>
            </div>
        
            <div class="form-group">
                <label for="keluhan">Keluhan</label>
                <input type="text" id="keluhan" name="keluhan" required>
            </div>
        
            <div class="form-group pernyataan">
                <input type="checkbox" id="pernyataan" name="pernyataan" required>
                <label for="pernyataan" style="color: red; font-weight: bold;">Saya menyatakan data yang diisi adalah benar dan dapat dipertanggungjawabkan</label>
            </div>
        
            <button type="button" class="btn-next" id="next-button" disabled>Kirim</button>
        </form>        
    </div>

    <!-- Pop-up Notification -->
    <div class="popup-overlay" id="popup-overlay">
        <div class="popup-container" id="popup-container">
            <div class="popup-icon"></div>
            <div class="popup-title">Berhasil!</div>
            <div class="popup-message">Data yang diisi telah disimpan!</div>
            <button class="popup-button" onclick="closePopupAndRedirect()">OK</button>
        </div>
    </div>

    <script>
        const form = document.getElementById('reservasi-form');
        const inputs = form.querySelectorAll('input, select');
        const nextButton = document.getElementById('next-button');

        // Aktifkan tombol jika semua input terisi
        function checkFormValidity() {
            const allFilled = Array.from(inputs).every(i => i.value.trim() !== '');
            const pernyataanChecked = document.getElementById('pernyataan').checked;
            nextButton.disabled = !(allFilled && pernyataanChecked);
        }

        inputs.forEach(input => {
            input.addEventListener('input', checkFormValidity);
            input.addEventListener('change', checkFormValidity);
        });

        // Aksi tombol Next - UBAH MENJADI AJAX
        nextButton.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default form submission
            
            nextButton.classList.add('loading');
            nextButton.disabled = true;

            // Submit form menggunakan AJAX
            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (response.ok) {
                    // Berhasil - tampilkan pop-up
                    showPopup();
                } else {
                    throw new Error('Network response was not ok');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim data. Silakan coba lagi.');
                
                // Reset button state
                nextButton.classList.remove('loading');
                nextButton.disabled = false;
            });
        });

        function showPopup() {
            // Reset button state
            nextButton.classList.remove('loading');
            nextButton.disabled = false;
            
            const popupOverlay = document.getElementById('popup-overlay');
            popupOverlay.style.display = 'flex';
            
            // Reset animation
            const popupContainer = document.getElementById('popup-container');
            popupContainer.classList.remove('closing');
        }

        function closePopupAndRedirect() {
            const popupContainer = document.getElementById('popup-container');
            const popupOverlay = document.getElementById('popup-overlay');
            
            // Add closing animation
            popupContainer.classList.add('closing');
            
            // Hide popup after animation
            setTimeout(() => {
                popupOverlay.style.display = 'none';
                // Redirect ke halaman index - GANTI SESUAI ROUTE ANDA
                window.location.href = '{{ route("home.index") }}'; // atau route ke index.blade.php
            }, 300);
        }

        function updateJamPraktek() {
            const dokter = document.getElementById('dokter').value;
            const jamPraktek = document.getElementById('jam_praktek');

            // Reset opsi jam praktek
            jamPraktek.innerHTML = '<option value="" disabled selected>Pilih</option>';

            // Data jadwal praktek
            const jadwal = {
                dr_salwa: [
                    'Senin, 15.00-21.00 WIB',
                    'Selasa, 08.00-21.00 WIB',
                    'Kamis, 08.00-15.00 WIB',
                    'Jum\'at, 08.00-21.00 WIB',
                    'Sabtu, 08.00-21.00 WIB'
                ],
                dr_ece: [
                    'Senin, 08.00-15.00 WIB',
                    'Rabu, 08.00-21.00 WIB',
                    'Jum\'at, 08.00-15.00 WIB'
                ]
            };

            // Tambahkan opsi berdasarkan pilihan dokter
            if (jadwal[dokter]) {
                jadwal[dokter].forEach(function(jam) {
                    const option = document.createElement('option');
                    option.value = jam;
                    option.textContent = jam;
                    jamPraktek.appendChild(option);
                });
            }
        }

        // Update jam kedatangan saat jam praktek dipilih
        document.getElementById('jam_praktek').addEventListener('change', function() {
            const jamKedatangan = document.getElementById('jam_kedatangan');
            jamKedatangan.value = this.value;
        });

        function formatDate(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        // Fungsi untuk mengisi opsi tanggal di dropdown
        function populateBookingDates() {
            const select = document.getElementById('tanggal_booking');
            const today = new Date();

            let count = 0;
            while (count < 7) {
                const date = new Date(today);
                date.setDate(today.getDate() + count);

                // Skip hari Minggu (0 adalah kode untuk hari Minggu)
                if (date.getDay() === 0) {
                    count++;
                    continue;
                }

                const option = document.createElement('option');
                option.value = formatDate(date);
                option.textContent = date.toLocaleDateString('id-ID', {
                    weekday: 'long',
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                });

                select.appendChild(option);
                count++;
            }
        }

        // Panggil fungsi untuk mengisi dropdown saat halaman dimuat
        document.addEventListener('DOMContentLoaded', populateBookingDates);

        // Make functions global so they can be called from HTML
        window.showPopup = showPopup;
        window.closePopupAndRedirect = closePopupAndRedirect;
        window.updateJamPraktek = updateJamPraktek;
    </script>
</body>
</html>