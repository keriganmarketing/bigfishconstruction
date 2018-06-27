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
        <mobile-nav>
            {{ wp_nav_menu([
                'theme_location' => 'mobile-navigation',
                'menu_class'     => 'navbar-nav m-auto',
                'fallback_cb'    => 'main-navigation'
            ]) }}
        </mobile-nav>
        <header>
            <nav role="navigation" class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container d-flex justify-content-between">
                    <a class="navbar-brand" href="/">
                        WORDPLATE
                    </a>
                    <button @click="toggleMenu" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobilemenu" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    {{ wp_nav_menu([
                        'theme_location'  => 'main-navigation',
                        'container_class' => 'collapse navbar-collapse',
                        'menu_class'      => 'navbar-nav ml-auto'
                    ]) }}
                </div>
            </nav>
        </header>

        @yield('content')
    </div>

  {{ wp_footer() }}
  @yield('footer-scripts')
</body>
</html>