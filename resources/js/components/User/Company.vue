<template>
    <div class="col-md-6  col-lg-4">
        <div class="card  d-block border hover-shadow-6 h-250 mb-6">
           <div class="row mb-0">
               <div class="col-md-12 star-right" >
                   <star-rating :read-only="true" :increment="0.5" :rating="parseFloat(company.average_rating)" :star-size="14" :show-rating="false"></star-rating>
               </div>
           </div>
            <div class=" pl-3 text-center pr-3">
                <p class="small-5 text-lighter text-uppercase ls-2 fw-400">{{ company.name }}</p>
                <p>{{ company.phone }} | {{ company.email }}</p>
                <a class="small ls-1" target="_blank" :href="company.website">{{ company.website }} <span class="pl-1">⟶</span></a>
                <br>
                <div class="star" v-if="!company.is_rated" >
                    <star-rating @rating-selected ="setRating" :star-size="25" :show-rating="false"></star-rating>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
</template>

<script>
import StarRating from 'vue-star-rating'
export default {
    name: "Company",

    props: ['company', 'is_auth'],

    components: {
        StarRating
    },

    methods: {

        setRating(rating){

            if(!this.is_auth){
               window.location  = '/login'
                return
            }
            this.$http.post(`/company/${this.company.id}/rate`, {
                rating
            }).then(response => {
                const { company } = response.data
                this.company.average_rating = company.average_rating
                this.company.is_rated = company.is_rated
                console.log(response.data)
                }).catch(err => {
                console.log(err)
            });
        }
    }
}
</script>

<style scoped>

    div.star{
        margin-top: 10px;
        width: 35%;
        margin-left: 30%;
    }

    div.star-right{
        /*margin-left: 65%;*/
        margin: 10px 0 8px 65%;

    }

    div.star i{
        margin-right: 5px;
    }

    .display-none{
        display: none !important;
    }
</style>
