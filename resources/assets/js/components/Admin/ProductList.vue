<template>
    <div>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Products</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li v-bind:class="[{ disabled: !pagination.previous }]"><a class="page-link btn btn-outline-secondary" @click="fetchProducts(pagination.previous)">Prev</a></li>
                            <li v-bind:class="[{ disabled: !pagination.next }]"><a class="page-link btn btn-outline-secondary" @click="fetchProducts(pagination.next)">Next</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="container">
                <a href="/dashboard/product/add" class="btn btn-primary">Add Product</a>
                <br>
            </div>
            <div class="container">
                <h3 class="pb-2 display-5"> Showing {{ from_item }}-{{ to_item }} of {{ item_count }} </h3>
            </div>
            <div class="col-md-4" v-for="product in products" v-bind:key="product.id">
                <div class="card">
                    <img class="card-img-top" v-bind:src="product.image" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mb-3">{{ product.name }}</h4>
                        <h6 class="card-title mb-3">₱{{ product.price }}</h6>
                        <p class="card-text">{{ product.description }}</p>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-warning" v-bind:href="'../dashboard/product/' + product.id">Edit</a>
                        <button @click="deleteProduct(product.id)" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div><!-- .content -->
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
        deleteProduct(product_id,product_name)
        {
            var action = confirm("Are you sure you want to delete product "+product_name+" with id of "+ product_id);
            if(action == true)
            {
                fetch(`/api/product/${product_id}`,{
                    method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('Product '+product_name+' removed.');
                    this.fetchProducts();
                })
                .catch(err => console.log(err));
            }
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