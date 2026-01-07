@extends('layouts.admin.app') 

@section('title', 'Foody - Inventaris')

@section('content')


    <!-- Carousel Start -->
      <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
          <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                  <div class="carousel-item active">
                      <img class="w-100" src="{{ asset('assets/img/inventory1.jpg') }}" alt="Image">
                      <div class="carousel-caption">
                          <div class="container">
                              <div class="row justify-content-start">
                                  <div class="col-lg-7">
                                      <h1 class="display-2 mb-5 animated slideInDown">Sistem Informasi Inventaris Aset</h1>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <img class="w-100" src="{{ asset('assets/img/inventory3.jpg') }}" alt="Image">
                      <div class="carousel-caption">
                          <div class="container">
                              <div class="row justify-content-start">
                                  <div class="col-lg-7">
                                      <h1 class="display-2 mb-5 animated slideInDown">Sistem Informasi Inventaris Aset</h1>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                  data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                  data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
              </button>
          </div>
      </div>
    <!-- Carousel End -->

    <!-- Feature Start -->
    <div class="container-fluid bg-light bg-icon my-5 py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Statistik Inventaris</h1>
                <p>Ringkasan data inventaris aset perusahaan untuk memudahkan monitoring dan pengelolaan.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <div class="mb-4">
                            <i class="fa fa-box fa-3x text-primary"></i>
                        </div>
                        <h2 class="display-6 mb-3 text-primary">{{ $totalAset }}</h2>
                        <h4 class="mb-3">Total Aset</h4>
                        <p class="mb-4">Jumlah keseluruhan aset yang terdaftar dalam sistem inventaris, mencakup semua kategori dan kondisi aset yang dimiliki perusahaan.</p>
                        <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="{{ route('aset.index') }}">Lihat Detail</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <div class="mb-4">
                            <i class="fa fa-tags fa-3x text-secondary"></i>
                        </div>
                        <h2 class="display-6 mb-3 text-secondary">{{ $totalKategori }}</h2>
                        <h4 class="mb-3">Kategori Aset</h4>
                        <p class="mb-4">Pengelompokan aset berdasarkan jenis dan karakteristiknya untuk memudahkan klasifikasi dan pengelolaan inventaris secara sistematis.</p>
                        <a class="btn btn-outline-secondary border-2 py-2 px-4 rounded-pill" href="{{ route('kategori-aset.index') }}">Lihat Detail</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <div class="mb-4">
                            <i class="fa fa-map-marker-alt fa-3x text-primary"></i>
                        </div>
                        <h2 class="display-6 mb-3 text-primary">{{ $totalLokasi }}</h2>
                        <h4 class="mb-3">Lokasi Aset</h4>
                        <p class="mb-4">Informasi lokasi penyimpanan dan penempatan aset untuk memudahkan tracking dan monitoring distribusi aset di berbagai lokasi perusahaan.</p>
                        <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="{{ route('lokasi-aset.index') }}">Lihat Detail</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <div class="mb-4">
                            <i class="fa fa-tools fa-3x text-secondary"></i>
                        </div>
                        <h2 class="display-6 mb-3 text-secondary">{{ $totalPemeliharaan }}</h2>
                        <h4 class="mb-3">Pemeliharaan Aset</h4>
                        <p class="mb-4">Riwayat dan jadwal pemeliharaan aset untuk menjaga kondisi dan performa aset tetap optimal serta memperpanjang umur pakai aset.</p>
                        <a class="btn btn-outline-secondary border-2 py-2 px-4 rounded-pill" href="{{ route('pemeliharaan-aset.index') }}">Lihat Detail</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <div class="mb-4">
                            <i class="fa fa-exchange-alt fa-3x text-primary"></i>
                        </div>
                        <h2 class="display-6 mb-3 text-primary">{{ $totalMutasi }}</h2>
                        <h4 class="mb-3">Mutasi Aset</h4>
                        <p class="mb-4">Catatan perpindahan, penambahan, atau pengurangan aset untuk tracking perubahan kepemilikan dan lokasi aset secara transparan.</p>
                        <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="{{ route('mutasi-aset.index') }}">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->
@endsection