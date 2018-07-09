<template>
    <ul class="navbar-nav mx-auto footer-nav">
        <li v-for="(navitem, index) in footerNav" v-bind:key="index" class="nav-item" >
            <a :href="navitem.url" :class="'nav-link ' + navitem.classes">{{ navitem.title }}</a>
        </li>
    </ul>
</template>
<script>
    export default {

        data () {
            return {
                footerNav: []
            }
        },

        created () {
            axios.get("/wp-json/wp-api-menus/v2/menu-locations/footer-navigation")
                .then(response => {
                    response.data.forEach( item => {
                        item.subMenuOpen = false;
                        this.footerNav.push(item);
                    });
                });
        }
    }
</script> 
<style>
.footer-nav {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    padding-bottom: 1rem;
}
.footer-nav a.nav-link {
    display: block;
    padding: .5rem 1rem;
    text-align: center;
}
@media screen and (min-width: 767px){
    .footer-nav {
        flex-direction: row;
    }
}
</style>