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
            <header>
                <main-navigation main-nav="{{ $kma['mainNav'] }}" mobile-nav="{{ $kma['mobileNav'] }}" ></main-navigation>
            </header>

            @yield('content')

            <footer class="sticky-footer bg-dark py-4">
                <social-icons :size="40" :margin=".25" :icon-data="{{ json_encode($kma['socialLinks']) }}" ></social-icons>
                <p class="copyright text-center">&copy;{{ date('Y') }} {{ get_bloginfo() }}.</p>
            </footer>
        </div>
    </div>

  {{ wp_footer() }}
  @yield('footer-scripts')
</body>
</html>