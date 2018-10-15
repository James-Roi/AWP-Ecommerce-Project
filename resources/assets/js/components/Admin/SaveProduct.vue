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
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">{{ page_title }}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-lg-6">
                    <form @submit.prevent="saveProduct" action="">
                    <div class="card">
                      <div class="card-header"><strong> {{ page_title }} </strong></div>
                      <div class="card-body card-block">
                        <div class="form-group">
                            <label for="product_name" class=" form-control-label">Product Name</label>
                            <input type="text" id="product_name" placeholder="Product Name" v-model="product.name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="category_id" class=" form-control-label">Category</label>
                            <select name="categroy_id" id="category_id" class="form-control" v-model="product.category_id">
                                <option value="" selected>----------</option>
                                <option v-for="category in categories" v-bind:key="category.id" v-bind:value="category.id">{{ category.title }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_description" class="form-control-label">Description</label>
                            <br>
                            <textarea v-model="product.description" name="product_description" id="" cols="64" rows="5" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_price" class=" form-control-label">Price</label>
                            <input type="number" step=".01" id="product_price" placeholder="Product Price" v-model="product.price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="product_image" class=" form-control-label">Image</label>
                            <input type="file" id="product_image" class="form-control-file" @change="imageChanged">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Save">
                        </div>
                       </div>
                    </div>
                    </form>
                  </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div>
</template>

<script>
export default {
    data(){
        return{
            page_title: 'Edit Product',
            method_type: 'put',
            product: {
                category_id: '',
                description:'',
                id:'',
                image:'',
                name:'',
                price:''
            },
            categories: [],
            category: {
                title:'',
                description:'',
                id: ''
            },
            category_id: 0,
            product_id:''
        }
    },

    created() {
        this.fetchCategories();
        if(window.location.pathname.split('/')[3] == 'add'){
            this.page_title = 'Add Product';
            this.method_type = 'post'
        }
        else
            this.fetchProduct(window.location.pathname.split('/')[3]);
    },

    methods: {
        fetchProduct(product_id) {
            fetch(`/api/product/${product_id}`,{
                method: 'get'
            })
            .then(res => res.json())
            .then(res => {
               this.product = res.data;
               this.product.image = "";
            })
        },
        fetchCategories() {
            fetch('/api/categories')
                .then(res => res.json())
                .then(res => {
                    this.categories = res.data;
                })
        },
        saveProduct(){
                fetch('/api/product',{
                    method: this.method_type,
                    body: JSON.stringify(this.product),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .catch(err => console.log(err))
                window.location.href = '/dashboard/products';
        },
        imageChanged(e){
            var fileReader = new FileReader()

            fileReader.readAsDataURL(e.target.files[0])

            fileReader.onload = (e) => {
                this.product.image = e.target.result
            }
        }

        
    }
}
</script>
