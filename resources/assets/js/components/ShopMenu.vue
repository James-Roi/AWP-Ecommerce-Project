<template>
<div class="shop_sidebar_area">

<!-- ##### Single Widget ##### -->
<div class="widget catagory mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Catagories</h6>

    <!--  Catagories  -->
    <div class="catagories-menu">
        <ul>
            <li class="active"><a href="#">Mineral water</a></li>
            <li v-for="category in categories" v-bind:key="category.id"><a href="#">{{ category.title }}</a></li>
        </ul>
    </div>
</div>

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
            category_id:''
        }
    },

    created() {
        this.fetchCategories();
    },

    methods: {
        fetchCategories() {
            fetch('api/categories')
                .then(res => res.json())
                .then(res => {
                    this.categories = res.data;
                })
        }
    }
}
</script>