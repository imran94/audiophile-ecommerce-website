<x-base-layout :noCategoryList="true" :noPromotion="true">

    <link href="{{ url('css/checkout.css') }}" rel="stylesheet" />

    <div class="section">

        <h6 id="checkout-heading">checkout</h6>

        <div class="form-group">
            <div class="form-group-heading subtitle">billing details</div>
            <div class="input-group">
                <label for="name">Name</label>
                <input class="input" name="name" id="name" placeholder="Alexei Ward" />
            </div>
            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" class="input" name="email" id="email" placeholder="alexei@mail.com" />
            </div>
            <div class="input-group">
                <label for="phone">Phone Number</label>
                <input type="phone" class="input" name="phone" id="phone" placeholder="+1 202-555-0136" />
            </div>
        </div>

        <div class="form-group">
            <div class="form-group-heading subtitle">shipping info</div>
            <div class="input-group input-group-address">
                <label for="address">Address</label>
                <input class="input" name="address" id="address" placeholder="1137 Williams Avenue" />
            </div>
            <div class="input-group">
                <label for="zip">ZIP Code</label>
                <input class="input" name="zip" id="zip" inputmode="numeric" pattern="\d*"
                    placeholder="10001" />
            </div>
            <div class="input-group">
                <label for="city">City</label>
                <input class="input" name="city" id="city" placeholder="New York" />
            </div>
            <div class="input-group">
                <label for="country">Country</label>
                <input class="input" name="country" id="country" placeholder="United States" />
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-heading subtitle">payment details</div>

            <label id="payment-method-label" for="payment-method">Payment Method</label>

            <label class="radio-group">
                <input type="radio" id="e-money" name="drone" value="e-money" checked />
                <span class="radio-label">e-Money</span>
                {{-- <label for="e-money">e-Money</label> --}}
            </label>

            <label class="radio-group">
                <input type="radio" id="cod" name="drone" value="cod" />
                <span class="radio-label">Cash on Delivery</span>
            </label>

            <div class="input-group">
                <label for="e-money-number">e-Money Number</label>
                <input class="input" name="e-money-number" id="e-money-number" placeholder="238521993"
                    inputmode="numeric" pattern="\d*" />
            </div>

            <div class="input-group">
                <label for="e-money-pin">e-Money PIN</label>
                <input class="input" name="e-money-pin" id="e-money-pin" placeholder="6891" inputmode="numeric"
                    pattern="\d*" />
            </div>
        </div>
    </div>

    <div class="summary">
        <h6 id="summary-heading">summary</h6>

        <div id="cart-list">
            @foreach ($cart->products as $product)
                <div class="cart-row">
                    <div class="cart-item-info">
                        <img class="cart-item-img" src="{{ url($product->images[0]?->url) }}" />
                        <div class="cart-item-name">{{ $product->name }}</div>
                        <div class="cart-item-price">$ {{ number_format($product->price) }}</div>
                    </div>
                    <div class="cart-item-quantity">
                        x{{ $product->cartProduct->quantity }}
                    </div>
                </div>
            @endforeach
        </div>
        <div id="cart-subtotals">
            <div id="cart-total" class="cart-row">
                <div class="row-title" id="cart-total-title">TOTAL</div>
                <div class="row-value" id="cart-total-value">$ {{ number_format($cart->total) }}</div>
            </div>
            <div class="cart-row">
                <div class="row-title">SHIPPING</div>
                <div class="row-value">$ 50</div>
            </div>
        </div>

        <div class="cart-row" id="grand-total">
            <div class="row-title">GRAND TOTAL</div>
            <div class="row-value" id="grand-total-value">$ {{ number_format($cart->total + 50) }}</div>
        </div>

        <button id="pay-btn" class="btn btn-1" onclick="completeCheckout()">
            <img id="pay-loading-bar" src="{{ url('assets/shared/90-ring-with-bg-white-36.svg') }}" />
            <span id="pay-text">Continue & Pay</span>
        </button>
    </div>

    <div id="checkout-complete-dialog">
        <img src="{{ url('assets/checkout/icon-order-confirmation.svg') }}" />
        <h3 class="dialog-text-1">Thank you<br />for your order</h3>
        <div class="dialog-text-2">You will receive an email confirmation recently.</div>

        <div id="dialog-list">
            <div id="dialog-product-list">
                <div id="dialog-first-product" class="cart-row">
                    <div class="cart-item-info">
                        <img class="cart-item-img" src="{{ url($cart->products[0]->images[0]?->url) }}" />
                        <div class="cart-item-name">{{ $cart->products[0]->name }}</div>
                        <div class="cart-item-price">$ {{ number_format($cart->products[0]->price) }}</div>
                    </div>
                    <div class="cart-item-quantity">
                        x{{ $cart->products[0]->cartProduct->quantity }}
                    </div>
                </div>

                @if ($cart->products()->count() > 1)
                    <hr class="divider" />
                    <div id="other-items-text">and {{ $cart->products()->count() - 1 }} other item(s)</div>
                @endif
            </div>
            <div id="dialog-grand-total">
                <div id="dialog-grand-total-label">GRAND TOTAL</div>
                <div id="dialog-grand-total-value">$ {{ number_format($cart->total + 50) }}</div>
            </div>
        </div>

        <a href="{{ route('home') }}" id="home-btn" class="btn btn-1">back to home</a>
    </div>

</x-base-layout>
