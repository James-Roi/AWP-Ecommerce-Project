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
                            <li><a href="#">Packages</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="container">
                        <a href="/dashboard/package/add" class="btn btn-primary">Add Package</a>
                    </div>
                    <br>
                <div class="col-lg-12">
                    
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Packages</strong>
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
                                <th>
                                    Price
                                </th>
                                <th></th>
                              </thead>
                              <tbody>
                                <tr v-for="tpackage in packages" v-bind:key="tpackage.id" v-bind:value="tpackage.id">
                                  <td>{{ tpackage.title }}</td>
                                  <td>{{ tpackage.description }}</td>
                                  <td>{{ tpackage.price }}</td>
                                  <td>
                                    <a class="btn btn-primary" v-bind:href="'../dashboard/package/' + tpackage.id">View Information</a>
                                    <a class="btn btn-warning" v-bind:href="'../dashboard/package/' + tpackage.id">Edit</a>
                                    <button @click="deletePackage(tpackage.id, tpackage.title)" class="btn btn-danger">Delete</button>
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
            packages: [],
            tpackage: {
                title:'',
                description:'',
                price: ''
            },
            package_id: 0
        }
    },

    created() {
        this.fetchPackages();
    },

    methods: {
        fetchPackages() {
            fetch('/api/packages')
                .then(res => res.json())
                .then(res => {
                    this.packages    = res.data;
                })
        },
        deletePackage(package_id,package_title)
        {
            var action = confirm("Are you sure you want to delete package "+package_title+" with id of "+ package_id);
            if(action == true)
            {
                fetch(`/api/package/${package_id}`,{
                    method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('Package '+package_title+' removed.');
                    this.fetchPackages();
                })
                .catch(err => console.log(err));
            }
        }
    }
}
</script>