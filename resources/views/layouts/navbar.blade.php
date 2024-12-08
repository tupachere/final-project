
<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="container px-4">
    <a class="navbar-brand" href="#page-top">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo" style="height: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-left">
                <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#product">Product</a></li>
                <li class="nav-item"><a class="nav-link" href="#service">Service</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fa fa-sign-in" aria-hidden="true"></i> Sign In
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
