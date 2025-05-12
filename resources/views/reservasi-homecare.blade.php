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
                transform: translateY(10px); /* Elemen sedikit turun */
            }
            to {
                opacity: 1;
                transform: translateY(0); /* Elemen kembali ke tempatnya */
            }
        }

        /* Background Blur */
        .background-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(10px); /* Blur background */
            z-index: 1; /* Di belakang form */
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
            width: 150px; /* Lebar kolom label */
            font-size: 14px;
            color: #333;
            text-align: left;
            margin-right: 10px;
        }

        .form-group input,
        .form-group select {
            flex: 1; /* Kotak input akan mengambil sisa ruang */
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
            white-space: nowrap;      /* Teks akan tetap dalam satu baris */
            text-overflow: ellipsis;  /* Tambahkan "..." jika teks dipotong */
        }

        .pernyataan input[type="checkbox"] {
            width: 18px;
            height: 18px;
            flex-shrink: 0; /* Pastikan checkbox tidak menyusut */
        }

        .pernyataan label {
            font-weight: bold;
            color: red;
            white-space: nowrap; /* Paksa teks tetap dalam satu baris */
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

    <script>
        const form = document.getElementById('reservasi-form');
        const inputs = form.querySelectorAll('input, select');
        const nextButton = document.getElementById('next-button');

        // Aktifkan tombol jika semua input terisi
        inputs.forEach(input => {
            input.addEventListener('input', () => {
                const allFilled = Array.from(inputs).every(i => i.value.trim() !== '');
                nextButton.disabled = !allFilled;
            });
        });

        // Aksi tombol Next
        nextButton.addEventListener('click', () => {
            form.submit();
        });

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
                date.setDate(today.getDate() + count);  // Tambahkan i hari ke tanggal sekarang

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
    </script>
</body>
</html>