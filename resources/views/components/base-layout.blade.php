<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('favicon-32x32.png') }}">
    <link href="{{ url('css/app.css') }}" rel="stylesheet" />

    <title>{{ $title ?? 'Audiophile' }}</title>
</head>

<body>
    <header>
        <img id="nav-toggle" src="{{ url('assets/shared/icon-hamburger.svg') }}" onclick="toggleNavBar()" />
        <a class="logo-link" href="/">
            <img class="logo-img" src="{{ url('assets/shared/logo.svg') }}" />
        </a>
        <nav id="nav-list">
            <a class="nav-link" href="#">home</a>
            <a class="nav-link" href="#">headphones</a>
            <a class="nav-link" href="#">speakers</a>
            <a class="nav-link" href="#">earphones</a>
        </nav>
        <img src="{{ url('assets/shared/icon-cart.svg') }}" />

        <nav id="nav-list-mobile">
            <x-category-list />
        </nav>
    </header>

    <main>
        {{ $slot }}

        <div class="best-gear">
            <img class="best-gear-img mobile" src="{{ url('assets/shared/mobile/image-best-gear.jpg') }}" />
            <img class="best-gear-img tablet" src="{{ url('assets/shared/tablet/image-best-gear.jpg') }}" />
            <img class="best-gear-img desktop" src="{{ url('assets/shared/desktop/image-best-gear.jpg') }}" />


            <div class="best-gear-text">
                <h4 class="best-gear-heading mobile">Bringing you the <span class="copper">best</span> audio gear</h4>
                <h2 class="best-gear-heading tablet desktop">Bringing you the <span class="copper">best</span> audio
                    gear
                </h2>
                <div class="best-gear-paragraph">
                    Located at the heart of New York City, Audiophile is the premier store for high end headphones,
                    earphones,
                    speakers, and audio accessories. We have a large showroom and luxury demonstration rooms available
                    for
                    you
                    to browse and experience a wide range of our products. Stop by our store to meet some of the
                    fantastic
                    people who make Audiophile the best place to buy your portable audio equipment.
                </div>
            </div>
        </div>
    </main>

    <footer>
        <hr class="footer-top-line" />
        <a class="logo-link" href="/">
            <img class="logo-img" src="{{ url('assets/shared/logo.svg') }}" />
        </a>

        <nav class="footer-nav">
            <a class="nav-link" href="#">home</a>
            <a class="nav-link" href="#">headphones</a>
            <a class="nav-link" href="#">speakers</a>
            <a class="nav-link" href="#">earphones</a>
        </nav>

        <div class="footer-about">
            Audiophile is an all in one stop to fulfill your audio needs. We're a small team of music lovers and sound
            specialists who are devoted to helping you get the most out of personal audio. Come and visit our demo
            facility - we’re open 7 days a week.
        </div>

        <div class="copyright">Copyright 2021. All Rights Reserved</div>

        <div class="social-media">
            <img class="social-media-link" src="{{ url('assets/shared/icon-facebook.svg') }}" />
            <img class="social-media-link" src="{{ url('assets/shared/icon-twitter.svg') }}" />
            <img class="social-media-link" src="{{ url('assets/shared/icon-instagram.svg') }}" />
        </div>
    </footer>
</body>

</html>
<script>
    const toggleNavBar = () => {
        // document.body.classList.toggle("noscroll");
        document.querySelector("#nav-list-mobile")
            .classList.toggle("nav-list-visible");
    };
</script>
