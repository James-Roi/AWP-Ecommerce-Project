<template>
    <div class="row">
        <div class="single-products-catagory clearfix" v-for="product in products" v-bind:key="product.id">
            <a href="/">
                <img v-bind:src="product.image" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>₱{{ product.price }} </p>
                    <h4>{{ product.name }}</h4>
                </div>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
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
                from_item: '',
                to_item: '',
                item_count: '',
                pagination: {}
            }
        },

        created() {
            this.fetchProducts();
        },

        methods: {
            fetchProducts(page_url) {
                let vm = this;
                page_url = page_url || '/api/dashboard/products'
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        //console.log(res.data);
                        this.products = res.data;
                        this.from_item = res.meta.from;
                        this.to_item = res.meta.to;
                        this.item_count = res.meta.total;
                        vm.makePagination(res.meta, res.links);
                    })
                    .catch(err=>console.log(err));
            },
        }
    }
</script>

<style>

</style>
