<template>
    <section class="section bg-gray">
        <div class="container-fluid">
            <div class="row col-md-10 gap-y mx-auto" style="">
                <company v-for="company in companiesData.data" :key="company.id" :company="company"  ></company>
                <br>
                <br>
                <nav class="flexbox mt-6 col-md-12">
                    <a class="btn btn-white" :class="{'disabled': companiesData.current_page === 1}"
                       @click="getCompanies(companiesData.current_page - 1)">
                        <i class="ti-arrow-left fs-9 mr-2"></i> Newer
                    </a>
                    <a class="btn btn-white" :class="{'disabled': companiesData.current_page === companiesData.last_page}"
                       @click="getCompanies(companiesData.current_page + 1)">
                        Older <i class="ti-arrow-right fs-9 ml-2"></i>
                    </a>
                </nav>
            </div>

        </div>
    </section>
</template>

<script>
import Company from "./Company";
export default {
    name: "Companies",

    components: {Company},

    data(){

        return {

            companiesData: {}
        }
    },

    created() {
        this.getCompanies();
    },

    methods: {
        getCompanies(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
            this.$http.get('/companies?page=' + page)
                .then(response => {
                    this.companiesData = response.data;
                }).catch(err => {
                    console.log(err)
            });
        }
    }
}
</script>

<style scoped>

</style>
