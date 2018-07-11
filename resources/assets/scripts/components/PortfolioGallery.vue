<template>
    <div class="portfolio-gallery">
        <div class="row">
            <div v-for="(project, index) in portfolioItems" :key="index" class="col-md-6 col-lg-4">
                <div class="card project-tile text-center border-light">
                    <a :href="project.link" >
                        <img :src="project.photo.sizes.medium" class="card-img-top" :alt="project.name" >
                    </a>
                    <div class="card-body">
                        <h3>{{ project.name }}</h3>
                        <p>{{ project.build_location[0].name }}</p>
                    </div>
                </div>
                <div class="project-button text-center">
                    <a :href="project.link" class="btn btn-outline-light" >View Project</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            portfolioItems: [],
            location: '',
            limit: '',
            type: ''
        }
    },

    created () {

        let request = '?1=1';
        request += (this.location != '' ? '&building-location=' + this.location : '' );
        request += (this.type != '' ? '&construction-type=' + this.type : '' );
        request += (this.limit != '' ? '&limit=' + this.limit : '' );

        axios.get("/wp-json/kerigansolutions/v1/projects" + request)
            .then(response => {
                this.portfolioItems = response.data; 
            });
    }
}
</script>

<style>

</style>
