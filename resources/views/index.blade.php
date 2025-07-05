<?php
    $klinikkk= "Antah";
    $mappp= "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.49177223431!2d106.85003697453266!3d-6.330269861939016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed8b9c14261b%3A0xbaca66ee48dd8659!2sKlinik%20Pratama%20Kalisari%20Healthcare!5e0!3m2!1sen!2sid!4v1738385250473!5m2!1sen!2sid";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>KHC</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"
        integrity="sha512-tVYBzEItJit9HXaWTPo8vveXlkK62LbA+wez9IgzjTmFNLMBO1BEYladBw2wnM3YURZSMUyhayPCoLtjGh84NQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles-index.css" rel="stylesheet" />
    <link href="{{ asset('img/logo_utama_kalisari.png') }}" rel="SHORTCUT ICON" />

    <!--captcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>



<body id="page-top" onload="initClock()">

    <!-- Elfsight WhatsApp Chat | Untitled WhatsApp Chat -->
    <script src="https://static.elfsight.com/platform/platform.js" async></script>
    <div class="elfsight-app-500168c1-753c-4664-a39d-4ca993794cbb" data-elfsight-app-lazy></div>

  <!------------------------------ loading loading spinner ------------------------------>
    <div class="spinner-wrapper text-light">
        <div class="spinner-border" role="status">
        </div>
      </div>

    <style>
        .spinner-wrapper {
            background-color: #58D1D7;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.2s;
        }
        .spinner-border {
            height: 66px;
            width: 66px;
        }
    </style>
    <script>
        const spinnerWrapperEl = document.querySelector('.spinner-wrapper');
        window.addEventListener('load', ()=> {
            spinnerWrapperEl.style.opacity = '0';
            setTimeout(()=> {
                spinnerWrapperEl.style.display = 'none';
            }, 200);
        })

    </script>
<!------------------------------ loading loading spinner ------------------------------>

