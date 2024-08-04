<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('favicon-32x32.png') }}">
    <link href="{{ url('css/app.css') }}" rel="stylesheet" />

    <title>{{ ucwords($title) }}</title>
</head>

<body>
    <header>
        <img id="nav-toggle" src="{{ url('assets/shared/icon-hamburger.svg') }}" onclick="toggleNavBar()" />
        <a class="logo-link" href="{{ route('home') }}">
            <img class="logo-img" src="{{ url('assets/shared/logo.svg') }}" />
        </a>
        <nav id="nav-list">
            <a class="nav-link" href="{{ route('home') }}">home</a>
            @foreach ($categories as $cat)
                <a class="nav-link" href="{{ route('category', ['slug' => $cat->slug]) }}">{{ $cat->name }}</a>
            @endforeach
        </nav>
        <img id="cart-toggle" class="dimmed" src="{{ url('assets/shared/icon-cart.svg') }}" onclick="toggleCart()" />

        <nav id="nav-list-mobile">
            <x-category-list />
        </nav>
    </header>

    <main>
        <div id="cart-overlay">
            <div id="cart-overlay-header">
                <div id="cart-overlay-heading">CART (0)</div>
                <div id="remove-all-button" onclick="removeAll()">Remove all</div>
            </div>
            <div id="cart-overlay-list">
            </div>
            <div id="cart-overlay-footer">
                <div id="cart-overlay-total-title">TOTAL</div>
                <div id="cart-overlay-total-amount">$ 0</div>
            </div>
            <a href="#" class="checkout-btn btn btn-1">checkout</a>
        </div>

        <div id="overlay"></div>

        {{ $slot }}

        @unless ($noCategoryList)
            <x-category-list />
        @endunless

        @unless ($noPromotion)
            <div class="best-gear">
                <img class="best-gear-img mobile" src="{{ url('assets/shared/mobile/image-best-gear.jpg') }}" />
                <img class="best-gear-img tablet" src="{{ url('assets/shared/tablet/image-best-gear.jpg') }}" />
                <img class="best-gear-img desktop" src="{{ url('assets/shared/desktop/image-best-gear.jpg') }}" />

                <div class="best-gear-text">
                    <h2 class="best-gear-heading">Bringing you the <span class="copper">best</span> audio gear</h2>
                    <div class="best-gear-paragraph">
                        Located at the heart of New York City, Audiophile is the premier store for high end
                        headphones,
                        earphones,
                        speakers, and audio accessories. We have a large showroom and luxury demonstration rooms
                        available
                        for
                        you
                        to browse and experience a wide range of our products. Stop by our store to meet some of the
                        fantastic
                        people who make Audiophile the best place to buy your portable audio equipment.
                    </div>
                </div>
            </div>
        @endunless
    </main>

    <footer>
        <hr class="footer-top-line" />
        <a class="logo-link" href="{{ route('home') }}">
            <img class="logo-img" src="{{ url('assets/shared/logo.svg') }}" />
        </a>

        <nav class="footer-nav">
            <a class="nav-link" href="{{ route('home') }}">home</a>
            @foreach ($categories as $cat)
                <a class="nav-link" href="{{ route('category', ['slug' => $cat->slug]) }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </nav>

        <div class="footer-about">
            Audiophile is an all in one stop to fulfill your audio needs. We're a small team of music lovers and
            sound
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ url('js/anims.js') }}"></script>
<script>
    const status = '{{ session('status') }}';
    if (status) {
        Swal.fire({
            title: status,
            // toast: true,
            timer: 3000,
            position: 'bottom',
            icon: 'success'
        });
    }

    const baseUrl = '{{ url('/') }}';
    let cartId = localStorage.getItem('cartId');
    let cartData = [];

    let isNavListShowing = false;
    let isCartShowing = false;
    let isDialogShowing = false;

    const debounce = (func, timeout = 300) => {
        let timer;
        return (...args) => {
            clearTimeout(timer);
            timer = setTimeout(() => {
                func.apply(this, args);
            }, timeout);
        }
    }

    const toggleBackground = () => {
        document.body.classList.toggle("noscroll");
        const overlay = document.getElementById("overlay")
        if (overlay.style.display === "block")
            overlay.style.display = "none";
        else
            overlay.style.display = "block";
    }

    const toggleNavBar = () => {
        isNavListShowing = !isNavListShowing;
        document.querySelector("#nav-list-mobile")
            .classList.toggle("nav-list-visible");

        if (!isCartShowing && !isDialogShowing) {
            toggleBackground();
        }
    };

    const toggleCart = () => {
        if (cartData?.products?.length === 0) {
            return;
        }

        isCartShowing = !isCartShowing;
        document.querySelector("#cart-overlay")
            .style.display = isCartShowing ? 'flex' : 'none';

        if (!isNavListShowing && !isDialogShowing) {
            toggleBackground();
        }
    }

    const networkRequest = async (url = '', method = 'GET', body = {}) => {
        const headers = {
            'Content-Type': 'application/json',
            Accept: 'application/json',
        }

        const response = await fetch(`${url}`, {
            method: method,
            headers: headers,
            body: method !== 'GET' ? JSON.stringify(body) : null
        })
        const data = await response.json()
        return {
            response,
            data
        }
    }

    const updateCartDOM = (data) => {
        cartId = data.id
        cartData = data

        const cartToggleClassList = document.querySelector('#cart-toggle').classList
        if (cartData.products.length === 0) {
            cartToggleClassList.add('dimmed')
        } else {
            cartToggleClassList.remove('dimmed')
        }

        document.querySelector('#cart-overlay-heading').innerHTML = `CART(${cartData.products.length})`;
        document.querySelector('#remove-all-button').style.visibility = cartData.products.length === 0 ? 'hidden' :
            'visible';

        let cartRows = ''
        let checkoutCartRows = ''
        let checkoutCartDialogText =
            cartData.products.forEach(product => {
                cartRows += `
                    <div class="cart-item" id="cart-product-${product.slug}">
                        <div class="cart-item-info">
                            <img class="cart-item-img" src="${baseUrl}/${product.images[0].url}" />
                            <div class="cart-item-name">${product.name}</div>
                            <div class="cart-item-price">$ ${product.price.toLocaleString()}</div>
                        </div>
                        <div class="number-input">
                            <button type="button"
                                onclick="
                                    this.parentNode.querySelector('input[type=number]').stepDown(); 
                                    debouncedQuantityChange(${product.id}, event);
                                "
                                class="">-</button>
                            <input class="quantity" min="0" max="999" name="quantity" value="${product.cart_product.quantity}"
                            type="number"
                            onchange onpropertychange onkeyuponpaste oninput="debouncedQuantityChange(${product.id}, event)">
                            <button type="button"
                                onclick="
                                    this.parentNode.querySelector('input[type=number]').stepUp(); 
                                    debouncedQuantityChange(${product.id}, event);
                                "
                                class="">+</button>
                        </div>
                    </div>
                `

                checkoutCartRows += `
                    <div class="cart-row">
                        <div class="cart-item-info">
                            <img class="cart-item-img" src="${baseUrl}/${product.images[0].url}" />
                            <div class="cart-item-name">${ product.name }</div>
                            <div class="cart-item-price">$ ${product.price.toLocaleString()}</div>
                        </div>
                        <div class="cart-item-quantity">
                            x${ product.cart_product.quantity }
                        </div>
                    </div>
                `
            });
        document.querySelector('#cart-overlay-list').innerHTML = cartRows;
        document.querySelector('#cart-overlay-total-amount').innerHTML = `$ ${cartData.total.toLocaleString()}`;
        const checkoutLink = document.querySelector('#cart-overlay .checkout-btn')
        checkoutLink.href = `${baseUrl}/checkout/${cartId}`;
        checkoutLink.style.display = cartData.products.length === 0 ?
            'none' : 'block';

        const checkoutCartList = document.querySelector('#cart-list');
        if (checkoutCartList) {
            checkoutCartList.innerHTML = checkoutCartRows;
            document.querySelector('#cart-total-value').innerHTML = `$ ${cartData.total.toLocaleString()}`;
            document.querySelector('#grand-total-value').innerHTML = `$ ${(cartData.total+50).toLocaleString()}`;
            document.querySelector('#pay-btn').style.display = cartData.products.length === 0 ?
                'none' : 'block';
            // document.querySelector('#pay-btn').disabled = cartData.products.length > 0

            const firstProduct = cartData.products[0]
            let dialogProductListData = ''
            if (firstProduct) {
                dialogProductListData = `
                    <div id="dialog-first-product" class="cart-row">    
                        <div class="cart-row">
                            <div class="cart-item-info">
                                <img class="cart-item-img" src="${baseUrl}/${firstProduct.images[0].url}" />
                                <div class="cart-item-name">${firstProduct.name}</div>
                                <div class="cart-item-price">$ ${firstProduct.price}</div>
                            </div>
                            <div class="cart-item-quantity">
                                x${firstProduct.cart_product.quantity}
                            </div>
                        </div>
                    </div>
                `
            }
            if (cartData.products.length > 1) {
                dialogProductListData += `
                    <hr class="divider" />
                    <div id="other-items-text">and ${cartData.products.length - 1} other item${cartData.products.length > 2 ? 's' : ''}</div>
                `
            }
            document.querySelector('#dialog-product-list').innerHTML = dialogProductListData
            // document.querySelector('#')
        }

    }

    const getCart = async () => {
        const {
            response,
            data
        } = await networkRequest(`${baseUrl}/api/cart/${cartId}`);

        if (!response.ok) {
            cartId = null;
            localStorage.removeItem('cartId');
            return;
        }

        updateCartDOM(data);
    }

    let addingToCart = false
    const addToCart = async (productId, evt) => {
        if (addingToCart)
            return

        addingToCart = true
        document.querySelector('#add-to-cart-text').style.display = 'none';
        document.querySelector('#add-to-cart-loading-bar').style.display = 'block';

        const body = {
            productId: productId,
            quantity: evt.target.querySelector('input.quantity').value,
            cartId: cartId
        }

        const {
            response,
            data
        } = await networkRequest('{{ route('addToCart') }}', 'POST', body);

        updateCartDOM(data);

        document.querySelector('#add-to-cart-loading-bar').style.display = 'none';
        document.querySelector('#add-to-cart-text').style.display = 'block';

        cartId = data.id;
        localStorage.setItem('cartId', data.id);

        Swal.fire({
            title: 'Added to cart',
            toast: true,
            timer: 2000,
            position: 'bottom',
            icon: 'success'
        });

        addingToCart = false
        return false;
    }

    const onQuantityChanged = async (productId, evt) => {
        const numInput = evt.target.parentNode.querySelector('input[type=number]')
        if (numInput.value.length) {
            numInput.value = numInput.value.slice(0, 3)
        }

        const body = {
            productId: productId,
            quantity: numInput.value
        };

        const {
            response,
            data
        } = await networkRequest(`${baseUrl}/api/cart/${cartId}/cart-products`, 'PUT', body);

        if (!response.ok) {
            return;
        }

        updateCartDOM(data);
    }
    const debouncedQuantityChange = debounce(onQuantityChanged)

    const removeAll = async () => {
        const res = await Swal.fire({
            title: 'Empty Cart',
            text: 'Are you sure you want to remove all products from the cart?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'var(--copper)',
            cancelButtonColor: '#d33',
            cancelButtonText: 'No',
            confirmButtonText: 'Yes'
        })
        if (!res.isConfirmed) {
            return
        }

        const {
            response,
            data
        } = await networkRequest(`${baseUrl}/api/cart/${cartId}/cart-products`, 'DELETE');

        if (!response.ok) {
            return;
        }

        toggleCart();
        Swal.fire({
            title: 'Cart has been emptied',
            toast: true,
            timer: 2000,
            position: 'bottom',
            icon: 'success'
        });
        updateCartDOM(data)
    }

    let checkingOut = false
    const completeCheckout = async () => {
        if (checkingOut)
            return

        checkingOut = true

        document.querySelector('#pay-loading-bar').style.display = 'block';
        document.querySelector('#pay-text').style.display = 'none';

        await networkRequest(`${baseUrl}/api/cart/${cartId}`, 'DELETE');
        cartId = null
        cartData = null
        localStorage.removeItem('cartId')

        const checkoutDialog = document.querySelector('#checkout-complete-dialog')
        if (!checkoutDialog) {
            return
        }
        document.body.classList.toggle("noscroll");
        document.querySelector("#overlay").style.display = "block";
        checkoutDialog.style.display = 'grid'

        document.querySelector('#pay-loading-bar').style.display = 'none';
        document.querySelector('#pay-text').style.display = 'block';

        checkingOut = false
    }

    if (cartId) {
        getCart();
    }
</script>
