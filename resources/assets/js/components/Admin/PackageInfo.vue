<template>
    <div>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
                    <div class="col-md-12">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">
                                        <div class="media-body">
                                            <h2 class="text-light display-6">{{ tpackage.title }}</h2>
                                            <p>{{ tpackage.description }}</p>
                                            <p>{{ tpackage.price }}</p>
                                        </div>
                                    </div>
                                </div>


                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        Products <span class="pull-right"><button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#mediumModal">Add</button></span>
                                    </li>
                                    <li v-for="package_product in package_products" v-bind:key="package_product.id" v-bind:value="package_product.id" class="list-group-item">
                                        {{ package_product.relationships.product.name }}
                                        <span class="pull-right">
                                            <button @click="updateQuantityBy(package_product.product_id, package_product.product_quantity+1)" class="btn btn-success">+</button>
                                            {{ package_product.product_quantity }}
                                            <button @click="updateQuantityBy(package_product.product_id, package_product.product_quantity-1)" class="btn btn-danger">-</button>
                                            <button @click="removeProductFromPackage(package_product.id, package_product.relationships.product.name,package_product.package_id)" type="button" class="btn btn-danger mb-1">X</button>
                                        </span>
                                    </li>
                                </ul>
                            </section>
                        </aside>
                    </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-lg-6">
                  </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

                <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Products</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <table class="table">
                              <thead>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Description
                                </th>
                                <th></th>
                              </thead>
                              <tbody>
                                <tr v-for="product in products" v-bind:key="product.id">
                                  <td>{{ product.name }}</td>
                                  <td>₱{{ product.price }}</td>
                                  <td>{{ product.description }}</td>
                                  <td>
                                    <button @click="saveProductPackage(product.id)" class="btn btn-primary">Add</button>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            from_item: '',
            to_item: '',
            item_count: '',
            pagination: {},
            tpackage: {
                title:'',
                description:'',
                price: '0.00',
                id: ''
            },
            package_product:{
                id:'',
                package_id:'',
                product_id:'',
                product_quantity:'',
                relationships: {
                    product:{
                        id:'',
                        category_id:'',
                        name:'',
                        description:'',
                        price:'',
                        image:''
                    }
                }
            },
            package_products: {
 
            },
            package_id:''
        }
    },
    
    created() {
        this.package_id = window.location.pathname.split('/')[4];
        this.fetchProducts(this.package_id);
        this.fetchPackage(this.package_id);
        this.fetchPackageProducts(this.package_id);
    },

    methods: {
        fetchProducts(package_id) {
            fetch(`/api/packages/${package_id}/products`,{
                method: 'get'
            })
            .then(res => res.json())
            .then(res => {
               this.products = res.data;
            })
        },
        fetchPackage(package_id) {
            fetch(`/api/package/${package_id}`,{
                method: 'get'
            })
            .then(res => res.json())
            .then(res => {
               this.tpackage = res.data;
            })
        },
        fetchPackageProducts(package_id) {
            fetch(`/api/package/${package_id}/products`,{
                method: 'get'
            })
            .then(res => res.json())
            .then(res => {
               this.package_products = res.data;
            })
        },
        removeProductFromPackage(package_product_id,product_name,package_id)
        {
            var action = confirm("Are you sure you want to delete package "+package_product_id+" with id of "+ product_name);
            if(action == true)
            {
                fetch(`/api/package/product/${package_product_id}`,{
                    method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('Package product '+product_name+' removed.');
                    this.fetchPackageProducts(package_id);
                    this.fetchProducts(package_id);
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
        },
        saveProductPackage(product_id){
            this.package_product.package_id = this.package_id;
            this.package_product.product_id = product_id;
            fetch('/api/package/product',{
                method: 'post',
                body: JSON.stringify(this.package_product),
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then(res => res.json())
            .catch(err => console.log(err))
            this.fetchProducts(this.package_id);
            this.fetchPackageProducts(this.package_id);
        },
        updateQuantityBy(product_id, quantity){
            this.package_product.package_id = this.package_id;
            this.package_product.product_quantity = quantity;
            this.package_product.product_id = product_id;
            fetch('/api/package/product',{
                method: 'put',
                body: JSON.stringify(this.package_product),
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then(res => res.json())
            .catch(err => console.log(err))
            this.fetchPackageProducts(this.package_id);
        }
    }
}
</script>
