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
            <a href="#" class="nav-link disabled">
                <!--digital clock start-->
                <div class="datetime">
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
            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ url('/tentangkami') }}">Tentang Kami</a>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">Alamat</a>
        </li>
    </ul>
</div>

    </nav>

    <!--------------------------------------------------------Bagian Isi Konten Teratas----------------------------------------------------------------------------------->
    <header class="masthead text-white text-center"
        style="position: relative;
               height: 24rem;                         /* ~ h-96 */
               background: url('{{ asset('img/hero-bg.png') }}') center/cover no-repeat;">
  <!-- dark overlay -->
  <div class="position-absolute top-0 start-0 w-100 h-100"
       style="background-color: rgba(0,0,0,0.5);">
  </div>

  <!-- centered title -->
  <div class="container position-relative h-100 d-flex align-items-center justify-content-center">
    <h1 class="display-4 fw-bold">Tentang Kami</h1>
  </div>
</header>

    
    <!-- Tentang Kami + Visi & Misi -->
<section id="tentangkami" class="page-section py-5 bg-light">
  <div class="container">
    <!-- Tentang Kami -->
    <div class="row gx-5 gy-4 align-items-center mb-5">
      <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body p-4">
            <h2 class="h4 text-uppercase border-start border-3 border-primary ps-3 mb-4">Klinik Pratama Kalisari Healthcare</h2>
            <h3 class="h5 text-secondary mb-4 fst-italic"></h3>
            <p class="mb-3">Klinik Pratama Kalisari Healthcare (KHC) resmi berdiri pada tanggal 7 Januari 2024 sebagai penyelenggara pelayanan kesehatan yang berdedikasi, kami hadir dengan misi utama untuk memberikan pelayanan kesehatan yang prima dengan konsep kenyamanan dalam berobat dan harga yang terjangkau. Kami percaya bahwa akses terhadap pelayanan kesehatan berkualitas tidak seharusnya menjadi beban finansial yang berat bagi masyarakat.</p>
            <p class="mb-3">Dalam upaya kami untuk menciptakan kenyamanan dalam berobat, Klinik Pratama Kalisari Healthcare menawarkan fasilitas yang bermutu dan tenaga medis yang kompeten. Kami berkomitmen untuk memberikan pengalaman berobat yang ramah, mengutamakan keamanan dan keselamatan pasien.</p>
            <p class="mb-0">Kami juga berusaha menjalin kerjasama erat dengan perusahaan maupun asuransi, guna mempermudah akses masyarakat dalam mendapatkan layanan kesehatan. Dengan dukungan mitra yang kuat, kami berharap dapat memberikan manfaat maksimal bagi semua pihak, serta meningkatkan kesejahteraan masyarakat melalui pelayanan kesehatan yang terjangkau dan berkualitas.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <img src="{{ asset('img/clinic.jpg') }}"
             class="img-fluid rounded shadow-sm"
             alt="Pasien sedang diperiksa">
      </div>
    </div>

    <!-- Visi & Misi -->
    <div class="row gx-5 gy-4 align-items-center">
      <div class="col-lg-6 order-lg-2">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body p-4">
            <h2 class="h4 text-uppercase border-start border-3 border-primary ps-3 mb-3">Visi</h2>
            <p class="mb-4">Menjadi Fasilitas Kesehatan Komprehensif dan Mitra Terpercaya dalam Mewujudkan Kesehatan Optimal di Wilayah Jakarta Timur.</p>
            <hr>
            <h2 class="h4 text-uppercase border-start border-3 border-primary ps-3 mt-4 mb-3">Misi</h2>
            <ol class="mb-0 ps-4">
              <li>Memberikan pelayanan kesehatan yang terjangkau, berkualitas dan komprehensif kepada masyarakat.</li>
              <li>Edukasi kesehatan dan pencegahan penyakit melalui program promosi kesehatan.</li>
              <li>Menjalin kerjasama dengan mitra dan pihak terkait untuk meningkatkan aksesibilitas layanan kesehatan.</li>
              <li>Berpartisipasi dalam program tanggung jawab sosial.</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="col-lg-6 order-lg-1">
        <img src="{{ asset('img/doctor.jpg') }}"
             class="img-fluid rounded shadow-sm"
             alt="Staf klinik melayani pasien">
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
    <!-- Portfolio Modals-->

    <!-- Portfolio Modal 2-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" aria-labelledby="portfolioModal2"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Ruang Tunggu 1
                                </h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="img/dalam1.jpg" alt="..." />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4">======</p>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 3-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" aria-labelledby="portfolioModal3"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Halaman Parkiran
                                </h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="img/luar1.jpg" alt="..." />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4">======</p>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 4-->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" aria-labelledby="portfolioModal4"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Aktifitas
                                    Pendaftaran</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="img/dalam2.jpg" alt="..." />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4">======</p>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 5-->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" aria-labelledby="portfolioModal5"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Halaman Parkiran 2
                                </h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="img/luar3.jpg" alt="..." />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4">======</p>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

    <!-- Antrian -->
    <!-- Daftar Pasien Modalllllllllllll -->



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