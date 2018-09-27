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
                                        Products <span class="pull-right"><a href="" class="btn btn-primary">Add</a></span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-tasks"></i> Recent Activity <span class="pull-right">15</span></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-bell-o"></i> Notification <span class="pull-right">11</span></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-comments-o"></i> Message <span class="badge badge-warning pull-right r-activity">03</span></a>
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
    </div>
</template>

<script>
export default {
    data(){
        return{
            tpackage: {
                title:'',
                description:'',
                price: '0.00',
                id: ''
            }
        }
    },
    
    created() {
        this.fetchPackage(window.location.pathname.split('/')[4]);
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
        }
    }
}
</script>
