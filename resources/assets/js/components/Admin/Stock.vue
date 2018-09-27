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
                            <li><a href="#">Stocks</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                    
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Stocks</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                              <thead>
                                <th>
                                    Product Name
                                </th>
                                <th></th>
                              </thead>
                              <tbody>
                                <tr v-for="stock in stocks" v-bind:key="stock.id" v-bind:value="stock.id">
                                  <td>{{ stock.relationships.product.name }}</td>
                                  <td>
                                    <button @click="updateQuantityBy(stock, stock.quantity+1)" class="btn btn-success">+</button>
                                    <input style="text-align: center;" type="number" v-bind:value="stock.quantity" />
                                    <button @click="updateQuantityBy(stock, stock.quantity-1)" class="btn btn-danger">-</button>
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
            stocks: [],
            stock:{
                product_id: '',
                quantity: 0,
                relationships:{
                    product: {
                        category_id: '',
                        description:'',
                        id:'',
                        image:'',
                        name:'',
                        price:''
                    }
                },
                id: ''
            },
            product_id:''
        }
    },
    
    created() {
        this.fetchStocks();
    },

    methods: {
        fetchStocks() {
            fetch('/api/stocks')
                .then(res => res.json())
                .then(res => {
                    this.stocks = res.data;
                    //alert(JSON.stringify(this.stocks));
                })
        },

        updateQuantityBy(stock, by)
        {
            stock.quantity = by;
            fetch('/api/stock',{
                method: 'put',
                body: JSON.stringify(stock),
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then(res => res.json())
            .catch(err => console.log(err))
            //window.location.href = '/dashboard/stocks';
        }
    }
}
</script>