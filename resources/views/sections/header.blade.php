@php
    $siteName = get_bloginfo('name') ?: 'Ewa Kodymowska-Sioła';

    $languages = function_exists('pll_the_languages')
        ? pll_the_languages([
            'raw' => 1,
            'show_flags' => 1,
            'show_names' => 0,
            'hide_current' => 0,
            'hide_if_empty' => 0,
        ])
        : [];
@endphp

<header class="fixed left-0 top-0 z-50 h-19.5 w-full bg-[#1B2D18] text-white">
    <div class="relative h-full overflow-hidden">
        {{-- Dark blue diagonal area --}}
        <div
            class="absolute right-0 top-0 h-full w-[53%] bg-[#1C1D47] [clip-path:polygon(8%_0,100%_0,100%_100%,0_100%)]">
        </div>

        <div class="relative z-10 mx-auto flex h-full max-w-407.5 items-center justify-between px-6 md:px-0">
            {{-- Logo --}}
            <a href="{{ home_url('/') }}" class="text-[30px] font-light leading-none tracking-[0.03em] text-white"
                aria-label="{{ $siteName }}">
                {{ $siteName }}
            </a>

            <div class="flex items-center gap-10.5">
                {{-- Polylang flags --}}
                @if (!empty($languages))
                    <nav class="flex items-center gap-3.75" aria-label="Language switcher">
                        @foreach ($languages as $language)
                            <a href="{{ $language['url'] ?? '#' }}"
                                class="block h-5 w-5 overflow-hidden rounded-full opacity-80 transition-opacity hover:opacity-100 {{ !empty($language['current_lang']) ? 'opacity-100' : '' }}"
                                aria-label="{{ $language['name'] ?? '' }}">
                                @if (!empty($language['flag']))
                                    {!! $language['flag'] !!}
                                @else
                                    <span class="text-[11px] uppercase">
                                        {{ $language['slug'] ?? '' }}
                                    </span>
                                @endif
                            </a>
                        @endforeach
                    </nav>
                @endif

                {{-- Menu button --}}
                <button type="button" class="js-menu-open flex items-center gap-4.5 text-white" aria-haspopup="dialog"
                    aria-controls="site-menu-dialog">
                    <span class="relative block h-4.25 w-5.25">
                        <span class="absolute left-0 top-0.5 block h-0.5 w-5.25 bg-white"></span>
                        <span class="absolute left-0 top-2 block h-0.5 w-5.25 bg-white"></span>
                        <span class="absolute left-0 top-3.5 block h-5.25 w-0 bg-white"></span>
                    </span>

                    <span class="text-[15px] font-bold uppercase leading-none tracking-[0.42em]">
                        Menu
                    </span>
                </button>
            </div>
        </div>
    </div>
</header>

<dialog id="site-menu-dialog"
    class="site-menu-dialog fixed inset-0 z-100 h-screen w-screen max-w-none bg-transparent p-0 text-white backdrop:bg-transparent">
    <div class="min-h-screen bg-[#1C1D47]/96 px-6 py-8.5 md:px-27.5">
        <div class="mx-auto flex max-w-375 items-center justify-between">
            <a href="{{ home_url('/') }}" class="text-[30px] font-light leading-none tracking-[0.03em] text-white">
                {{ $siteName }}
            </a>

            <button type="button" class="js-menu-close flex items-center gap-4.5 text-white" aria-label="Close menu">
                <span class="relative block h-5.5 w-5.5">
                    <span class="absolute left-0 top-2.5 block h-0.5 w-5.5 rotate-45 bg-white"></span>
                    <span class="absolute left-0 top-2.5 block h-0.5 w-5.5 -rotate-45 bg-white"></span>
                </span>

                <span class="text-[15px] font-bold uppercase leading-none tracking-[0.42em]">
                    Zamknij
                </span>
            </button>
        </div>

        <div class="mx-auto grid max-w-375 grid-cols-1 gap-16 pt-30 md:grid-cols-[1fr_360px]">
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
                <p class="mb-6.5 text-[17px] font-light leading-[1.6]">
                    Międzynarodowe prawo rodzinne, sprawy transgraniczne i strategiczne rozwody.
                </p>

                @if (!empty($languages))
                    <div class="flex items-center gap-3.75">
                        @foreach ($languages as $language)
                            <a href="{{ $language['url'] ?? '#' }}"
                                class="block h-5.5 w-5.5 overflow-hidden rounded-full opacity-80 transition-opacity hover:opacity-100 {{ !empty($language['current_lang']) ? 'opacity-100' : '' }}"
                                aria-label="{{ $language['name'] ?? '' }}">
                                @if (!empty($language['flag']))
                                    {!! $language['flag'] !!}
                                @else
                                    <span class="text-[11px] uppercase">
                                        {{ $language['slug'] ?? '' }}
                                    </span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</dialog>
