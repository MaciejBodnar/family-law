@extends('layouts.app')

@section('content')
    @php
        $googleReviewsShortcode = get_field('google_reviews_shortcode');
        $heroImage = get_field('hero_image');
        $portraitImage = get_field('philosophy_image');

        $services = [
            [
                'number' => 'I',
                'title' => 'Międzynarodowe prawo rodzinne',
                'url' => '#',
            ],
            [
                'number' => 'II',
                'title' => 'Konwencja haska & relokacje',
                'url' => '#',
            ],
            [
                'number' => 'III',
                'title' => 'Strategiczne rozwody',
                'url' => '#',
            ],
            [
                'number' => 'IIII',
                'title' => 'Przemoc domowa & bezpieczeństwo',
                'url' => '#',
            ],
        ];

        $reviews = [
            [
                'text' => 'Wysoki poziom profesjonalizmu oraz doskonała orientacja w sprawach międzynarodowych.',
                'author' => 'Anna M.',
            ],
            [
                'text' => 'Zespół wykazał się skutecznością i pełnym zaangażowaniem w sprawie o powrót dziecka.',
                'author' => 'Tomasz L.',
            ],
            [
                'text' => 'Połączenie wiedzy prawnej i wsparcia strategicznego dało mi jasny plan działania.',
                'author' => 'Karolina W.',
            ],
        ];

        $faqItems = [
            [
                'question' => 'Który sąd jest właściwy w sprawie międzynarodowej?',
                'answer' =>
                    'Ustalenie właściwego sądu zależy od miejsca pobytu stron, rodzaju roszczenia i relacji między państwami.',
            ],
            [
                'question' => 'Jak długo trwa postępowanie w sprawach Konwencji haskiej?',
                'answer' =>
                    'Czas trwania zależy od kraju, sądu oraz gotowości drugiej strony do współpracy i wymiany dokumentów.',
            ],
            [
                'question' => 'Czy można podzielić majątek znajdujący się w różnych krajach?',
                'answer' =>
                    'Tak, ale wymaga to ustalenia jurysdykcji, prawa właściwego i właściwego zabezpieczenia dowodów.',
            ],
            [
                'question' => 'Na czym polega wsparcie strategiczne w rozwodzie?',
                'answer' =>
                    'Chodzi o uporządkowanie decyzji, komunikacji i kolejnych kroków tak, aby zmniejszyć ryzyko procesowe.',
            ],
        ];
        $expertImage = get_field('expert_image');

        $expert = [
            'name' => get_field('expert_name') ?: 'adw. Ewa Kodymowska-Sioła',
            'subtitle' =>
                get_field('expert_subtitle') ?: 'Founder | International Family Lawyer | Accredited Divorce Coach',
            'description' =>
                get_field('expert_description') ?:
                'Adwokat z ponad 18-letnim doświadczeniem w sprawach rodzinnych o charakterze międzynarodowym, w tym rozwodach transgranicznych, uprowadzeniach rodzicielskich...',
            'url' => get_field('expert_url') ?: '#',
        ];
    @endphp

    <section class="mt-19.5 relative min-h-191 bg-[#1C1D47] bg-cover bg-center text-white"
        style="background-image: url('{{ $heroImage['url'] ?? asset('resources/images/hero.png') }}');">
        <div class="absolute inset-0 bg-[#1C1D47]/10"></div>

        <div class="relative z-10 flex min-h-191 items-center justify-center px-6 text-center">
            <div class="max-w-4xl">
                <div class="mb-5 text-[#FEE1A2]">
                    <div class="mb-4 flex justify-center">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    </div>
                    <p class="text-md md:text-[24px] font-medium uppercase tracking-[0.65em]">
                        Międzynarodowe
                    </p>
                </div>

                <h1
                    class="font-serif text-[40px] font-light uppercase leading-[1.08] tracking-wide md:text-[64px] lg:text-[72px]">
                    Prawo rodzinne<br>
                    i&nbsp;strategiczne<br>
                    rozwody
                </h1>
            </div>
        </div>
    </section>


    {{-- Services --}}
    <section class="bg-[#1B2D18] text-white">
        <div class="mx-8 md:mx-25.5 grid grid-cols-1 md:grid-cols-4">
            @foreach ($services as $index => $service)
                <a href="{{ $service['url'] }}"
                    class="group relative block px-8 py-11 transition duration-300 hover:bg-white/5 lg:px-12">
                    <span class="mb-5 block font-serif text-[32px] tracking-[0.45em] text-[#FEE1A2]">
                        {{ $service['number'] }}
                    </span>
                    <h2 class="mb-5 max-w-55 text-[24px] font-light leading-snug text-white">
                        {{ $service['title'] }}
                    </h2>

                    <span class="text-[12px] flex-1 font-semibold uppercase tracking-[0.35em] text-[#FEE1A2]">
                        Czytaj więcej
                    </span>

                    @if ($index === 1)
                        <span class="hidden md:absolute bottom-0 left-0 h-0.5 w-full bg-[#FEE1A2]"></span>
                    @else
                        <span
                            class="hidden md:absolute bottom-0 left-0 h-0.5 w-0 bg-[#FEE1A2] transition-all duration-300 group-hover:w-full"></span>
                    @endif
                </a>
            @endforeach
        </div>
    </section>

    {{-- Philosophy --}}
    <section class="grid min-h-130 grid-cols-1 bg-white lg:grid-cols-2">
        <div class="min-h-105 bg-neutral-900">
            <img src="{{ $portraitImage['url'] ?? asset('resources/images/about.png') }}"
                alt="{{ $portraitImage['alt'] ?? 'Portret prawniczki' }}" class="h-full w-full object-cover grayscale">
        </div>

        <div class="flex items-center px-8 py-20 lg:px-24">
            <div class="max-w-xl">
                <div class="mb-5 text-[#FEE1A2]">
                    <div class="mb-4 flex">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    </div>
                </div>

                <h2 class="mb-5 font-serif text-[64px] font-light leading-tight text-[#1C1D47] md:text-[60px]">
                    Nasza filozofia
                </h2>

                <p class="mb-9 max-w-130 text-base font-light leading-8 text-[#1C1D47]">
                    Jesteśmy kancelarią typu bespoke. Nie pracujemy w oparciu o schematy,
                    ponieważ sprawy rodzinne — szczególnie te o charakterze międzynarodowym —
                    wymagają indywidualnego podejścia i precyzyjnie dopasowanej strategii.
                </p>

                <a href="{{ get_permalink(get_page_by_path('o-nas')) ?: '#' }}"
                    class="inline-flex min-w-37.5 items-center justify-center border-3 border-[#FEE1A2] px-8 py-3 text-[12px] font-semibold uppercase tracking-[0.35em] text-[#1C1D47] transition hover:bg-[#FEE1A2]">
                    O nas
                </a>
            </div>
        </div>
    </section>

    <section class="bg-[#f5f3ef] px-6 py-24 text-[#1C1D47] lg:px-12">
        <div class="mx-8 md:mx-25.5 grid grid-cols-1 gap-12 lg:grid-cols-[390px_1px_1fr] lg:items-center lg:gap-22">
            <div>
                <div class="mb-5 text-[#FEE1A2]">
                    <div class="mb-4 flex">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    </div>
                </div>

                <h2 class="mb-5 font-serif text-[64px] font-light leading-none md:text-[64px]">
                    Zespół
                </h2>

                <p class="mb-8 max-w-90 text-base font-light leading-7">
                    Jako pierwszy adwokat w Polsce łączy praktykę prawną z certyfikowanym coachingiem rozwodowym,
                    wykorzystując akredytowane narzędzia w pracy z klientem.
                </p>

                <a href="{{ $expert['url'] }}"
                    class="inline-flex min-w-37.5 items-center justify-center border-3 border-[#FEE1A2] px-8 py-3 text-[12px] font-semibold uppercase tracking-[0.35em] text-[#1C1D47] transition hover:bg-[#FEE1A2]">
                    Czytaj więcej
                </a>
            </div>

            <div class="hidden h-full min-h-65 w-2px bg-[#FEE1A2] lg:block"></div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-[160px_1fr] md:items-center">
                <div class="h-40.5 w-40.5 overflow-hidden rounded-full bg-neutral-200">
                    <img src="{{ $expertImage['url'] ?? asset('resources/images/team.png') }}"
                        alt="{{ $expertImage['alt'] ?? $expert['name'] }}" class="h-full w-full object-cover grayscale">
                </div>

                <div class="max-w-2xl">
                    <h3 class="mb-2 text-[24px] font-light">
                        {{ $expert['name'] }}
                    </h3>

                    <p class="mb-7 text-base font-light text-[#1C1D47]/80">
                        {{ $expert['subtitle'] }}
                    </p>

                    <p class="text-base font-light leading-8 text-[#1C1D47]/70">
                        {{ $expert['description'] }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#CBD7C9] px-6 py-24 text-[#1B2D18] lg:px-12">
        <div class="mx-8 md:mx-25.5 grid grid-cols-1 gap-12 lg:grid-cols-[220px_1fr] lg:gap-20">
            <div>
                <div class="mb-5 text-[#FEE1A2]">
                    <div class="mb-4 flex">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    </div>
                </div>

                <h2 class="font-serif text-[64px] font-light leading-none md:text-[64px]">
                    Opinie
                </h2>
            </div>

            <div class="google-reviews-widget">
                @if ($googleReviewsShortcode)
                    {!! do_shortcode($googleReviewsShortcode) !!}
                @else
                    {{-- Fallback preview until the plugin shortcode is added in ACF --}}
                    <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
                        @foreach ([
            [
                'text' => 'Wysoki poziom profesjonalizmu oraz doskonała orientacja w sprawach międzynarodowych.',
                'author' => 'Anna M.',
            ],
            [
                'text' => 'Zespół wykazał się skutecznością i pełnym zaangażowaniem w sprawie o powrót dziecka. Wsparcie było nieocenione.',
                'author' => 'Tomasz L.',
            ],
            [
                'text' => 'Połączenie wiedzy prawnej i wsparcia strategicznego pozwoliło mi przejść przez proces z większym poczuciem kontroli.',
                'author' => 'Karolina W.',
            ],
        ] as $review)
                            <article>
                                <div class="mb-5 flex gap-2 text-[#FEE1A2]">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fa-solid fa-star text-sm"></i>
                                    @endfor
                                </div>

                                <p class="mb-8 text-base font-light leading-7 text-[#1B2D18]/80">
                                    “{{ $review['text'] }}”
                                </p>

                                <p class="text-xs font-bold uppercase tracking-wide">
                                    {{ $review['author'] }}
                                </p>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section id="faq" class="grid bg-white lg:grid-cols-2">
        <div class="px-8 py-24 text-[#1C1D47] lg:px-12 flex items-center">
            <div class="mx-auto max-w-xl">
                <div class="mb-5 text-[#FEE1A2]">
                    <div class="mb-4 flex">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    </div>
                    <h2 class="font-serif text-[clamp(2.9rem,5vw,4rem)] font-light leading-none">FAQ</h2>

                    <div class="mt-12 space-y-1">
                        @foreach ($faqItems as $index => $item)
                            <details class="group py-4" @if ($index === 0) open @endif>
                                <summary
                                    class="flex cursor-pointer list-none items-center justify-between gap-6 text-base font-light text-[#272851]">
                                    <span>{{ $item['question'] }}</span>
                                    <span class="text-xl transition group-open:rotate-180">▾</span>
                                </summary>

                                <div class="pt-5 pl-10 pr-4">
                                    <p class="text-base font-light leading-8 text-[#272851]">
                                        {{ $item['answer'] }}
                                    </p>
                                </div>
                            </details>
                        @endforeach
                    </div>

                    <a href="#contact"
                        class="mt-10 inline-flex min-w-37.5 items-center justify-center border-3 border-[#FEE1A2] px-8 py-3 text-[12px] font-semibold uppercase tracking-[0.35em] text-[#1C1D47] transition hover:bg-[#FEE1A2]">
                        Czytaj więcej
                    </a>
                </div>
            </div>
        </div>
        <div class="min-h-105 bg-neutral-900">
            <img src="{{ $portraitImage['url'] ?? asset('resources/images/two-people.png') }}"
                alt="{{ $portraitImage['alt'] ?? 'Portret prawniczki' }}" class="h-full w-full object-cover grayscale">
        </div>
    </section>
@endsection