<!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top shadow-lg" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">
                <img src="{{ asset('img/logo_kalisari.png') }}" style="float:left; width:160px; height:65px;" />
            </a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <!--------------------------------------------------------Jam Navbar----------------------------------------------------------------------------------->
            <a href="#" class="nav-link disabled text-white">
                <!--digital clock start-->
                <div class="datetime ">
                    <div class="date">
                        <span id="dayname">Day</span>,
                        <span id="month">Month</span>
                        <span id="daynum">00</span>,
                        <span id="year">Year</span>
                    </div>
                    <div class="time">
                        <span id="hour">00</span>:
                        <span id="minutes">00</span>:
                        <span id="seconds">00</span>
                        <span id="period">AM</span>
                    </div>
                </div>
                <!--digital clock end-->
            </a>

            <!--------------------------------------------------------NAVBAR----------------------------------------------------------------------------------->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="#layanan">Layanan</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="#daftar">Pendaftaran</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Alamat</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ url('/tentangkami') }}">Tentang Kami</a>
                    </li>
                </ul>
            </div>

    </nav>

    <!--------------------------------------------------------Bagian Isi Konten Teratas----------------------------------------------------------------------------------->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="img/Group 23.png" alt="..." />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">Kalisari Healthcare</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-hospital"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            {{-- <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Muara Jawa</p> --}}
        </div>
    </header>
    <!--------------------------------------------------------Bagian Isi Konten----------------------------------------------------------------------------------->
    <div class="page-section portfolio" id="layanan">
    <div class="container">
        <!-- Layanan Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Layanan</h2>
        <!-- Icon Divider -->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-concierge-bell"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Custom 3D Styled Carousel -->
        <div id="layananCarousel" class="carousel-container">
            <div class="carousel-wrapper">
                <div class="carousel-card active">
                    <div class="card shadow-lg layanan-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Homecare</h5>
                            <p class="card-text">Layanan kesehatan di rumah untuk kenyamanan Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-card">
                    <div class="card shadow-lg layanan-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Poli Klinik</h5>
                            <p class="card-text">Pelayanan medis dengan berbagai spesialisasi.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-card">
                    <div class="card shadow-lg layanan-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Apotik</h5>
                            <p class="card-text">Ketersediaan obat dengan kualitas terjamin.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-card">
                    <div class="card shadow-lg layanan-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Telemedicine</h5>
                            <p class="card-text">Konsultasi medis online dari mana saja.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-card">
                    <div class="card shadow-lg layanan-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Poli Gigi</h5>
                            <p class="card-text">Perawatan kesehatan gigi profesional.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-card">
                    <div class="card shadow-lg layanan-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Vaksinasi</h5>
                            <p class="card-text">Layanan vaksinasi lengkap dan aman.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-card">
                    <div class="card shadow-lg layanan-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bidan</h5>
                            <p class="card-text">Pelayanan kesehatan ibu dan anak.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-controls">
                <button class="carousel-prev">&lt;</button>
                <button class="carousel-next">&gt;</button>
            </div>
        </div>
    </div>
    <div class="my-5"></div>
    <!-- Jadwal Praktek Section -->
    <section class="page-section bg-primary text-white mb-0" id="about">
    <div class="mt-5 text-center">
    <h2 class="text-uppercase text-white mb-5 fw-bold" style="font-size: 2.5rem;">Jadwal Praktek</h2>

    <div class="table-responsive d-flex justify-content-center">
        <table id="schedule-table" class="table custom-table">
            <thead>
                <tr>
                    <th style="font-size: 1.4rem;">Nama Dokter</th>
                    <th style="font-size: 1.4rem;">Poli</th>
                    <th style="font-size: 1.4rem;">Jadwal Praktek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokter as $row)
                    @php
                        $jadwalPraktek = $row->jadwal->jadwalpraktek ?? 'Belum ada Jadwal';
                    @endphp
                    <tr>
                        <td style="font-size: 1.25rem;">{{ $row->nama }}</td>
                        <td style="font-size: 1.25rem;">{{ $row->poli->name ?? '-' }}</td>
                        <td style="font-size: 1.25rem;">{{ $jadwalPraktek }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </section>
</div>

<!-- Services Section -->
<div id="layanan" class="container mt-5">
    <h2 class="text-center" style="color: #8EDBE6; margin-bottom: 40px; font-weight: bold;">Layanan Homecare</h2>
    <div class="row justify-content-center">
        <!-- Card 1 -->
        <div class="col-md-3 mb-4 d-flex justify-content-center">
            <div class="card text-center" style="width: 650px; background-color: #007B7F; border-radius: 15px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; height: 450px;">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img src="/image/layanan_umum.png" alt="Layanan Umum" style="width: 280px; height: auto; border-radius: 10px; margin-bottom: 20px;">
                    <p style="color: #8EDBE6; font-weight: bold;">Layanan Umum</p>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="col-md-3 mb-4 d-flex justify-content-center">
            <div class="card text-center" style="width: 650px; background-color: #007B7F; border-radius: 15px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; height: 450px;">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img src="/image/vitamin.png" alt="Suntik/Infus Vitamin" style="width: 280px; height: auto; border-radius: 10px; margin-bottom: 20px;">
                    <p style="color: #8EDBE6; font-weight: bold;">Suntik/Infus Vitamin</p>
                </div>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="col-md-3 mb-4 d-flex justify-content-center">
            <div class="card text-center" style="width: 650px; background-color: #007B7F; border-radius: 15px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; height: 450px;">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img src="/image/vaksin.png" alt="Vaksin" style="width: 280px; height: auto; border-radius: 10px; margin-bottom: 20px;">
                    <p style="color: #8EDBE6; font-weight: bold;">Vaksin</p>
                </div>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="col-md-3 mb-4 d-flex justify-content-center">
            <div class="card text-center" style="width: 650px; background-color: #007B7F; border-radius: 15px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; height: 450px;">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img src="/image/ambil_darah.png" alt="Pengambilan Darah" style="width: 280px; height: auto; border-radius: 10px; margin-bottom: 20px;">
                    <p style="color: #8EDBE6; font-weight: bold;">Pengambilan Darah (Lab)</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="page-section bg-primary text-white mb-0" id="about">
<div class="steps text-center py-5">
    <h2 class="mb-4" style="color:rgb(246, 246, 246);">Kalisari Homecare</h2>
    <div class="container text-center my-5">
        <div class="row">
            <div class="col-md-4 fade-in" style="animation-delay: 0s;">
    <div class="text-center">
        <img src="{{ asset('/image/hubungi_kami.png') }}" alt="Hubungi Kami" class="mb-3" style="width: 190px; height: auto;">
        <h5 class="mb-2">Hubungi Kami</h5>
        <p class="text-white fs-5">Anda dapat menghubungi kami dengan WhatsApp melalui nomor yang sudah tertera pada website kami.</p>
    </div>
</div>
<div class="col-md-4 fade-in" style="animation-delay: 0.3s;">
    <div class="text-center">
        <img src="{{ asset('/image/konsultasi.png') }}" alt="Konsultasi" class="mb-3" style="width: 190px; height: auto;">
        <h5 class="mb-2">Konsultasi</h5>
        <p class="text-white fs-5">Berikan keluhan Anda untuk pengambilan tindakan medis.</p>
    </div>
</div>
<div class="col-md-4 fade-in" style="animation-delay: 0.6s;">
    <div class="text-center">
        <img src="{{ asset('/image/tim_medis_datang.png') }}" alt="Tim Medis" class="mb-3" style="width: 190px; height: auto;">
        <h5 class="mb-2">Tim Medis Datang</h5>
        <p class="text-white fs-5">Tenaga medis kami akan datang untuk memberikan pelayanan kepada Anda.</p>
    </div>
</div>


        </div>
    </div>
</div>
</section>

<div class="why-homecare py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="d-flex justify-content-center align-items-center" style="height: 100%; min-height: 300px;">
                    <<div class="p-4" style="background-color: #007B7F; color: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 100%; max-width: 400px; text-align: justify;">
    <h3 class="text-center">Kenapa Kalisari Homecare?</h3>
    <ul class="list-unstyled mt-3 fs-5" style="line-height: 1.8;">
        <li>1. Tenaga yang terpercaya</li>
        <li>2. Perawatan Berkualitas</li>
        <li>3. Aman & Nyaman</li>
        <li>4. Berkomitmen & Dedikasi</li>
    </ul>
</div>

                </div>
            </div>
            <div class="col-md-6 text-center">
                <img src="/image/kenapa_homecare.png" class="card-img-top" alt="Hubungi Kami">
            </div>
        </div>
    </div>
</div>

<style>
    .custom-table {
        width: 85%;
        max-width: 1000px;
        background-color: #ffffff;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .custom-table thead {
        background: linear-gradient(to right, #00c6ff, #0072ff);
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .custom-table th,
    .custom-table td {
        padding: 24px;
        text-align: center;
        vertical-align: middle;
    }

    .custom-table tbody tr:nth-child(odd) {
        background-color: #eefaff;
    }

    .custom-table tbody tr:nth-child(even) {
        background-color: #d4f1ff;
    }

    .custom-table tbody tr:hover {
        background-color: #a8e4ff;
        transition: background-color 0.3s ease;
    }
</style>
</section>
@push('scripts')
<script>
    $(document).ready(function () {
        $('#schedule-table').DataTable({
            paging: false,
            searching: false,
            info: false,
            language: {
                "zeroRecords": "Tidak ditemukan jadwal",
                "emptyTable": "Tidak terdapat jadwal di tabel"
            }
        });
    });
</script>
@endpush

<style>
    .carousel-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        perspective: 1500px;
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
    }

    .carousel-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        position: relative;
        height: 300px;
    }

    .carousel-card {
        position: absolute;
        width: 20rem;
        transition: all 0.5s ease-in-out;
        opacity: 0.6;
        transform: scale(0.8) translateX(200%);
    }

    .carousel-card.active {
        opacity: 1;
        transform: scale(1) translateX(0);
        z-index: 10;
    }

    .layanan-card {
        border-radius: 15px;
        padding: 20px;
        background: linear-gradient(145deg, #f4f7f9, #e6eef3);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border: 1px solid #e0e0e0;
    }

    /* More detailed positioning for multiple cards */
    .carousel-card:nth-child(2) {
        transform: scale(0.9) translateX(80%) rotateY(-20deg);
        z-index: 5;
    }

    .carousel-card:nth-child(3) {
        transform: scale(0.9) translateX(-80%) rotateY(20deg);
        z-index: 5;
    }

    .carousel-card:nth-child(4) {
        transform: scale(0.8) translateX(-200%);
        z-index: 1;
    }

    .carousel-card:nth-child(5) {
        transform: scale(0.8) translateX(200%);
        z-index: 1;
    }

    .carousel-card:nth-child(6) {
        transform: scale(0.7) translateX(-300%);
        z-index: 0;
    }

    .carousel-card:nth-child(7) {
        transform: scale(0.7) translateX(300%);
        z-index: 0;
    }

    .carousel-controls {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .carousel-prev, .carousel-next {
        margin: 0 10px;
        padding: 10px 15px;
        background-color: #f0f4f8;
        color: #333;
        border: 1px solid #d0d7de;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .carousel-prev:hover, .carousel-next:hover {
        background-color: #e0e6eb;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const carousel = document.querySelector('.carousel-wrapper');
        const cards = carousel.querySelectorAll('.carousel-card');
        const prevButton = document.querySelector('.carousel-prev');
        const nextButton = document.querySelector('.carousel-next');
        let currentIndex = 0;

        function updateCarousel() {
            cards.forEach((card, index) => {
                card.classList.remove('active');

                // Calculate the position relative to the current index
                let offset = (index - currentIndex + cards.length) % cards.length;

                card.style.transform = getTransform(offset);
                card.style.opacity = getOpacity(offset);
                card.style.zIndex = getZIndex(offset);

                if (offset === 0) {
                    card.classList.add('active');
                }
            });
        }

        function getTransform(offset) {
            switch(offset) {
                case 0: return 'scale(1) translateX(0)';
                case 1: return 'scale(0.9) translateX(80%) rotateY(-20deg)';
                case 2: return 'scale(0.9) translateX(-80%) rotateY(20deg)';
                case 3: return 'scale(0.8) translateX(-200%)';
                case 4: return 'scale(0.8) translateX(200%)';
                case 5: return 'scale(0.7) translateX(-300%)';
                case 6: return 'scale(0.7) translateX(300%)';
                default: return 'scale(0.7) translateX(300%)';
            }
        }

        function getOpacity(offset) {
            switch(offset) {
                case 0: return '1';
                case 1:
                case 2: return '0.8';
                default: return '0.6';
            }
        }

        function getZIndex(offset) {
            switch(offset) {
                case 0: return '10';
                case 1:
                case 2: return '5';
                case 3:
                case 4: return '1';
                default: return '0';
            }
        }

        nextButton.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % cards.length;
            updateCarousel();
        });

        prevButton.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + cards.length) % cards.length;
            updateCarousel();
        });

        // Initial setup
        updateCarousel();
    });
