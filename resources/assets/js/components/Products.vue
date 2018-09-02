<template>
    <div class="products-catagories-area clearfix">
        <div class="amado-pro-catagory clearfix">
            <div class="container">
                <div class="row">
                    <!-- Single Product Area -->
                    <div class="col-6 col-sm-4 col-md-6 col-xl-4" v-for="product in products" v-bind:key="product.id">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <a href="">
                                <img v-bind:src="product.image" alt="">
                                </a>
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">₱{{ product.price }}</p>
                                    <a href="product-details.html">
                                        <h6>{{ product.name }}</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            products: [],
            product: {
                category_id: '',
                description:'',
                id:'',
                image:'',
                name:'',
                price:''
            },
            product_id:'',
            pagination: {}
        }
    },

    created() {
        this.fetchProducts();
    },

    methods: {
        fetchProducts() {
            fetch('api/products')
                .then(res => res.json())
                .then(res => {
                    //console.log(res.data);
                    this.products = res.data;
                })
        }
    }
}
</script>
