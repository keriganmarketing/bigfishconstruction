<template>
    <div class="portfolio-gallery">
        <div class="row">
            <div v-for="(project, index) in portfolioItems" :key="index" class="col-md-6 col-lg-4">
                <div class="card project-tile text-center">
                    <a :href="project.link" >
                        <img :src="project.link" class="card-img-top" :alt="project.title.rendered" >
                    </a>
                    <div class="card-body">
                        <h3>{{ project.title.rendered }}</h3>
                    </div>
                </div>
                <a :href="project.link" class="btn btn-primary btn-outline-light" >View Project</a>
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
        let location = (this.location != '' ? 'category=' + this.category : '');
        let type = (this.type != '' ? 'category=' + this.category : '');
        let limit = (this.limit != '' ? 'limit=' + this.limit : '');
        let request = '';

        //TODO: convert into request for api endpoint

        axios.get("/wp-json/wp/v2/project" + request)
            .then(response => {
                this.portfolioItems = response.data; 
            });
    }
}
</script>

<style>

</style>