</script>
    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
        <!-- Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-white">Pendaftaran</h2>

        <!-- Icon Divider -->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-pencil"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- Horizontal Buttons -->
        <div class="row justify-content-center text-center g-3">
            <!-- Daftar Sebagai Pasien -->
            <div class="col-lg-3 col-md-6">
                <button class="btn btn-xl btn-outline-light w-100" data-bs-toggle="modal" data-bs-target="#daftarPasien">
                    <i class="fas fa-book me-2"></i>
                    Daftar Pasien
                </button>
            </div>

            <!-- Cek Antrian -->
            <div class="col-lg-3 col-md-6">
                <a class="btn btn-xl btn-outline-light w-100" href="/antrian-pasien">
                    <i class="fas fa-users me-2"></i>
                    Cek Antrian
                </a>
            </div>

            <!-- Masuk -->
            <div class="col-lg-3 col-md-6">
                <a class="btn btn-xl btn-outline-light w-100" href="/dashboard">
                    <i class="fas fa-user me-2"></i>
                    Masuk
                </a>
            </div>

            <!-- Reservasi Homecare -->
            <div class="col-lg-3 col-md-6">
                <a class="btn btn-xl btn-outline-light w-100" href="{{ route('reservasi.homecare') }}">
                    <i class="fas fa-home me-2"></i>
                    Homecare
                </a>
            </div>
        </div>
    </div>
