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
            @include('partials.header')

            @yield('content')

            @include('partials.footer')
        </div>
    </div>

    {{ wp_footer() }}
    @yield('footer-scripts')
</body>
</html>