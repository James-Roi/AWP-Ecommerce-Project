<template>
    
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
        }
    }
</script>

<style>

</style>
