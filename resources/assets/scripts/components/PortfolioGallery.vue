<template>
    <div class="portfolio-gallery">
        <div class="row">
            <button
                v-for="location in locations"
                @click="getLocation(location.slug)"
                :class="{'btn btn-danger': selectedLocation === location.slug }"
            >
                {{ location.name }}
            </button>
        </div>
        <div class="row">
            <button
                v-for="constructionType in constructionTypes"
                @click="getType(constructionType.slug)"
                :class="{'btn btn-danger': selectedType === constructionType.slug }"
            >
                {{ constructionType.name }}
            </button>
        </div>
        <transition-group name="project-list" tag="div" class="row">
            <div v-for="(project, index) in portfolioItems" :key="index" class="col-md-6 col-lg-4">
                <div class="card project-tile text-center border-light project-list-item">
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
        </transition-group>
    </div>
</template>

<script>
export default {
    props: ['locations', 'constructionTypes', 'limit'],
    data () {
        return {
            portfolioItems: [],
            selectedLocation: '',
            selectedType: ''
        }
    },

    created () {
        this.fetch();
    },
    methods: {
        fetch() {
            let request = '?1=1';
            request += (this.selectedLocation != '' ? '&build-location=' + this.selectedLocation : '' );
            request += (this.selectedType != '' ? '&construction-type=' + this.selectedType : '' );
            request += (this.limit != '' ? '&limit=' + this.limit : '' );

            axios.get("/wp-json/kerigansolutions/v1/projects" + request)
                .then(response => {
                    this.portfolioItems = response.data;
                }
            );
        },
        getLocation(slug) {
            this.selectedLocation = slug;
            this.fetch();
        },
        getType(slug) {
            this.selectedType = slug;
            this.fetch();
        },
    }
}
</script>

<style>
.project-list-enter-active, .project-list-leave-active {
  transition: all 1s;
}
.project-list-enter, .project-list-leave-to /* .list-leave-active below version 2.1.8 */ {
  opacity: 0;
  transform: translateY(30px);
}
</style>