</section>

    <!--------------------------------------------------------Kontak Klinik----------------------------------------------------------------------------------->
    <section class="page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">ALAMAT</h2>
            <!-- Icon Divider-->

            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-map"></i></div>
                <div class="divider-custom-line"></div>
            </div>


            <div class="google-map"><iframe frameborder="0" style="border:0" width="100%" height="250"
                    src=<?php echo $mappp; ?> allowfullscreen=""></iframe></div>


            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-map"></i></div>
                <div class="divider-custom-line"></div>
            </div>
        </div>
    </section>

    <!--------------------------------------------------------Footer----------------------------------------------------------------------------------->
    <footer class="footer text-center">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Footer Social Icons Only -->
            <div class="col-lg-4 mb-4">
                <h4 class="text-uppercase mb-4">Media Social</h4>
                <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/kalisarihealthcare/?hl=en"><i class="fab fa-fw fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>

    <!--------------------------------------------------------copyright----------------------------------------------------------------------------------->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Powered by &copy; Klinik Pratama</small></div>
    </div>

    <!-- Daftar Pasien Modal -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="daftarPasien" tabindex="-1" aria-labelledby="daftarPasienLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg relative w-auto pointer-events-none" role="document">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div
                    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLgLabel">
                        Daftar Sebagai Pasien
                    </h5>
                    <button type="button"
                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pasien.store') }}" method="post">
                    @csrf
                    <input type="hidden" value="1" name="daftarPasien">
                    <div class="modal-body relative p-4">
                        <a href="pasien-lama">
                        <img src="{{ asset('img/tombol-pasienlama.png') }}" style=”float:left;
                                width="355";height="255" /></a>

                        <a href="#">
                        <img src="{{ asset('img/tombol-pasienbaru.png') }}" style=”float:left;
                                width="255";height="155" data-bs-toggle="modal"
                                data-bs-target="#daftarPasienbaru"/></a>
                        {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#daftarPasienbaru">Pasien Baru?</button> --}}
                    </div>
                    <div class="modal-footer">

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Antrian -->
    <!-- Daftar Pasien Modalllllllllllll -->

<!-- Modal -->
<div class="modal fade" id="daftarPasienbaru" tabindex="-1" role="dialog" aria-labelledby="daftarPasienbaruLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <label class="col-sm-5 col-form-label"><a href="pasien-lama" type="button"
                class="btn btn-warning">Pasien Lama klik disini</a></label>

        </div>
        <div class="modal-body">
            <form action="{{ route('pasien.store') }}" method="post">
                @csrf
                <input type="hidden" value="1" name="daftarPasien">

            <!--------------------------------------------------------pasien lama----------------------------------------------------------------------------------->
            <div class="form-group row">

                <div class="col-sm">
                </div>
            </div>
            <hr class="sidebar-divider d-none d-md-block">
            <h4>Pasien Baru, Lengkapi data dibawah ini</h4>
            <h6 style="color:RED;">*Semua Form WAJIB diisi, mohon periksa data anda dengan benar</h6>
            <!--------------------------------------------------------Nama----------------------------------------------------------------------------------->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm">
                    <input type="text" class="form-control" name="Nama" placeholder="Nama"
                        required oninvalid="this.setCustomValidity('nama tidak boleh kosong')"
                        oninput="setCustomValidity('')">
                </div>
            </div>
            <!--------------------------------------------------------Alamat----------------------------------------------------------------------------------->
            <div class="form-group row mt-2">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm">
                    <input type="text" class="form-control" name="Alamat" placeholder="Alamat"
                        required oninvalid="this.setCustomValidity('alamat masih kosong')"
                        oninput="setCustomValidity('')">
                </div>
            </div>

            <script>
                selDate=(e)=>
                {
                    this.setState({date1:e.target.value})
                }
                render()
                disableDates=()=>
                {
                    var today, ,mm,yyyy;
                    today=new Date();
                    dd=today.getDate()+1;
                    mm=today.getMonth()+1;
                    yyyy=today.getFullYear();
                    return mm+ "-" +dd+ "-"+yyyy;
                }

                </script>

            <!--------------------------------------------------------Lahir----------------------------------------------------------------------------------->
            <div class="form-group row mt-2">
                <label class="col-sm-2 col-form-label">Lahir</label>
                <div class="col-sm">
                    <input type="date" class="form-control" min={this.disableDates()} onchange={this.selDate} name="Lahir" placeholder="Lahir"
                        required oninvalid="this.setCustomValidity('tanggal lahir tidak boleh kosong')"
                        oninput="setCustomValidity('')">
                </div>
            </div>


            <!--------------------------------------------------------NIK----------------------------------------------------------------------------------->
            <div class="form-group row mt-2">
                <label class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm">
                    <input type="tel" class="form-control" id="nonik" name="NIK"
                        placeholder="NIK" required min="0" minlength="16" maxlength="16"
                        oninvalid="this.setCustomValidity('Nomer induk harus berupa Angka')"
                        oninput="setCustomValidity('16 digit')">
                </div>
            </div>


            <!--------------------------------------------------------Kelamin----------------------------------------------------------------------------------->

            <div class="form-group row mt-2">
                <label class="col-form-label col-sm-2 pt-0">Jenis Kelamin</label>
                <div class="col-sm">
                    <select name="Kelamin" class="form-control " required
                        oninvalid="this.setCustomValidity('jenis kelamin tidak boleh kosong')"
                        oninput="setCustomValidity('')">

                        <option selected value="">pilih...</option>
                        <option value="laki-laki">Laki-laki
                        </option>
                        <option value="perempuan">Perempuan
                        </option>
                    </select>
                </div>
            </div>

            <!--------------------------------------------------------Telepon----------------------------------------------------------------------------------->
            <div class="form-group row mt-2">
                <label class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm">
                    <input type="tel" class="form-control" id="notelp" name="Telepon"
                        placeholder="Nomer Telepon (aktif)" minlength="4" maxlength="13"
                        oninvalid="this.setCustomValidity('nomer telepon harus berupa Angka')"
                        oninput="setCustomValidity('')" required>
                </div>
            </div>


            <!--------------------------------------------------------Agama----------------------------------------------------------------------------------->

            <div class="form group row mt-2">
                <label class="col-form-label col-sm-2 pt-0">Agama</label>
                <div class="col-sm">
                    <select name="Agama" class="form-control" required
                        oninvalid="this.setCustomValidity('agama tidak boleh kosong')"
                        oninput="setCustomValidity('')">
                        <option selected value="">-</option>
                        <option value="islam">Islam</option>
                        <option value="protestan">Kristen
                            Protestan
                        </option>
                        <option value="katolik">Kristen Katolik
                        </option>
                        <option value="hindu">Hindu</option>
                        <option value="buddha">Buddha</option>
                        <option value="konghucu">Konghucu
                        </option>
                    </select>
                </div>
            </div>
            <!--------------------------------------------------------Pendidikan----------------------------------------------------------------------------------->
            <div class="form-group row mt-2">
                <label class="col-form-label col-sm-2 pt-0">Pendidikan</label>
                <div class="col-sm">
                    <select name="Pendidikan" class="form-control ">
                        <option value="-">-</option>
                        <option value="sltp/sd-smp">SLTP / SD-SMP</option>
                        <option value="slta/sma">SLTA / SMA</option>
                        <option value="sarjana">Sarjana</option>
                    </select>
                </div>
            </div>

            <!--------------------------------------------------------Pekerjaan----------------------------------------------------------------------------------- -->
            <div class="form-group row mt-2">
                <label class="col-sm-2 col-form-label">Pekerjaan</label>
                <div class="col-sm">
                    <input type="text" class="form-control" name="Pekerjaan"
                        placeholder="Isi '-' jika belum/tidak bekerja" required
                        oninvalid="this.setCustomValidity('Isi  -  jika belum/tidak bekerja')"
                        oninput="setCustomValidity('')">
                </div>
            </div>

            <br>
            <br>
            <hr class="sidebar-divider d-none d-md-block">
            <!--------------------------------------------------------pilih layanan----------------------------------------------------------------------------------- -->
            <div class="form-group row mt-2">
                <label class="col-form-label col-sm-2 pt-0">Layanan</label>
                <div class="col-sm">
                    <select name="layanan" class="form-control " required
                        oninvalid="this.setCustomValidity('pilih layanan dahulu')"
                        oninput="setCustomValidity('')">
                        <option value="">pilih layanan...</option>
                        <option value="Umum">Umum</option>
                        <option value="Asuransi">Asuransi</option>
                    </select>
                </div>
            </div>
            <!--------------------------------------------------------rekam medis----------------------------------------------------------------------------------- -->
            <div class="form-group row mt-2">
                <label class="col-sm-2 col-form-label">Keluhan</label>
                <div class="col-sm">
                    {{-- <input type="text" class="form-control" name="RekamMedis"
                        placeholder="Anda sakit apa, dan sudah berapa lama?"> --}}
                    <textarea type="text" name="RekamMedis" class="form-control" cols="30" rows="5"
                        placeholder="Jelaskan keluhan anda, dan sudah berapa lama?" required
                        oninvalid="this.setCustomValidity('jelaskan dahulu...')" oninput="setCustomValidity('')"></textarea>
                </div>
            </div>

            <!-- Pilih Dokter -->
<div class="form-group row mt-2">
    <label class="col-form-label col-sm-2 pt-0">Dokter</label>
    <div class="col-sm">
        <select name="doktor" class="form-control" required
            oninvalid="this.setCustomValidity('Silahkan pilih dokter yang tersedia')"
            oninput="setCustomValidity('')">

            <option value="">pilih dokter...</option>

            @foreach ($dokter as $row)
                @php
                    $jadwal = $row->jadwal;
                    $jadwalPraktek = $jadwal->jadwalpraktek ?? 'Belum ada Jadwal';
                    $isDisabled = in_array($jadwalPraktek, ['LIBUR', 'CUTI']);
                @endphp
                <option value="{{ $row->id }}" {{ $isDisabled ? 'disabled' : '' }}>
                    {{ $row->nama }}
                    ({{ $row->poli->name ?? '-' }}) |
                    {{ $jadwalPraktek }}
                </option>
            @endforeach
        </select>
    </div>
</div>


            <!--------------------------------------------------------pilih dokter----------------------------------------------------------------------------------- -->
            <div class="mt-2 d-flex justify-content-center" required>
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
            </div>
        </div>
        <div class="modal-footer">
            <input type="checkbox" id="check" onclick="enable()">
<label style="color:RED;"> Data yang diisi Benar</label><br>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            <button id="btn" disabled="True" type="submit" class="btn btn-primary">Daftar</button>
        </div>
    </form>
      </div>
    </div>
  </div>
    <!-- Daftar Pasien Modal -->

    <!-- Antrian -->


    <!--------------------------------------------------------modal kartu antrian----------------------------------------------------------------------------------->
    <div class="modal fade" id="antrian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="antrianLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div id="kartuantrian">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            <img src="{{ asset('img/logo.png') }}" style=”float:left;
                                width="55";height="55"” />Klinik {{ env('APP_NAME') }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="h3">Nomor Antrian : <span
                                class="text-primary">{{ Session::has('nomorAntrian') ? Session::get('nomorAntrian') : '' }}</span>
                        </p>
                        <p class="h3">Atas Nama : <span
                                class="text-primary">{{ Session::has('nama') ? Session::get('nama') : '' }}</span></p>
                        <p>Daftar pada jam : <span
                                class="text-primary">{{ Session::has('timestamps') ? Session::get('timestamps') : '' }}</span>
                            </p>

                        <!-- estimasi tunggu jam -->
                            <p>Mohon Tunggu Jam : <span
                                    class="h3 text-primary">{{ Session::has('jadwalkedatangan') ? Session::get('jadwalkedatangan') : '' }}</span>
                            </p>


                    </div>
                    <div class="modal-footer">
                        <p>Tanggal : <span
                                class="text-primary">{{ Session::has('tanggaldaftar') ? Session::get('tanggaldaftar') : '' }}</span>
                        </p>

                        <a type="button" class="btn btn-secondary" href="/antrian-pasien">
                            <i class="fas fa-users me-2"></i>
                            Cek Antrian
                        </a>
                        <button type="button" class="btn btn-primary" id="download">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="modal fade" id="error" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="antrianLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="kartuantrian">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <img src="{{ asset('img/logo.png') }}" style="float:left; width:55px; height:55px;" />
                        Klinik {{ env('APP_NAME') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($errors->all() as $item)
                        <div class="alert alert-danger" role="alert">
                            {{ $item }}
                        </div>
                    @endforeach
                    <div class="mb-3">
                        <div class="g-recaptcha" data-sitekey="6Ld2s_0qAAAAANXRLM_c5p5dBZwqT_VeeCqUMFbH"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--------------------------------------------------------Bootstrap JS----------------------------------------------------------------------------------->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!--------------------------------------------------------modal antrian----------------------------------------------------------------------------------->
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#error').modal('show')
            });
        </script>
    @endif

        <!-- Fungsi checklist / checkbox daftar -->
<script>
    function enable(){
    var check = document.getElementById("check");
    var btn = document.getElementById("btn");
    if (check.checked) {
    btn.removeAttribute("disabled");
    } else {
    btn.disabled = "true";
    }
    }
    </script>

    <script>
        @if (Session::has('nomorAntrian'))
            $(document).ready(function() {
                $('#antrian').modal('show')
            });
        @endif
    </script>
    <!--------------------------------------------------------fungsi inputan angka/number only----------------------------------------------------------------------------------->
    <script>
        function setInputFilter(textbox, inputFilter, errMsg) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(
                function(event) {
                    textbox.addEventListener(event, function(e) {
                        if (inputFilter(this.value)) {
                            // Accepted value
                            if (["keydown", "mousedown", "focusout"].indexOf(e.type) >= 0) {
                                this.classList.remove("input-error");
                                this.setCustomValidity("");
                            }
                            this.oldValue = this.value;
                            this.oldSelectionStart = this.selectionStart;
                            this.oldSelectionEnd = this.selectionEnd;
                        } else if (this.hasOwnProperty("oldValue")) {
                            // Rejected value - restore the previous one
                            this.classList.add("input-error");
                            this.setCustomValidity(errMsg);
                            this.reportValidity();
                            this.value = this.oldValue;
                            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                        } else {
                            // Rejected value - nothing to restore
                            this.value = "";
                        }
                    });
                });
        }

        setInputFilter(document.getElementById("nonik"), function(value) {
            return /^-?\d*$/.test(value);
        }, "Isi dengan Angka");
        setInputFilter(document.getElementById("notelp"), function(value) {
            return /^-?\d*$/.test(value);
        }, "Isi dengan Angka");
    </script>

    <!--------------------------------------------------------fungsi jam----------------------------------------------------------------------------------->
    <script type="text/javascript">
        function updateClock() {
            var now = new Date();
            var dname = now.getDay(),
                mo = now.getMonth(),
                dnum = now.getDate(),
                yr = now.getFullYear(),
                hou = now.getHours(),
                min = now.getMinutes(),
                sec = now.getSeconds(),
                pe = "AM";

            if (hou >= 12) {
                pe = "PM";
            }
            if (hou == 0) {
                hou = 12;
            }
            if (hou > 12) {
                hou = hou - 12;
            }

            Number.prototype.pad = function(digits) {
                for (var n = this.toString(); n.length < digits; n = 0 + n);
                return n;
            }

            var months = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var week = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
            var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
            var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
            for (var i = 0; i < ids.length; i++)
                document.getElementById(ids[i]).firstChild.nodeValue = values[i];
        }

        function initClock() {
            updateClock();
            window.setInterval("updateClock()", 1);
        }
    </script>

    <!--------------------------------------------------------fungsi download kartu antrian----------------------------------------------------------------------------------->
    <script>
        document.getElementById("download").addEventListener("click", function() {
            const imgName = prompt("Input nama gambar yang akan diunduh: ")
            html2canvas(document.querySelector('#kartuantrian')).then(function(canvas) {

                console.log(canvas);
                saveAs(canvas.toDataURL(), imgName + '.jpg');
            });
        });

        function saveAs(uri, filename) {
            var link = document.createElement('a');
            if (typeof link.download === 'string') {
                link.href = uri;
                link.download = filename;
                //Firefox requires the link to be in the body
                document.body.appendChild(link);
                //simulate click
                link.click();
                //remove the link when done
                document.body.removeChild(link);
            } else {
                window.open(uri);
            }
        }
    </script>
</body>
</html>
