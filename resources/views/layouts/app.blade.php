<!doctype html>
<html @php(language_attributes())>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ esc_attr(get_bloginfo('description')) }}">
    <meta name="author" content="{{ esc_attr(get_bloginfo('name')) }}">
    <meta name="keywords"
        content="Ewa Kodymowska-Sioła, adwokat, kancelaria adwokacka, prawo rodzinne, prawo spadkowe, prawo cywilne, rozwody, alimenty, podział majątku, testamenty, dziedziczenie, mediacje rodzinne, porady prawne, Kraków, divorce lawyer, family law, inheritance law, civil law, mediation, legal advice, Poland, international family law, strategic divorces, domestic violence, safety, Hague Convention, relocations, międzynarodowe prawo rodzinne, strategiczne rozwody, przemoc domowa, bezpieczeństwo, konwencja haska, relokacje">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="{{ esc_attr(get_bloginfo('name')) }}">
    <meta property="og:description" content="{{ esc_attr(get_bloginfo('description')) }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ esc_url(home_url('/')) }}">
    <meta property="og:image" content="{{ esc_url(get_theme_file_uri('/resources/images/og.png')) }}">
    <link rel="stylesheet" href="https://use.typekit.net/fdb5oss.css">
    @php(do_action('get_header'))
    @php(wp_head())
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body @php(body_class())>
    @php(wp_body_open())

    <div id="app">
        <a class="sr-only focus:not-sr-only" href="#main">
            {{ __('Skip to content', 'sage') }}
        </a>

        @include('sections.header')

        <main id="main" class="main">
            @yield('content')
        </main>

        @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
</body>

</html>
