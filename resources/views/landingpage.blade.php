<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- CSS Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="icon" href="{{ asset('assets/img/logo-1.png') }} " type="image/x-icon" />
    <title>Fam's Kost</title>
</head>

<body>
    <!-- Navbar -->
    <nav id="header" class="navbar navbar-expand-lg navbar-dark navbar-transparent position-fixed w-100">
        <div class="container">
            <a href="#home">
                {{-- <img src="{{ asset('assets/img/logo-1.png') }}" alt=""> --}}
            </a>
            {{-- <i class="bi bi-list mobile-nav-toggle"></i> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="bi bi-list mobile-nav-toggle"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mx-auto py-3">
                    <li class="nav-item">
                        <a class="nav-link scrollto active" href="#hero">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="#about">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="#facility">FACILITY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="#gallery">GALLERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="#pricing">PRICE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="#counts">DATA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="#contact">CONTACT</a>
                    </li>
                </ul>
                <div>
                    <a href="{{ route('login') }}" class="btn btn-primary">LOGIN</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- home section -->
    <section id="hero">

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                    <div data-aos="zoom-out">
                        <h1>Selamat Datang
                            Di <span>Fam's Kost.</span></h1>
                        <h2><span class="fw-bold">Cari kost tanpa ribet?</span> Kami punya solusinya! Dengan akses
                            mudah, lokasi strategis, dan harga terjangkau,
                            kosan kami siap memenuhi kebutuhan Anda.</h2>
                        <div class="text-center text-lg-start">
                            <button class="btn-get-started scrollto">For more information</button>
                            <a href="#about">
                                <img src="{{ asset('assets/img/arrow-right.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                    <img src="{{ asset('assets/img/house3.svg') }}" class="img-fluid animated" alt="">
                </div>
            </div>
            <img src="{{ asset('assets/img/layer.png') }}" alt=""
                class="accsent-img h-100 position-absolute top-0 start-0">
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>

    </section>
    <!-- End Hero -->

    <!-- about section -->
    <section id="about" class="about">
        <div class="container">

            <div class="row">
                <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch"
                    data-aos="fade-right">
                </div>

                <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5"
                    data-aos="fade-left">
                    <h3>Tentang Fam's Kost</h3>
                    <p>Fam's Kost adalah kos-kosan yang terletak di jalan Pinang Ranti
                        Barat no.9, Jakarta Timur yang memiliki beberapa keunggulan, diantaranya</p>

                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-bus"></i></div>
                        <h4 class="title"><a href="">Akses yang mudah</a></h4>
                        <p class="description">Fam's Kost memiliki lokasi yang strategis dekat dengan pusat
                            perbelanjaan,
                            akses mudah ke berbagai transportasi umum</p>
                    </div>

                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-money"></i></div>
                        <h4 class="title"><a href="">Harga terjangkau</a></h4>
                        <p class="description">Harga Fam's Kos lebih terjangkau,
                            dibandingkan dengan kos yang berada di sekitar Jakarta lainnya</p>
                    </div>

                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-home"></i></div>
                        <h4 class="title"><a href="">Fasilitas kos yang lumayan lengkap</a></h4>
                        <p class="description">Fam's Kost menyediakan fasilitas berupa meja, kursi, lemari dan
                            juga kasur, termasuk gratis listrik, air dan parkir kendaraan yang aman</p>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- facility section -->
    <section id="facility" class="overflow-hidden">
        <div class="container position-relative">
            <div class="row mb-5" data-aos="zoom-out">
                <div class="col-lg-9 col-md-12">
                    <div class="section-title" data-aos="fade-up">
                        <h5>Facility -<span>Some Facility from Our Kost</span></h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    {{-- <button class="facility-button">Lihat Semua..
                        <img src="{{ asset('assets/img/arrow_fcty.png') }}" alt="" class="ms-2">
                    </button> --}}
                </div>
            </div>

            <div class="container position-relative" data-aos="zoom-out" data-aos-delay="100">
                <div class="row swiper mySwiper">
                    <div class="col-12 d-flex justify-content-start swiper-wrapper">

                        <div class="card-facility  position-relative swiper-slide">
                            <img src="{{ asset('assets/img/kamar4.jpg') }}" alt="">

                            <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                    <h5>Kamar Suite</h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-facility  position-relative swiper-slide">
                            <img src="{{ asset('assets/img/kamar2.jpg') }}" alt="">

                            <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                    <h5>Kamar Standard</h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-facility  position-relative swiper-slide">
                            <img src="{{ asset('assets/img/parkiran.jpg') }}" alt="">

                            <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                    <h5>Parkiran</h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-facility position-relative swiper-slide">
                            <img src="{{ asset('assets/img/km1.jpg') }}" alt="">

                            <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                    <h5>Kamar Mandi</h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-facility position-relative swiper-slide">
                            <img src="{{ asset('assets/img/cctv.jpg') }}" alt="">

                            <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                                <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                    <h5>CCTV</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <button class="arrow-left translate-middle swiper-prev">
                    <img src="{{ asset('assets/img/arrowF-left.png') }}" alt="">
                </button>
                <button class="arrow-right translate-middle swiper-next">
                    <img src="{{ asset('assets/img/arrowF-right.png') }}" alt="">
                </button>
            </div>
        </div>
    </section>

    <!-- Preview Section -->
    <section id="gallery" class="gallery">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h5>Gallery Fam's Kost -<span>Some photos from Our Kost</span></h5>
            </div>

            <div class="row p-0 m-0" data-aos="fade-left">
                <div class="col-md-8 pb-3">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                        <a href="{{ asset('assets/img/haldepan.jpg') }}" class="gallery-lightbox">
                            <img src="{{ asset('assets/img/haldepan.jpg') }}" alt="" class="w-100 h-100"
                                loading="lazy">
                        </a>
                    </div>
                </div>
                <div class="col-md-4 pb-3 pl-2">
                    <div class="row">
                        <div class="col-md-12 pb-3">
                            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                                <a href="{{ asset('assets/img/kamar5.jpg') }}" class="gallery-lightbox">
                                    <img src="{{ asset('assets/img/kamar5.jpg') }}" alt=""
                                        class="w-100 h-100" loading="lazy">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                                <a href="{{ asset('assets/img/koridor3.jpg') }}" class="gallery-lightbox">
                                    <img src="{{ asset('assets/img/koridor3.jpg') }}" alt=""
                                        class="w-100 h-100" loading="lazy">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row p-0 m-0" data-aos="fade-left">
                <div class="col-md-4 pb-3 pl-2">
                    <div class="row">
                        <div class="col-md-12 pb-3">
                            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                                <a href="{{ asset('assets/img/cahaya.jpg') }}" class="gallery-lightbox">
                                    <img src="{{ asset('assets/img/cahaya.jpg') }}" alt=""
                                        class="w-100 h-100" loading="lazy">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                                <a href="{{ asset('assets/img/parkiran2.jpg') }}" class="gallery-lightbox">
                                    <img src="{{ asset('assets/img/parkiran2.jpg') }}" alt=""
                                        class="w-100 h-100" loading="lazy">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 pb-3">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                        <a href="{{ asset('assets/img/kamar3.jpg') }}" class="gallery-lightbox">
                            <img src="{{ asset('assets/img/kamar3.jpg') }}" alt="" class="w-100 h-100"
                                loading="lazy">
                        </a>
                    </div>
                </div>
            </div>

            <div class="row p-0 m-0" data-aos="fade-left">
                <div class="col-md-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                        <a href="{{ asset('assets/img/kasur.jpg') }}" class="gallery-lightbox">
                            <img src="{{ asset('assets/img/kasur.jpg') }}" alt="" class="w-100 h-100"
                                loading="lazy">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                        <a href="{{ asset('assets/img/kamar1.jpg') }}" class="gallery-lightbox">
                            <img src="{{ asset('assets/img/kamar1.jpg') }}" alt="" class="w-100 h-100"
                                loading="lazy">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                        <a href="{{ asset('assets/img/kor.jpg') }}" class="gallery-lightbox">
                            <img src="{{ asset('assets/img/kor.jpg') }}" alt="" class="w-100 h-100"
                                loading="lazy">
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Preview Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h5>Harga Kamar -<span>Our Pricing</span></h5>
            </div>

            <div class="row" data-aos="fade-left">
                <div class="col-lg-6 col-md-6">
                    <div class="box" data-aos="zoom-in" data-aos-delay="100">
                        <h3>Kamar Standard</h3>
                        <h4><sup>Rp</sup>800.000<span> / bulan</span></h4>
                        <div class="btn-wrap">
                            <a href="{{ route('register') }}" class="btn-buy font-bold">Order now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mt-4 mt-md-0">
                    <div class="box-featured" data-aos="zoom-in" data-aos-delay="200">
                        <h3>Kamar Suite</h3>
                        <h4><sup>Rp</sup>1.000.000<span> / bulan</span></h4>
                        <div class="btn-wrap">
                            <a href="{{ route('register') }}" class="btn-buy-featured font-bold">Order now</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Pricing Section -->

    <!-- Counts Section -->
    <section id="counts" class="counts">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-house"></i>
                        <span>{{ $jumlah_kamar }}</span>
                        <p>Jumlah kamar</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="bi bi-people"></i>
                        <span>{{ $jumlah_penghuni }}</span>
                        <p>Jumlah penghuni kos</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="bi bi-cash"></i>
                        <span>{{ $total_transactions }}</span>
                        <p>Jumlah transaksi</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="bi bi-person-circle"></i>
                        <span>{{ $total_admins }}</span>
                        <p>Jumlah admin kos</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
        <div class="container-fluid overlay h-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Membutuhkan
                            informasi lebih lanjut?
                            Hubungi kami!</h3>
                        <div class="info">
                            <h6>Contact</h6>
                            <div class="mb-3 d-flex align-items-center">
                                <div>
                                    <img src="{{ asset('assets/img/addres.png') }}" alt="">
                                </div>
                                <a href="#">Jl. Pinang Ranti I, RT.15/RW.1, Pinang Ranti, Kec. Makasar, Kota Jakarta Timur, Indonesia</a>
                            </div>
                            <div class="mb-3">
                                <img src="{{ asset('assets/img/telpon.png') }}" alt="">
                                <a href="#">088293918826</a>
                            </div>
                            <div class="mb-3">
                                <img src="{{ asset('assets/img/pesan.png') }}" alt="">
                                <a href="#">famskost@gmail.com</a>
                            </div>

                        </div>

                        <h6>Social Media</h6>
                        <a href="#" class="me-lg-3 me-1"><img src="{{ asset('assets/img/fb.png') }}"
                                alt=""></a>
                        <a href="#" class="me-lg-3 me-1"><img src="{{ asset('assets/img/tw.png') }}"
                                alt=""></a>
                        <a href="#" class="me-lg-3 me-1"><img src="{{ asset('assets/img/ig.png') }}"
                                alt=""></a>
                        <a href="#" class="thekost">Fam's Kost</a>
                    </div>

                    <div class="col-md-6">
                        <div class="" style="text-align: center;">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.8127371971427!2d106.87760827475117!3d-6.288328093700665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3c12f843a6b%3A0xe66bc9e0265690af!2sKost%20ibu%20dewi!5e0!3m2!1sid!2sid!4v1722415234671!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->

    <!-- ======= Footer ======= -->
    <footer class="d-flex align-items-center position-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-lg-start justify-content-center">
                    {{-- <img src="{{ asset('assets/img/logo-1.png') }}" alt=""> --}}
                    <a href="#" class="ms-2">Fam's Kost</a>
                </div>
                <div class="col-md-8 d-flex align-items-center justify-content-evenly justify-content-center">
                    <a href="#home">HOME</a>
                    <a href="#about">ABOUT</a>
                    <a href="#preview">FACILITY</a>
                    <a href="#pricing">GALERY</a>
                    <a href="#counts">DATA</a>
                    <a href="#contact">CONTACT</a>
                    <a href="#">LOGIN</a>
                </div>
            </div>
            <div class="row position-absolute copyright start-50 translate-middle">
                <div class="col-md-12 ">
                    <p class="text-center">© 2023 Fam's Kost. All rights reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ======= End Footer ======= -->

    <!-- Back to top -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
    <!-- End Back to top -->

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src={{ asset('assets/js/main.js') }}></script>

</body>

</html>
