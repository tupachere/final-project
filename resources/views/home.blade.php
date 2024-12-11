@extends('layouts.master')
@section('title', 'Project WEB')

@section('content')
<head>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sanggar Rangga Adiwiyasa - Promoting Indonesian culture through dance and music.">
    <meta name="author" content="Your Name">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>


<body id="landing">
    @include('layouts.navbar')
    <!-- Hero Section -->
    <header id="home" class="text-black" style="background-image: url('{{ asset('assets/image.png') }}'); background-size: cover; background-position: center;">
        <div class="container text-center py-5">
            <h1 class="fw-bolder">RONGGO <br>ADI WIYASA</h1>
        </div>
    </header>

    <!-- About Section -->
    <section id=product class="persewaan">
        <div class="container">
            <div class="swiper mySwiper custom-swiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide card">
                        <img src="{{ asset('assets/basahan.jpg') }}" alt="Basahan Satria Couple" class="card-image">
                        <h3>Basahan Satria Couple</h3>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide card">
                        <img src="{{ asset('assets/kebayak.jpg') }}" alt="Kebaya Tari" class="card-image">
                        <h3>Kebaya Tari</h3>
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide card">
                        <img src="{{ asset('assets/Satria.jpg') }}" alt="Satria Putra" class="card-image">
                        <h3>Satria Putra</h3>
                    </div>
                </div>
                <!-- Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-primary" onclick="window.location.href='/booking'">BOOK NOW</button>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="service" class="perform">
        <div class="container">
            <div class="swiper mySwiper custom-swiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide card">
                        <img src="{{ asset('assets/wayang.jpg') }}" alt="Pentas Wayang Kulit" class="card-image">
                        <h3>Pentas Wayang Kulit</h3>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide card">
                        <img src="{{ asset('assets/karawitan.jpg') }}" alt="Pentas Karawitan" class="card-image">
                        <h3>Pentas Karawitan</h3>
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide card">
                        <img src="{{ asset('assets/wedding.jpg') }}" alt="Wedding Tari" class="card-image">
                        <h3>Wedding Tari</h3>
                    </div>
                </div>
                <!-- Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-primary" onclick="window.location.href='/booking'">BOOK NOW</button>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="about-us">
        <div class="container">
            <div class="text-left">
                <h2>About Us</h2>
                <p>
                    Sanggar Rangga Adiwiyasa adalah sanggar seni budaya yang berdiri sejak 2020 di Kelurahan Ngronggo, Kota Kediri,
                    di bawah naungan Karang Taruna Remaja Jaya. Kami memiliki dua divisi utama, yaitu Tari dan Karawitan, masing-masing dengan tiga kelas untuk berbagai tingkat kemampuan. Sanggar ini aktif berkontribusi dalam pelestarian budaya melalui berbagai pagelaran seni, baik di dalam maupun di luar Kota Kediri, seperti Geni Budjari dan Pagelaran Candi Tegowangi.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container-footer">
            <div class="footer-section contact">
            <h3>Contact</h3>
            <p><i class="fa fa-phone"></i> +62 81111112345</p>
            <p><i class="fa fa-envelope"></i> ranggaadiwiyasa01@gmail.com</p>
            </div>
            <div class="footer-section social-media">
            <h3>Social Media</h3>
            <p><i class="fa fa-facebook"></i> Sanggar Ronggo Adi Wiyasa</p>
            <p><i class="fa fa-instagram"></i> @sanggarronggoadiwiyasa</p>
            <p><i class="fa fa-twitter"></i> @Sanggar_Ronggoadiwiyasa</p>
            </div>
            <div class="footer-section address">
            <h3>Address</h3>
            <p>Kelurahan Nggronggo</p>
            <p>Kecamatan Kota</p>
            <p>Kota Kediri</p>
            <a href="https://maps.app.goo.gl/ElHgfvf2qTz1mcubA" target="_blank">
                <i class="fa fa-map-marker"></i> Open in Google Maps
            </a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 copyright: ranggaadiwiyasa.com</p>
        </div>
    </footer>

</body>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.mySwiper', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>
@endsection
