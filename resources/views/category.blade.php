<x-base-layout title="Audiophile | {{ $category?->name }}">
    <link href="{{ url('css/category.css') }}" rel="stylesheet" />

    <div class="category-heading-block">
        <h2 class="category-heading">{{ $category->name }}</h2>
    </div>

    <div class="product-list">
        @foreach ($products as $product)
            <div class="product-preview">
                @foreach ($product->previewImages as $image)
                    <img class="product-img {{ $image->device }}" src="{{ url($image->url) }}" />
                @endforeach
                <div class="product-text">
                    @if ($product->new)
                        <div class="overline">new product</div>
                    @endif
                    <h1 class="product-name">{{ $product->name }}</h1>
                    <div class="product-desc">{{ $product->description }}</div>
                    <a href="{{ route('product', ['slug' => $product->slug]) }}" class="product-link btn btn-1">
                        see
                        product
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-base-layout>
