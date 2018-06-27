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
                'theme_location' => 'primary-menu',
                'menu_class'     => 'navbar-nav m-auto'
            ]) }}
        </mobile-nav>
        <header>
            <nav role="navigation" class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container d-flex flex-column flex-md-row justify-content-between">
                    <a class="navbar-brand" href="/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
                    </a>
                    <button @click="toggleMenu" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobilemenu" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="mainmenu" class="collapse navbar-collapse">
                        {{ wp_nav_menu([
                            'theme_location' => 'primary-menu',
                            'menu_class'     => 'navbar-nav ml-auto'
                        ]) }}
                    </div>
                </div>
            </nav>
        </header>

        @yield('content')
    </div>

  {{ wp_footer() }}
  @yield('footer-scripts')
</body>
</html>