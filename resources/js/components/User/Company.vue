<template>
    <div class="col-md-6  col-lg-4">
        <div class="card  d-block border hover-shadow-6 h-250 mb-6">
            <div class="p-6 text-center pl-3 pr-3">
                <br>
                <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">{{ company.name }}</a></p>
                <p>{{ company.phone }} | {{ company.email }}</p>

                <a class="small ls-1" target="_blank" :href="company.website">{{ company.website }} <span class="pl-1">⟶</span></a>
                <br>
                <br>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Company",

    props: ['company'],
}
</script>

<style scoped>

</style>
