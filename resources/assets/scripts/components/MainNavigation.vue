<template>
    <div role="navigation" class="navbar navbar-expand-md navbar-dark bg-dark">
        <div v-if="mobileMenuOpen" v-html="mobileNav"></div>
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
            </a>
            <button @click="toggleMenu" class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#mobilemenu" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div v-html="mainNav"></div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['mainNav', 'mobileNav', 'mobileMenuOpen'],

        data () {
            return {
                menuItems: []
            }
        },

        methods: {

            toggleMenu() {
                this.mobileMenuOpen = !this.mobileMenuOpen;
            },

            handleMobileSubMenu(){
                this.menuItems.forEach(menuItem => {
                    let menuLink = menuItem.querySelector('.mobile-expand .fa');
        
                    //check if submenu is available
                    if(menuLink != null) {

                        //catch click action
                        menuLink.addEventListener('click', function (e) {
                            e.preventDefault();

                            //change icon
                            if (menuLink.classList.contains('fa-plus-circle')) {
                                menuLink.classList.remove('fa-plus-circle');
                                menuLink.classList.add('fa-minus-circle');
                            } else {
                                menuLink.classList.add('fa-plus-circle');
                                menuLink.classList.remove('fa-minus-circle');
                            }

                            //open sub-menu
                            let menu = menuItem.querySelector('.submenu-menu');
                            if (menu.classList.contains('is-open')) {
                                menu.classList.remove('is-open');
                            } else {
                                menu.classList.add('is-open');
                            }
                        });
                    }
                });
            }

        },

        mounted() {
            this.menuItems = this.$el.querySelectorAll('#mobilemenu .nav-item');
            this.handleMobileSubMenu();
        }
    }
</script>