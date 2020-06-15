<!-- Nav -->
<nav id="menu">
    <ul class="links">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('shop.index')}}">Shop</a></li>
        <li><a href="{{route('cart.index')}}">
                Cart
                @if (Cart::instance('default')->count() > 0)
                    <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
                @endif
            </a>
        </li>
        <li><a href="elements.html">Elements</a></li>
        <li><a href="{{route('cart.index')}}">Elements</a></li>
    </ul>
</nav>
