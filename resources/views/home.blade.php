@extends('layouts.master')
@section('title', 'Project WEB')
@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('image.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>

<body class="page-top">
    <!-- Hero Section -->
    <header class="text-black" style="background-image: url('{{ asset('assets/image.png') }}')">
        <div class="container text-center">
            <h1 class="fw-bolder">RANGGA ADIWIYASA</h1>
        </div>
    </header>

    <!-- About Section Hero -->
    <section class="hero about-hero" style="background-image: url('image.png'); height: 400px;">
        <div class="container text-center">
            <h2 class="text-white">Persewaan</h2>
            <p class="text-white">BOOK NOW</p>
        </div>
    </section>
    <section class="about">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">Slide 1</div>
                            <div class="swiper-slide">Slide 2</div>
                            <div class="swiper-slide">Slide 3</div>
                            <div class="swiper-slide">Slide 4</div>
                            <div class="swiper-slide">Slide 5</div>
                            <div class="swiper-slide">Slide 6</div>
                            <div class="swiper-slide">Slide 7</div>
                            <div class="swiper-slide">Slide 8</div>
                            <div class="swiper-slide">Slide 9</div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section Hero -->
    <section class="hero services-hero" style="background-image: url('path/to/your/image.jpg'); height: 400px;">
        <div class="container text-center">
            <h2 class="text-white">Jasa Perform</h2>
            <p class="text-white">BOOK NOW</p>
        </div>
    </section>
    <section class="bg-light" id="services">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">Slide 1</div>
                            <div class="swiper-slide">Slide 2</div>
                            <div class="swiper-slide">Slide 3</div>
                            <div class="swiper-slide">Slide 4</div>
                            <div class="swiper-slide">Slide 5</div>
                            <div class="swiper-slide">Slide 6</div>
                            <div class="swiper-slide">Slide 7</div>
                            <div class="swiper-slide">Slide 8</div>
                            <div class="swiper-slide">Slide 9</div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section Hero -->
    <section class="about us">
        <div class="container">
                <div class="col-lg-10">
                    <h2>About us</h2>
                    <p>Sanggar Rangga Adiwiyasa adalah sanggar seni budaya yang berdiri sejak 2020 di Kelurahan Ngronggo, Kota Kediri,
                        di bawah naungan Karang Taruna Remaja Jaya. Kami memiliki dua divisi utama, yaitu Tari dan Karawitan, masing-masing dengan tiga kelas untuk berbagai tingkat kemampuan. Sanggar ini aktif berkontribusi dalam pelestarian budaya melalui berbagai pagelaran seni, baik di dalam maupun di luar Kota Kediri, seperti Geni Budjari dan Pagelaran Candi Tegowangi.</p>
                </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-unstyled text-center text-white mt-3">
                        <li>Contact Us:</li>
                        <li>Email: info@example.com</li>
                        <li>Phone: (123) 456-7890</li>
                        <li>Address: 123 Main Street, City, Country</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-unstyled text-center text-white mt-3">
                        <li><strong>Social Media:</strong></li>
                        <li><a href="#" class="text-white">Facebook</a></li>
                        <li><a href="#" class="text-white">Instagram</a></li>
                        <li><a href="#" class="text-white">Twitter/X</a></li>
                        <li><a href="#" class="text-white"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <p class="m-0 text-center text-white">Copyright &copy; 2024</p>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
@endsection