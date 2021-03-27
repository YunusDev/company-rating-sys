<template>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="mb-4" style="position: absolute; right: 0; margin-bottom: 50px">
                    <button style="padding: 10px" @click="createCompany()" class="  btn btn-primary">
                        <i class="fas fa-plus" style="padding-right: 10px"></i>Add New Category
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive box-body">
                    <table class="table table-striped table-md">
                        <tbody><tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Website</th>
                            <th>Rating</th>
                            <th>Created At</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <tr v-for="company, key in companiesData.data">
                            <td>{{key+1}}</td>
                            <td>{{company.name}}</td>
                            <td>{{company.email}}</td>
                            <td>{{company.phone}}</td>
                            <td>{{company.website}}</td>
                            <td>{{parseFloat(company.avg_rating).toFixed(2)}}</td>
                            <td>{{company.formatted_date}}</td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        </tr>
                        </tbody></table>
                </div>
            </div>
            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    <ul style="cursor: pointer" class="pagination mb-0">
                        <li class="page-item " :class="{'disabled': companiesData.current_page === 1}">
                            <a class="page-link"
                               @click="getCompanies(companiesData.current_page - 1)" tabindex="-1">
                                <i class="fas fa-chevron-left mr-3"></i>
                            Previous</a>
                        </li>
                        <li style="cursor: pointer" class="page-item cursor" :class="{'disabled': companiesData.current_page === companiesData.last_page}">
                            <a class="page-link"
                               @click="getCompanies(companiesData.current_page + 1)" >
                                Next <i class="fas fa-chevron-right ml-3"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "Companies",

    data(){

        return {

            companiesData: {}
        }
    },


    mounted(){

        this.getCompanies()
    },

    methods: {

        createCompany(){



        },

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
