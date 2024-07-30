<x-base-layout :noCategoryList="true">

    <link href="{{ url('css/home.css') }}" rel="stylesheet" />

    <div id="new-product">
        <div class="overline new-product-text">new product</div>
        <h1 class="new-product-name">XX99 Mark II Headphones</h1>
        <div class="new-product-desc">
            Experience natural, lifelike audio and exceptional build quality made for the passionate music enthusiast.
        </div>
        <a href="{{ route('product', ['slug' => 'xx99-mark-two-headphones']) }}" class="new-product-btn btn btn-1">
            see product
        </a>
    </div>

    <x-category-list />

    <div id="more-products">
        <div id="zx9-speaker">
            <img class="product-img mobile" src="{{ url('assets/home/mobile/image-speaker-zx9.png') }}" />
            <img class="product-img tablet" src="{{ url('assets/home/tablet/image-speaker-zx9.png') }}" />
            <img class="product-img desktop" src="{{ url('assets/home/desktop/image-speaker-zx9.png') }}" />

            <h1 class="product-name">ZX9 SPEAKER</h1>
            <div class="product-desc">
                Upgrade to premium speakers that are phenomenally built to deliver truly remarkable
                sound.
            </div>
            <a href="{{ route('product', ['slug' => 'zx9-speaker']) }}" class="btn btn-4">see product</a>
        </div>
        <div id="zx7-speaker">
            <h4 class="product-name">zx7 speaker</h4>
            <a href="{{ route('product', ['slug' => 'zx7-speaker']) }}" class="btn btn-2">see product</a>
        </div>
        <div id="yx1-earphones">
            <img class="product-img mobile" src="{{ url('assets/home/mobile/image-earphones-yx1.jpg') }}" />
            <img class="product-img tablet" src="{{ url('assets/home/tablet/image-earphones-yx1.jpg') }}" />
            <img class="product-img desktop" src="{{ url('assets/home/desktop/image-earphones-yx1.jpg') }}" />

            <div class="product-info">
                <h4 class="product-name">yx1 earphones</h4>
                <a href="{{ route('product', ['slug' => 'yx1-earphones']) }}" class="btn btn-2">see product</a>
            </div>
        </div>
    </div>

</x-base-layout>
