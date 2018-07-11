<template>
    <div role="navigation">
        <div class="container d-flex justify-content-between">
            <div class="main-navigation collapse navbar-collapse flex-grow-0">
                <main-menu :main-nav="mainNavLeft" class="navbar-nav mr-auto"></main-menu>
            </div>
            <div class="text-center flex-xl-grow-1" >
                <a class="logo" href="/">
                    <img src="/themes/wordplate/assets/images/bigfish-logo.png" alt="Big Fish Construction" >
                </a>
            </div>
            <button @click="toggleMenu" class="d-xl-none btn btn-primary font-weight-bold" type="button" data-toggle="collapse" data-target="#mobilemenu" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i> MENU
            </button>
            <div class="main-navigation collapse navbar-collapse flex-grow-0">
                <main-menu :main-nav="mainNavRight" class="navbar-nav ml-auto"></main-menu>
            </div>
        </div>
        <div v-if="mobileMenuOpen" class="mobile-menu" ref="mobileMenuContainer">
            <mobile-menu :mobile-nav="mobileNav" ></mobile-menu>
        </div>
    </div>
</template>

<script>
    export default {

        data () {
            return {
                mobileMenuOpen: false,
                mainNavLeft: [],
                mainNavRight: [],
                mobileNav: []
            }
        },

        mounted () {
            axios.get("/wp-json/wp-api-menus/v2/menu-locations/main-top-left")
                .then(response => {
                    response.data.forEach( item => {
                        item.subMenuOpen = false;
                        this.mainNavLeft.push(item);
                    });
                });

            axios.get("/wp-json/wp-api-menus/v2/menu-locations/main-top-right")
                .then(response => {
                    response.data.forEach( item => {
                        item.subMenuOpen = false;
                        this.mainNavRight.push(item);
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