<title>Dashboard</title>
@extends('layouts.main')
@section('content')
    <!------------------------------------- Isi TOTAL HARIAN ----------------------------------->

    <div class="row pl-6">
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="bg-gradient-to-r from-green-200 to-green-400 rounded-lg shadow-lg p-4 border-l-8 border-green-600 hover:from-green-300 hover:to-green-500 transition duration-200">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Daftar Harian</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $countpasientoday }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="bg-gradient-to-r from-blue-200 to-blue-400 rounded-lg shadow-lg p-4 border-l-8 border-blue-600 hover:from-blue-300 hover:to-blue-500 transition duration-200">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Seluruh Pasien</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ count($pasien) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="bg-gradient-to-r from-yellow-200 to-yellow-400 rounded-lg shadow-lg p-4 border-l-8 border-yellow-600 hover:from-yellow-300 hover:to-yellow-500 transition duration-200">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Seluruh Pegawai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ count($pegawai) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="bg-gradient-to-r from-purple-200 to-purple-400 rounded-lg shadow-lg p-4 border-l-8 border-purple-600 hover:from-purple-300 hover:to-purple-500 transition duration-200">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Laporan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $laporan }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Ratings Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="bg-gradient-to-r from-orange-200 to-orange-400 rounded-lg shadow-lg p-4 border-l-8 border-orange-600 hover:from-orange-300 hover:to-orange-500 transition duration-200">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Rating Ulasan Pelanggan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $totalReviews > 0 ? number_format($averageRating, 1) : 'Belum ada ulasan' }}
                                    <small class="text-muted">({{ $totalReviews }} ulasan)</small>
                                </div>

                            </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
                <a href="{{ route('admin.reviews.index') }}" class="card-footer text-center text-primary">
                    <span>Lihat Semua Ulasan</span>
                    <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <canvas id="myChart" style="max-width:400px"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="myPie" style="max-width:400px"></canvas>
        </div>

        {{-- <div class="col-md-6">
            <canvas id="myPie2" style="max-width:400px"></canvas>
        </div> --}}

    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Powered by © KLINIK KALISARI HEALTHCARE 2025</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection