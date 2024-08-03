<x-base-layout title="{{ $product->name }} | Audiophile">

    <link href="{{ url('css/product.css') }}" rel="stylesheet" />

    <div id="product-main">
        @foreach ($mainImages as $image)
            <img class="main-product-img {{ $image->device }}" src="{{ url($image->url) }}" />
        @endforeach
        <div id="main-product-info">
            @if ($product->new)
                <div class="overline new-product-tag">new product</div>
            @endif
            <h2 class="product-name">{{ $product->name }}</h2>
            <div class="product-desc">{{ $product->description }}</div>
            <h6 class="product-price">$ {{ number_format($product->price) }}</h6>
            <form id="product-form" onsubmit="event.preventDefault(); addToCart({{ $product->id }}, event)">
                <div class="number-input">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown();"
                        class="">-</button>
                    <input class="quantity" min="1" name="quantity" value="1" type="number" required>
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp(); "
                        class="">+</button>
                </div>
                <button type="submit" id="add-to-cart-btn" class="btn btn-1">
                    <img id="add-to-cart-loading-bar" src="{{ url('assets/shared/90-ring-with-bg-white-36.svg') }}" />
                    <span id="add-to-cart-text">add to cart</span>
                </button>
            </form>
        </div>
    </div>
    <div id="main-product-info-2">
        <div id="features">
            <h3 id="features-heading">FEATURES</h3>
            <div id="features-text">{!! Illuminate\Support\Str::markdown($product->features) !!}</div>
        </div>
        <div id="accessories">
            <h3 id="accessories-heading">IN THE BOX</h3>
            <div id="accessories-list">
                @foreach ($product->accessories as $acc)
                    <div class="accessory">
                        <div class="accessory-quantity">{{ $acc->quantity }}x</div>
                        <div class="accessory-name">{{ $acc->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div id="main-product-gallery">
        @foreach ($galleryImages as $img)
            <img src="{{ url($img->url) }}" class="gallery-img {{ $img->device }}" />
        @endforeach
    </div>
    <div id="others">
        <h3 id="others-heading">YOU MAY ALSO LIKE</h3>
        <div id="other-products">
            @foreach ($others as $other)
                <div class="other-product">
                    <div class="other-product-img-stack">
                        <img class="other-product-img" src="{{ url($other->previewUrl) }}" />
                    </div>
                    <h5 class="other-product-name">{{ $other->name }}</h5>
                    <a href="{{ route('product', ['slug' => $other->slug]) }}" class="other-product-link btn btn-1">
                        see product
                    </a>

                </div>
            @endforeach
        </div>
    </div>

</x-base-layout>
