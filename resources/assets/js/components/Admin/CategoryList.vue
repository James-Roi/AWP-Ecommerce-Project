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
                            <li><a href="#">Categories</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="container">
                        <a href="/dashboard/category/add" class="btn btn-primary">Add Category</a>
                    </div>
                    <br>
                <div class="col-lg-12">
                    
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Categories</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                              <thead>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Description
                                </th>
                                <th></th>
                              </thead>
                              <tbody>
                                <tr v-for="category in categories" v-bind:key="category.id" v-bind:value="category.id">
                                  <td>{{ category.title }}</td>
                                  <td>{{ category.description }}</td>
                                  <td>
                                    <a class="btn btn-warning" v-bind:href="'../dashboard/category/' + category.id">Edit</a>
                                    <button @click="deleteCategory(category.id)" class="btn btn-danger">Delete</button>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
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
            categories: [],
            category: {
                title:'',
                description:'',
                id: ''
            },
            category_id: 0
        }
    },

    created() {
        this.fetchCategories();
    },

    methods: {
        fetchCategories() {
            fetch('/api/categories')
                .then(res => res.json())
                .then(res => {
                    this.categories = res.data;
                })
        },
        deleteCategory(category_id,category_title)
        {
            var action = confirm("Are you sure you want to delete category "+category_title+" with id of "+ category_id);
            if(action == true)
            {
                fetch(`/api/category/${category_title}`,{
                    method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('Category '+category_title+' removed.');
                    this.fetchProducts();
                })
                .catch(err => console.log(err));
            }
        }
    }
}
</script>
