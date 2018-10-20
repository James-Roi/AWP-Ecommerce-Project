<nav class="amado-nav">
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="shop.html">Shop</a></li>
        <li><a href="product-details.html">Product</a></li>
        <li><a href="cart.html">Cart</a></li>
        <li><a href="checkout.html">Checkout</a></li>
        @guest
        <li><a href="/login">Login</a></li>
        <li><a href="/register">Sign Up</a></li>
        @else
        <li><a href="{{ route('logout') }}"
        	onclick="event.preventDefault();
         	document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endguest
    </ul>
</nav>