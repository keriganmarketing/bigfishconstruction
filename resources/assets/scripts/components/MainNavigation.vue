<template>
    <div role="navigation">
        <div v-if="mobileMenuOpen" class="mobile-menu" ref="mobileMenuContainer">
            <mobile-menu :mobile-nav="mobileNav" ></mobile-menu>
        </div>
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
            </a>
            <button @click="toggleMenu" class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#mobilemenu" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="main-navigation collapse navbar-collapse">
                <main-menu :main-nav="mainNav"></main-menu>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data () {
            return {
                mobileMenuOpen: false,
                mainNav: [],
                mobileNav: []
            }
        },

        mounted () {
            axios.get("/wp-json/wp-api-menus/v2/menu-locations/main-navigation")
                .then(response => {
                    response.data.forEach( item => {
                        item.subMenuOpen = false;
                        this.mainNav.push(item);
                    });
                });

            axios.get("/wp-json/wp-api-menus/v2/menu-locations/mobile-navigation")
                .then(response => {
                    response.data.forEach( item => {
                        item.subMenuOpen = false;
                        this.mobileNav.push(item);
                    });
                });
        },

        methods: {
            toggleMenu() {
                this.mobileMenuOpen = !this.mobileMenuOpen;
            }
        }
    }
</script>