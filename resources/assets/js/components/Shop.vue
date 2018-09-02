<template>
<div>
    <div class="row">
        <div class="col-12">
            <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                <!-- Total Products -->
                <div class="total-products">
                    <p>Showing {{ from_item }}-{{ to_item }} 0f {{ item_count }}</p>
                    <div class="view d-flex">
                        <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!-- Sorting -->
                <div class="product-sorting d-flex">
                    <div class="sort-by-date d-flex align-items-center mr-15">
                        <p>Sort by</p>
                        <form action="#" method="get">
                            <select name="select" id="sortBydate">
                                <option value="value">Date</option>
                                <option value="value">Newest</option>
                                <option value="value">Popular</option>
                            </select>
                        </form>
                    </div>
                    <div class="view-product d-flex align-items-center">
                        <p>View</p>
                        <form action="#" method="get">
                            <select name="select" id="viewProduct">
                                <option value="value">12</option>
                                <option value="value">24</option>
                                <option value="value">48</option>
                                <option value="value">96</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <!-- Pagination -->
            <nav aria-label="navigation">
                <ul class="pagination">
                    <li style="margin-right: 6%;" v-bind:class="[{ disabled: !pagination.previous }]" class="page-item"><a class="page-link" @click="fetchProducts(pagination.previous)">Previous</a></li>
                    <li v-bind:class="[{ disabled: !pagination.next }]" class="page-item"><a class="page-link" @click="fetchProducts(pagination.next)">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row">
        <!-- Single Product Area -->
        <div class="col-12 col-sm-6 col-md-12 col-xl-6" v-for="product in products" v-bind:key="product.id">
            <div class="single-product-wrapper">
                <!-- Product Image -->
                <div class="product-img">
                    <img v-bind:src="product.image" alt="">
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
                    <!-- Ratings & Cart -->
                    <div class="ratings-cart text-right">
                        <div class="ratings">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <div class="cart">
                            <a href="cart.html" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
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
            currentRoute: window.location.pathname,
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
            page_url = page_url || '/api/shop/products'
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
        makePagination(meta, links){
            let pagination = {
                current : meta.current_page,
                last : meta.last_page,
                next : links.next,
                previous : links.prev
            }

            this.pagination = pagination;
        }


    }
}
</script>
