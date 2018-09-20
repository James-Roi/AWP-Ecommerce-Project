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
                    <form @submit.prevent="saveCategory" action="">
                    <div class="card">
                      <div class="card-header"><strong> {{ page_title }}</strong></div>
                      <div class="card-body card-block">
                        <div class="form-group">
                            <label for="category_title" class=" form-control-label">Category Title</label>
                            <input type="text" id="category_title" placeholder="Category Title" v-model="category.title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="category_description" class="form-control-label">Description</label>
                            <br>
                            <textarea v-model="category.description" name="category_description" id="" cols="64" rows="5" placeholder="Description"></textarea>
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
            page_title: 'Edit Category',
            method_type: 'put',
            category: {
                title:'',
                description:'',
                id: ''
            }
        }
    },
    
    created() {
        if(window.location.pathname.split('/')[3] == 'add'){
            this.page_title = 'Add Category';
            this.method_type = 'post';
        }
        else
            this.fetchCategory(window.location.pathname.split('/')[3]);
    },

    methods: {
        fetchCategory(category_id) {
            fetch(`/api/category/${category_id}`,{
                method: 'get'
            })
            .then(res => res.json())
            .then(res => {
               this.category = res.data;
            })
        },
        saveCategory(){
                fetch('/api/category',{
                    method: this.method_type,
                    body: JSON.stringify(this.category),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .catch(err => console.log(err))
                window.location.href = '/dashboard/categories';
        }
    }
}
</script>
