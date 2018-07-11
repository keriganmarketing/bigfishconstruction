<template>
    <ul>
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

        props: {
            mainNav: {}
        }

    }
</script>
<style>
    .main-navigation li a.nav-link {
        color: #848484;
    }
    .dropdown-menu {
        border: 0;
        border-top: .5rem solid #999;
        margin-top: -1px;
        border-radius: 0;
        padding: 0;
        background-color: #FFF; 
    }
    .main-navigation .dropdown:hover .dropdown-menu {
        display: block;
    }
    .main-navigation .dropdown-menu li a.dropdown-item {
        color: #FFF;
    }
    .main-navigation .dropdown-menu li a.dropdown-item:hover {
        color: #848484;
        background-color: #FFF ;
    }
</style>