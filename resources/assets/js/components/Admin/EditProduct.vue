<template>
    <div>
        <h1>Edit Product</h1>
        <div class="container">
            <form @submit.prevent="saveProduct" action="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text" v-model="product.name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <select>
                                <option v-for="category in categories" v-bind:key="category.id" v-bind:value="category.id">{{ category.title }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text" v-model="product.price">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <textarea v-model="product.description" name="" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="submit" value="Update">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
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
            category_id:'',
            product_id:''
        }
    },

    created() {
        this.fetchCategories();
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
                    method: 'put',
                    body: JSON.stringify(this.product),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .catch(err => console.log(err))
        }

        
    }
}
</script>
