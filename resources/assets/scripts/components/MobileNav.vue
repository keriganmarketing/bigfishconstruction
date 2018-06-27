<template>
    <div>
        <div id="mobilemenu" :class="{ 'd-none': !mobileMenuOpen }" >
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            mobileMenuOpen: false,
            menuItems: []
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