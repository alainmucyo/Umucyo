<template>
    <div>@{{ test }}</div>
</template>

<script>
    export default {
        mounted() {
            this.$http.get('/test/'+this.level_id)
                .then((resp) =>{
                console.log(resp)
            })

        },

       props: ['level_id'],

    }
</script>
