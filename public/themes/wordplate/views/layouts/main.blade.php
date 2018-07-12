<!DOCTYPE html>
<html {{ language_attributes() }}>
<head>
  <meta charset="{{ bloginfo('charset') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#6d9aea">
  {{ wp_head() }}
</head>
<body {{ body_class() }}>
    <div id="app">
        <div class="site-wrapper" :class="{'full-height': footerStuck, 'scrolling': isScrolling }">
            <header class="top">
                <div role="navigation" class="navbar navbar-expand-xl" >
                    <div class="container d-flex justify-content-between">
                        <div class="main-navigation collapse navbar-collapse flex-grow-0">
                            <main-menu :main-nav="{{ json_encode(wp_get_nav_menu_items(3)) }}" class="navbar-nav mr-auto"></main-menu>
                        </div>
                        <div class="text-center flex-xl-grow-1" >
                            <a class="logo" href="/">
                                <img src="/themes/wordplate/assets/images/bigfish-logo.png" alt="Big Fish Construction" >
                            </a>
                        </div>
                        <button @click="toggleMenu" class="d-xl-none btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#mobilemenu" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                            MENU <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                        <div class="main-navigation collapse navbar-collapse flex-grow-0">
                            <main-menu :main-nav="{{ json_encode(wp_get_nav_menu_items(4)) }}" class="navbar-nav ml-auto"></main-menu>
                        </div>
                    </div>
                    <div v-if="mobileMenuOpen" class="mobile-menu" ref="mobileMenuContainer" :class="{ 'open': this.mobileMenuOpen }" >
                        <mobile-menu :mobile-nav="{{ json_encode(wp_get_nav_menu_items(5)) }}" class="navbar-nav m-auto" ></mobile-menu>
                    </div>
                </div>
            </header>

            @yield('content')

            <footer class="sticky-footer bg-dark py-4">
                <footer-menu></footer-menu>
                <social-icons :size="40" :margin=".25" ></social-icons>
                <p class="copyright text-center">&copy;{{ date('Y') }} {{ get_bloginfo() }}.</p>
            </footer>
        </div>
    </div>

  {{ wp_footer() }}
  @yield('footer-scripts')
</body>
</html>