<template>
    <div role="navigation" class="navbar navbar-expand-md navbar-dark bg-dark">
        <div v-if="mobileMenuOpen" v-html="mobileNav" class="mobile-menu" ref="mobileMenuContainer"></div>
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
            </a>
            <button @click="toggleMenu" class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#mobilemenu" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div v-html="mainNav" class="main-navigation"></div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['mainNav', 'mobileNav'],

        data () {
            return {
                mobileMenuOpen: false,
                menuItems: []
            }
        },

        methods: {

            toggleMenu() {
                this.mobileMenuOpen = !this.mobileMenuOpen;
                this.menuItems = document.querySelectorAll('li.nav-item.dropdown');
                this.menuItems.forEach(menuItem => {                    
                    this.handleDropDown(menuItem);
                });
            },

            handleDropDown(menuItem){
                let link = menuItem.querySelector('.nav-link');
                let linkIcon = menuItem.querySelector('.nav-icon');  
                let dropDown = menuItem.querySelector('.dropdown-menu');
                
                window.addEventListener('click', (e) => {
                    console.log(e);
                    
                    //change icon
                    this.changeIcon(e.target);

                    //open sub-menu
                    this.openSubMenu(dropDown);
                });
            },

            changeIcon(menuIcon){
                console.log(menuIcon);
                if (menuIcon.classList.contains('fa-plus-circle')) {
                    menuIcon.classList.remove('fa-plus-circle');
                    menuIcon.classList.add('fa-minus-circle');
                } else {
                    menuIcon.classList.add('fa-plus-circle');
                    menuIcon.classList.remove('fa-minus-circle');
                }
            },

            openSubMenu(dropDown){
                console.log(dropDown);
                if (dropDown.classList.contains('is-open')) {
                    dropDown.classList.remove('is-open');
                } else {
                    dropDown.classList.add('is-open');
                }
            }
        }
    }
</script>
<style>
    .mobile-menu {
        display: block;
        width: 100%;
        padding: 2rem 0;
    }
    .mobile-menu .nav-icon {
        font-size:1.2em;
        padding: .25rem .5rem;
        position: absolute;
        right: 0;
        margin-top:-2.25rem;
        cursor: pointer;
    }
    .main-navigation .dropdown:hover .dropdown-menu,
    .mobile-menu .dropdown:hover .dropdown-menu.is-open {
        display: block;
    }
    .main-navigation .dropdown-menu li a.dropdown-item {
        color: #333;
    }
    .main-navigation .dropdown-menu li a.dropdown-item:hover {
        color: #000;
    }
</style>