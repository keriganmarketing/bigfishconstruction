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
        <header>
            <nav role="navigation">
                {{ wp_nav_menu(['theme_location' => 'primary-menu']) }}
            </nav>
        </header>

        @yield('content')
    </div>

  {{ wp_footer() }}
  @yield('footer-scripts')
</body>
</html>