<style>
    .category-list,
    .category-link {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .category-list {
        padding: 2em var(--body-padding-hor);
        gap: 6em;
    }

    .category-link {
        width: 100%;
        border-radius: var(--rounded-edges);
        background-color: var(--light-grey);
        color: black;
        text-transform: uppercase;
        font-weight: 700;
        padding-bottom: 1.5em;
        max-height: 165px;
    }

    .category-img {
        position: relative;
        bottom: 4em;
        width: 50%;

        justify-self: flex-start;
    }

    .category-name {
        margin-top: -5em;
    }

    .shop-link {
        display: inline-flex;
        justify-content: center;
        align-items: baseline;
        gap: 0.5em;
        margin-top: 1em;
        color: var(--medium-grey);
    }

    .category-link:hover .shop-link,
    .category-link:active .shop-link {
        color: var(--copper);
    }

    @media screen and (min-width: 600px) {
        .category-list {
            /* flex-direction: row; */
            width: 100%;
            display: grid;
            grid-template: auto / repeat(3, 1fr);
            justify-content: space-between;
            gap: 1em;
        }

        .category-link {
            width: fit-content;

            min-height: 178px;
            max-height: 217px;

            padding-bottom: 0.5em;
        }

        .category-img {
            bottom: 5em;
            width: 75%;
        }

        .category-name,
        .shop-link {
            justify-self: flex-end;
        }

        .shop-link {
            margin-top: 0.5em;
        }
    }

    @media screen and (min-width: 1024px) {

        .category-list {
            /* width: calc(100% - var(--body-padding-hor) * 2); */
            gap: 0;
        }

        .category-name {
            font-size: 18px;
        }

        .category-link {
            /* min-height: 178px; */
            max-height: auto;
            margin-top: 5em;

            padding-bottom: 5em;
        }
    }
</style>

<div class="category-list">
    @foreach ($categories as $cat)
        <a href="{{ route('category', ['slug' => $cat->slug]) }}" class="category-link">
            <img class="category-img" src="{{ url($cat->preview_url) }}" />
            <div class="category-name bold">{{ $cat->name }}</div>
            <div class="shop-link">
                <span class="shop-text">shop</span>
                <img src="{{ url('assets/shared/icon-arrow-right.svg') }}" />
            </div>
        </a>
    @endforeach
</div>
