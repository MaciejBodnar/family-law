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
    @endphp

    <section class="relative min-h-[560px] bg-[#1C1D47] bg-cover bg-center text-white"
        style="background-image: url('{{ $heroImage['url'] ?? asset('images/front-page/hero.jpg') }}');">
        <div class="absolute inset-0 bg-[#1C1D47]/85"></div>

        <div class="relative z-10 flex min-h-[560px] items-center justify-center px-6 text-center">
            <div class="max-w-4xl">
                <div class="mb-5 text-[#FEE1A2]">
                    <div class="mb-4 text-sm tracking-[0.55em]">▸▸</div>
                    <p class="text-sm font-medium uppercase tracking-[0.65em]">
                        Międzynarodowe
                    </p>
                </div>

                <h1
                    class="font-serif text-[42px] font-light uppercase leading-[1.08] tracking-wide md:text-[64px] lg:text-[72px]">
                    Prawo rodzinne<br>
                    i strategiczne<br>
                    rozwody
                </h1>
            </div>
        </div>
    </section>


    {{-- Services --}}
    <section class="bg-[#1B2D18] text-white">
        <div class="mx-auto grid max-w-7xl grid-cols-1 md:grid-cols-4">
            @foreach ($services as $index => $service)
                <a href="{{ $service['url'] }}"
                    class="group relative block px-8 py-11 transition duration-300 hover:bg-white/5 lg:px-12">
                    <span class="mb-5 block font-serif text-xl tracking-[0.45em] text-[#FEE1A2]">
                        {{ $service['number'] }}
                    </span>

                    <h2 class="mb-5 max-w-[220px] text-xl font-light leading-snug text-white">
                        {{ $service['title'] }}
                    </h2>

                    <span class="text-[11px] font-semibold uppercase tracking-[0.35em] text-[#FEE1A2]">
                        Czytaj więcej
                    </span>

                    @if ($index === 1)
                        <span class="absolute bottom-0 left-0 h-[2px] w-full bg-[#FEE1A2]"></span>
                    @else
                        <span
                            class="absolute bottom-0 left-0 h-[2px] w-0 bg-[#FEE1A2] transition-all duration-300 group-hover:w-full"></span>
                    @endif
                </a>
            @endforeach
        </div>
    </section>

    {{-- Philosophy --}}
    <section class="grid min-h-[520px] grid-cols-1 bg-white lg:grid-cols-2">
        <div class="min-h-[420px] bg-neutral-900">
            <img src="{{ $portraitImage['url'] ?? asset('images/front-page/philosophy.jpg') }}"
                alt="{{ $portraitImage['alt'] ?? 'Portret prawniczki' }}" class="h-full w-full object-cover grayscale">
        </div>

        <div class="flex items-center px-8 py-20 lg:px-24">
            <div class="max-w-xl">
                <div class="mb-5 text-[#FEE1A2]">
                    <span class="text-sm tracking-[0.25em]">▸▸▸</span>
                </div>

                <h2 class="mb-5 font-serif text-[46px] font-light leading-tight text-[#1C1D47] md:text-[60px]">
                    Nasza filozofia
                </h2>

                <p class="mb-9 max-w-[520px] text-base font-light leading-8 text-[#1C1D47]">
                    Jesteśmy kancelarią typu bespoke. Nie pracujemy w oparciu o schematy,
                    ponieważ sprawy rodzinne — szczególnie te o charakterze międzynarodowym —
                    wymagają indywidualnego podejścia i precyzyjnie dopasowanej strategii.
                </p>

                <a href="{{ get_permalink(get_page_by_path('o-nas')) ?: '#' }}"
                    class="inline-flex min-w-[150px] items-center justify-center border border-[#FEE1A2] px-8 py-3 text-[11px] font-semibold uppercase tracking-[0.35em] text-[#1C1D47] transition hover:bg-[#FEE1A2]">
                    O nas
                </a>
            </div>
        </div>
    </section>

    <section id="team" class="bg-[#F5F3EF] px-6 py-24 text-[#1C1D47] lg:px-12">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-12 lg:grid-cols-[280px_1px_1fr] lg:items-center lg:gap-20">
            <div>
                <div class="mb-5 text-[#FEE1A2]"><span class="text-sm tracking-[0.25em]">▸▸▸</span></div>
                <h2 class="font-serif text-[clamp(2.9rem,5vw,4.75rem)] font-light leading-none">Zespół</h2>
                <p class="mt-6 max-w-[260px] text-base font-light leading-7 text-[#1C1D47]/75">
                    Pierwsza linia kontaktu łączy praktykę prawną z procesowym wsparciem strategicznym i dużą dyskrecją
                    pracy.
                </p>
                <a href="#contact"
                    class="mt-8 inline-flex min-w-[150px] items-center justify-center border border-[#FEE1A2] px-8 py-3 text-[11px] font-semibold uppercase tracking-[0.35em] text-[#1C1D47] transition hover:bg-[#FEE1A2]">
                    Czytaj więcej
                </a>
            </div>

            <div class="hidden h-full min-h-[260px] w-px bg-[#FEE1A2] lg:block"></div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-[160px_1fr] md:items-center">
                <div
                    class="h-[150px] w-[150px] overflow-hidden rounded-full border border-[#1C1D47]/10 bg-[radial-gradient(circle_at_30%_30%,_rgba(254,225,162,0.7),_transparent_32%),linear-gradient(145deg,_#1B2D18,_#CBD7C9)]">
                </div>

                <div class="max-w-2xl">
                    <h3 class="mb-2 text-2xl font-light">adw. Ewa Kodymowska-Sioła</h3>
                    <p class="mb-7 text-sm font-light tracking-[0.08em] text-[#1C1D47]/75">
                        Founder | International Family Lawyer | Strategic Divorce Counsel
                    </p>
                    <p class="text-base font-light leading-8 text-[#1C1D47]/70">
                        Kancelaria prowadzi sprawy wymagające spojrzenia ponad granicami: rozwody transgraniczne,
                        opiekę nad dziećmi, Konwencję haską i obronę interesów klienta w sytuacjach wysokiego ryzyka.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#CBD7C9] px-6 py-24 text-[#1B2D18] lg:px-12">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-12 lg:grid-cols-[220px_1fr] lg:gap-20">
            <div>
                <div class="mb-5 text-[#FEE1A2]">
                    <span class="text-sm tracking-[0.25em]">▸▸▸</span>
                </div>

                <h2 class="font-serif text-[48px] font-light leading-none md:text-[64px]">
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
        <div class="px-6 py-24 text-[#1C1D47] lg:px-12">
            <div class="mx-auto max-w-xl">
                <div class="mb-5 text-[#FEE1A2]"><span class="text-sm tracking-[0.25em]">▸▸▸</span></div>
                <h2 class="font-serif text-[clamp(2.9rem,5vw,4.75rem)] font-light leading-none">FAQ</h2>

                <div class="mt-12 space-y-1">
                    @foreach ($faqItems as $index => $item)
                        <details class="group border-b border-[#1C1D47]/10 py-4"
                            @if ($index === 0) open @endif>
                            <summary
                                class="flex cursor-pointer list-none items-center justify-between gap-6 text-base font-light text-[#1C1D47]/78">
                                <span>{{ $item['question'] }}</span>
                                <span class="text-xs transition group-open:rotate-180">⌄</span>
                            </summary>

                            <div class="pt-5 pr-10">
                                <p class="text-base font-light leading-8 text-[#1C1D47]/62">
                                    {{ $item['answer'] }}
                                </p>
                            </div>
                        </details>
                    @endforeach
                </div>

                <a href="#contact"
                    class="mt-10 inline-flex min-w-[150px] items-center justify-center border border-[#FEE1A2] px-8 py-3 text-[11px] font-semibold uppercase tracking-[0.35em] text-[#1C1D47] transition hover:bg-[#FEE1A2]">
                    Czytaj więcej
                </a>
            </div>
        </div>

        <div class="min-h-[560px] bg-[linear-gradient(160deg,_#1C1D47_0%,_#0f172a_42%,_#CBD7C9_120%)] p-4">
            <div
                class="flex h-full w-full items-end rounded-[28px] border border-white/15 bg-[radial-gradient(circle_at_25%_20%,_rgba(254,225,162,0.3),_transparent_25%),linear-gradient(180deg,_rgba(255,255,255,0.12),_rgba(0,0,0,0.18))] p-8 text-white">
                <div class="max-w-sm rounded-[24px] border border-white/15 bg-[#1C1D47]/70 p-6 backdrop-blur-sm">
                    <div class="mb-4 h-2 w-16 bg-[#FEE1A2]"></div>
                    <p class="text-sm uppercase tracking-[0.45em] text-[#FEE1A2]">Sprawy złożone</p>
                    <p class="mt-4 text-base leading-8 text-white/75">
                        Miejsce na fotografię lub dodatkową ilustrację. W tej wersji zachowuje układ i wagę wizualną
                        oryginalnej sekcji.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
