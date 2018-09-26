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
                    <form @submit.prevent="savePackage" action="">
                    <div class="card">
                      <div class="card-header"><strong> {{ page_title }}</strong></div>
                      <div class="card-body card-block">
                        <div class="form-group">
                            <label for="tpackage_title" class=" form-control-label">Package Title</label>
                            <input type="text" id="tpackage_title" placeholder="Package Title" v-model="tpackage.title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tpackage_description" class="form-control-label">Description</label>
                            <br>
                            <textarea v-model="tpackage.description" name="tpackage_description" id="" cols="64" rows="5" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="package_price" class=" form-control-label">Price</label>
                            <input type="number" step=".01" id="package_price" placeholder="Package Price" v-model="tpackage.price" class="form-control">
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
            page_title: 'Edit Package',
            method_type: 'put',
            tpackage: {
                title:'',
                description:'',
                price: '0.00',
                id: ''
            }
        }
    },
    
    created() {
        if(window.location.pathname.split('/')[3] == 'add'){
            this.page_title = 'Add Package';
            this.method_type = 'post';
        }
        else
            this.fetchPackage(window.location.pathname.split('/')[3]);
    },

    methods: {
        fetchPackage(package_id) {
            fetch(`/api/package/${package_id}`,{
                method: 'get'
            })
            .then(res => res.json())
            .then(res => {
               this.tpackage = res.data;
            })
        },
        savePackage(){
                fetch('/api/package',{
                    method: this.method_type,
                    body: JSON.stringify(this.tpackage),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .catch(err => console.log(err))
                window.location.href = '/dashboard/packages';
        }
    }
}
</script>
