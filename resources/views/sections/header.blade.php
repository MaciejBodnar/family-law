@php
    $headerLogoText = ewa_kodymowska_siola_get_language_option(
        'header_logo_text',
        get_bloginfo('name') ?: 'Ewa Kodymowska-Sioła',
    );
    $headerLogoLink = ewa_kodymowska_siola_get_language_option('header_logo_link');
    $showLanguageSwitcher = ewa_kodymowska_siola_get_language_option('header_show_language_switcher', true);
    $menuOpenLabel = ewa_kodymowska_siola_get_language_option('global_menu_open_label', 'Menu');
    $menuCloseLabel = ewa_kodymowska_siola_get_language_option('global_menu_close_label', 'Zamknij');

    $logoUrl = is_array($headerLogoLink)
        ? $headerLogoLink['url'] ?? home_url('/')
        : (is_string($headerLogoLink) && $headerLogoLink
            ? $headerLogoLink
            : home_url('/'));

    $languages = function_exists('pll_the_languages')
        ? pll_the_languages([
            'raw' => 1,
            'show_flags' => 1,
            'show_names' => 0,
            'hide_current' => 0,
            'hide_if_empty' => 0,
        ])
        : [];

    $flagSlugMap = [
        'en' => 'gb',
    ];
@endphp

<header class="fixed left-0 top-0 z-50 h-19.5 w-full bg-[#1B2D18] text-white">
    <div class="relative h-full overflow-hidden">
        {{-- Dark blue diagonal area --}}
        <div
            class="absolute right-0 top-0 h-full w-[53%] bg-[#1C1D47] [clip-path:polygon(8%_0,100%_0,100%_100%,0_100%)]">
        </div>

        <div
            class="relative z-10 md:mx-37.5 flex h-full max-w-407.5 items-center justify-end md:justify-between px-6 md:px-0">
            {{-- Logo --}}
            <a href="{{ $logoUrl }}"
                class="hidden md:block text-[24px] font-light leading-none tracking-[0.03em] text-white"
                aria-label="{{ $headerLogoText }}">
                {{ $headerLogoText }}
            </a>

            <div class="flex items-center gap-10.5">
                {{-- Polylang flags --}}
                @if ($showLanguageSwitcher && !empty($languages))
                    <nav class="hidden md:flex items-center gap-3.75" aria-label="Language switcher">
                        @foreach ($languages as $language)
                            <a href="{{ $language['url'] ?? '#' }}"
                                class="block h-5 w-5 overflow-hidden rounded-full opacity-80 transition-opacity hover:grayscale-0 {{ !empty($language['current_lang']) ? 'opacity-100' : 'grayscale' }}"
                                aria-label="{{ $language['name'] ?? '' }}">
                                <img src="https://kapowaz.github.io/circle-flags/flags/{{ $flagSlugMap[$language['slug']] ?? ($language['slug'] ?? '') }}.svg"
                                    alt="{{ $language['name'] ?? '' }}" class="h-full w-full" />
                            </a>
                        @endforeach
                    </nav>
                @endif

                {{-- Menu button --}}
                <button type="button" class="js-menu-open flex items-center gap-4.5 text-white" aria-haspopup="dialog"
                    aria-controls="site-menu-dialog">
                    <img src="{{ asset('resources/images/menu.svg') }}" alt="">

                    <span class="text-[15px] font-bold uppercase leading-none tracking-[0.42em]">
                        {{ $menuOpenLabel }}
                    </span>
                </button>
            </div>
        </div>
    </div>
</header>

<dialog id="site-menu-dialog"
    class="site-menu-dialog fixed inset-0 z-100 h-screen w-screen max-w-none bg-transparent p-0 text-white backdrop:bg-transparent">
    <div class="bg-[#1C1D47]/96 px-6 pt-8.5 pb-20 md:px-27.5">
        <div class="mx-auto flex max-w-375 items-center justify-end md:justify-between">
            <a href="{{ $logoUrl }}"
                class="hidden md:block text-[24px] font-light leading-none tracking-[0.03em] text-white">
                {{ $headerLogoText }}
            </a>

            <button type="button" class="js-menu-close flex items-center gap-4.5 text-white"
                aria-label="{{ $menuCloseLabel }}">
                <span class="relative block h-5.5 w-5.5">
                    <span class="absolute left-0 top-2.5 block h-0.5 w-5.5 rotate-45 bg-white"></span>
                    <span class="absolute left-0 top-2.5 block h-0.5 w-5.5 -rotate-45 bg-white"></span>
                </span>

                <span class="text-[15px] font-bold uppercase leading-none tracking-[0.42em]">
                    {{ $menuCloseLabel }}
                </span>
            </button>
        </div>

        <div class="mx-auto grid max-w-375 grid-cols-1 gap-16 pt-8 md:pt-20 md:grid-cols-[1fr_360px]">
            <nav class="site-menu-nav" aria-label="Main menu">
                {!! wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'container' => false,
                    'menu_class' => 'site-menu-list',
                    'fallback_cb' => false,
                    'echo' => false,
                ]) !!}
            </nav>

            <div class="pt-4 text-white/45">
                @if (!empty($languages))
                    <div class="flex items-center gap-3.75">
                        @foreach ($languages as $language)
                            <a href="{{ $language['url'] ?? '#' }}"
                                class="block h-5.5 w-5.5 overflow-hidden rounded-full opacity-80 transition-opacity hover:grayscale-0 {{ !empty($language['current_lang']) ? 'opacity-100' : 'grayscale' }}"
                                aria-label="{{ $language['name'] ?? '' }}">
                                <img src="https://kapowaz.github.io/circle-flags/flags/{{ $flagSlugMap[$language['slug']] ?? ($language['slug'] ?? '') }}.svg"
                                    alt="{{ $language['name'] ?? '' }}" class="h-full w-full" />
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</dialog>
