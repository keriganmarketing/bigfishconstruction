<template>
    <ul class="navbar-nav ml-auto">
        <li v-for="(navitem, index) in mainNav" v-bind:key="index" class="nav-item" :class="{'dropdown': navitem.children.length > 0 }">
            <a :href="navitem.url" :class="'nav-link ' + navitem.classes">{{ navitem.title }}</a>
            <div class="dropdown-menu" v-if="navitem.children.length > 0" >
                <li v-for="(child, i) in navitem.children" v-bind:key="i">
                    <a :href="child.url" :class="'dropdown-item ' + child.classes">{{ child.title }}</a>
                </li>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {

        data () {
            return {
                mainNav: []
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
        }

    }
</script>
<style>
    .dropdown-menu {
        border: 0;
        border-top: .5rem solid #999;
        margin-top: -1px;
        border-radius: 0;
        padding: 0;
        background-color: #222; 
    }
    .main-navigation .dropdown:hover .dropdown-menu {
        display: block;
    }
    .main-navigation .dropdown-menu li a.dropdown-item {
        color: rgba(255, 255, 255, 0.5);
    }
    .main-navigation .dropdown-menu li a.dropdown-item:hover {
        color: rgba(255, 255, 255, 0.8);
        background-color: #111 ;
    }
</style>