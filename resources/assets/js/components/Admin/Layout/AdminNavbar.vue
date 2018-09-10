<template>
    <span>
        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

                <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li v-bind:class="{active: isCurrentUrl('/dashboard')}"><a href="/dashboard">Dashboard</a></li>
                    <li v-bind:class="{active: isCurrentUrl('/dashboard/products')}"><a href="/dashboard/products">Manage Products</a></li>
                    <li><a href="product-details.html">Manage Packages</a></li>
                    <li><a href="cart.html">Manage Users</a></li>
                </ul>
            </nav>
        </header>
        <!-- Header Area End -->
    </span>
</template>

<script>
export default {
    data(){
        return {
            current_url : window.location.pathname
        }
    },

    methods:{
        isCurrentUrl(url){
            return this.current_url == url;
        }
    }
}
</script>
