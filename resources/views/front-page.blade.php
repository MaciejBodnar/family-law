@extends('layouts.app')

@section('content')
    @php
        $imageUrl = function ($imageId, string $fallback) {
            if (empty($imageId)) {
                return asset($fallback);
            }

            return wp_get_attachment_image_url($imageId, 'full') ?: asset($fallback);
        };

        $imageAlt = function ($imageId, string $fallback) {
            if (empty($imageId)) {
                return $fallback;
            }

            $alt = get_post_meta($imageId, '_wp_attachment_image_alt', true);

            return $alt ?: $fallback;
        };

        $linkUrl = function ($link, string $fallback = '#') {
            if (is_array($link)) {
                return $link['url'] ?? $fallback;
            }

            if (is_string($link) && $link !== '') {
                return $link;
            }

            return $fallback;
        };

        $heroBackgroundImage = get_field('front_hero_background_image');
        $heroArrowText = get_field('front_hero_arrow_text') ?: 'Międzynarodowe';
        $heroEyebrow = get_field('front_hero_eyebrow') ?: '';
        $heroTitle = get_field('front_hero_title') ?: 'Prawo rodzinn<br>i strategiczne<br>rozwody';

        $services = get_field('front_services') ?: [
            [
                'number' => 'I',
                'title' => 'Międzynarodowe prawo rodzinne',
                'link' => '#',
                'read_more_label' => 'Czytaj więcej',
            ],
            [
                'number' => 'II',
                'title' => 'Konwencja haska & relokacje',
                'link' => '#',
                'read_more_label' => 'Czytaj więcej',
            ],
            ['number' => 'III', 'title' => 'Strategiczne rozwody', 'link' => '#', 'read_more_label' => 'Czytaj więcej'],
            [
                'number' => 'IIII',
                'title' => 'Przemoc domowa',
                'link' => '#',
                'read_more_label' => 'Czytaj więcej',
            ],
        ];

        $philosophyImage = get_field('front_philosophy_image');
        $philosophyArrowText = get_field('front_philosophy_arrow_text') ?: '';
        $philosophyTitle = get_field('front_philosophy_title') ?: 'Nasza filozofia';
        $philosophyText =
            get_field('front_philosophy_text') ?:
            'Jesteśmy kancelarią typu bespoke. Nie pracujemy w oparciu o schematy, ponieważ sprawy rodzinne — szczególnie te o charakterze międzynarodowym — wymagają indywidualnego podejścia i precyzyjnie dopasowanej strategii.';
        $philosophyButtonLabel = get_field('front_philosophy_button_label') ?: 'O nas';
        $philosophyButtonLink = get_field('front_philosophy_button_link');

        $teamTitle = get_field('front_team_title') ?: 'Zespół';
        $teamDescription =
            get_field('front_team_description') ?:
            'Jako pierwszy adwokat w Polsce łączy praktykę prawną z certyfikowanym coachingiem rozwodowym, wykorzystując akredytowane narzędzia w pracy z klientem.';
        $teamButtonLabel = get_field('front_team_button_label') ?: 'Czytaj więcej';
        $teamButtonLink = get_field('front_team_button_link');
        $teamFeaturedImage = get_field('front_team_featured_image');
        $teamFeaturedName = get_field('front_team_featured_name') ?: 'adw. Ewa Kodymowska-Sioła';
        $teamFeaturedPosition =
            get_field('front_team_featured_position') ?:
            'Founder | International Family Lawyer | Accredited Divorce Coach';
        $teamFeaturedDescription =
            get_field('front_team_featured_description') ?:
            'Adwokat z ponad 18-letnim doświadczeniem w sprawach rodzinnych o charakterze międzynarodowym, w tym rozwodach transgranicznych, uprowadzeniach rodzicielskich...';

        $reviewsTitle = get_field('front_reviews_title') ?: 'Opinie';
        $reviews = get_field('front_reviews_items') ?: [
            [
                'rating' => 5,
                'text' => 'Wysoki poziom profesjonalizmu oraz doskonała orientacja w sprawach międzynarodowych.',
                'author' => 'Anna M.',
            ],
            [
                'rating' => 5,
                'text' => 'Zespół wykazał się skutecznością i pełnym zaangażowaniem w sprawie o powrót dziecka.',
                'author' => 'Tomasz L.',
            ],
            [
                'rating' => 5,
                'text' => 'Połączenie wiedzy prawnej i wsparcia strategicznego dało mi jasny plan działania.',
                'author' => 'Karolina W.',
            ],
        ];

        $faqTitle = get_field('front_faq_title') ?: 'FAQ';
        $faqItems = get_field('front_faq_items') ?: [
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

        $faqButtonLabel = get_field('front_faq_button_label') ?: 'Czytaj więcej';
        $faqButtonLink = get_field('front_faq_button_link');
        $faqImage = get_field('front_faq_image');
    @endphp

    <section class="mt-19.5 relative min-h-191 bg-[#1C1D47] bg-cover bg-center text-white"
        style="background-image: url('{{ $imageUrl($heroBackgroundImage, 'resources/images/hero.png') }}');">
        <div class="absolute inset-0 bg-[#1C1D47]/10"></div>

        <div class="relative z-10 flex min-h-191 items-center justify-center px-6 text-center">
            <div class="max-w-4xl">
                <div class="mb-5 text-[#FEE1A2]">
                    <div class="mb-4 flex justify-center">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    </div>
                    <p class="text-md font-medium uppercase tracking-[0.65em] md:text-[24px]">
                        {{ $heroArrowText }}
                    </p>
                </div>

                @if ($heroEyebrow)
                    <p class="mb-4 text-[12px] font-semibold uppercase tracking-[0.35em] text-[#FEE1A2]">
                        {{ $heroEyebrow }}
                    </p>
                @endif

                <h1 class="text-[40px] font-light uppercase leading-[1.08] md:text-[64px] lg:text-[72px]">
                    {!! $heroTitle !!}
                </h1>
            </div>
        </div>
    </section>


    {{-- Services --}}
    <section class="bg-[#1B2D18] text-white">
        <div class="mx-8 md:mx-25.5 grid grid-cols-1 md:grid-cols-4">
            @foreach ($services as $index => $service)
                <a href="{{ $linkUrl($service['link'] ?? '#') }}"
                    class="flex flex-col group relative px-8 py-11 transition duration-300 hover:bg-white/5 lg:px-12">
                    <h2 class="mb-5 block text-[32px] font-exterlight tracking-[0.2em] text-[#FEE1A2]">
                        {{ $service['number'] }}
                    </h2>
                    <p class="mb-5 max-w-55 text-[24px] font-extralight leading-snug text-white">
                        {{ $service['title'] }}
                    </p>

                    <span
                        class="flex h-full items-end text-[12px] font-semibold uppercase tracking-[0.35em] text-[#FEE1A2]">
                        {{ $service['read_more_label'] ?? 'Czytaj więcej' }}
                    </span>

                    @if ($index === 1)
                        <span class="absolute bottom-0 left-0 h-0.5 w-full bg-[#FEE1A2]"></span>
                    @else
                        <span
                            class="absolute bottom-0 left-0 h-0.5 w-0 bg-[#FEE1A2] transition-all duration-300 group-hover:w-full"></span>
                    @endif
                </a>
            @endforeach
        </div>
    </section>

    {{-- Philosophy --}}
    <section class="grid min-h-130 grid-cols-1 bg-white lg:grid-cols-2">
        <div class="min-h-105 bg-neutral-900">
            <img src="{{ $imageUrl($philosophyImage, 'resources/images/about.png') }}"
                alt="{{ $imageAlt($philosophyImage, 'Portret prawniczki') }}" class="h-full w-full object-cover grayscale">
        </div>

        <div class="flex items-center px-8 py-20 lg:px-24">
            <div class="max-w-xl">
                <div class="mb-5 text-[#FEE1A2]">
                    <div class="mb-4 flex">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    </div>
                    @if ($philosophyArrowText)
                        <p class="text-[12px] font-semibold uppercase tracking-[0.35em]">
                            {{ $philosophyArrowText }}
                        </p>
                    @endif
                </div>

                <h2 class="mb-5 text-[64px] leading-tight text-[#1C1D47] md:text-[60px]">
                    {{ $philosophyTitle }}
                </h2>

                <div class="mb-9 max-w-130 text-base font-light leading-8 text-[#1C1D47]">
                    {!! nl2br(e(strip_tags($philosophyText))) !!}
                </div>

                <a href="{{ $linkUrl($philosophyButtonLink, '#') }}"
                    class="inline-flex min-w-37.5 items-center justify-center border-3 border-[#FEE1A2] px-8 py-3 text-[12px] font-semibold uppercase tracking-[0.35em] text-[#1C1D47] transition hover:bg-[#FEE1A2]">
                    {{ $philosophyButtonLabel }}
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

                <h2 class="mb-5 text-[64px] leading-none md:text-[64px]">
                    {{ $teamTitle }}
                </h2>

                <div class="mb-8 max-w-90 text-base font-light leading-7">
                    {!! nl2br(e(strip_tags($teamDescription))) !!}
                </div>

                <a href="{{ $linkUrl($teamButtonLink, '#') }}"
                    class="inline-flex min-w-37.5 items-center justify-center border-3 border-[#FEE1A2] px-8 py-3 text-[12px] font-semibold uppercase tracking-[0.35em] text-[#1C1D47] transition hover:bg-[#FEE1A2]">
                    {{ $teamButtonLabel }}
                </a>
            </div>

            <div class="hidden h-full min-h-65 w-2px bg-[#FEE1A2] lg:block"></div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-[160px_1fr] md:items-center">
                <div class="h-40.5 w-40.5 overflow-hidden rounded-full bg-neutral-200">
                    <img src="{{ $imageUrl($teamFeaturedImage, 'resources/images/team.png') }}"
                        alt="{{ $imageAlt($teamFeaturedImage, $teamFeaturedName) }}"
                        class="h-full w-full object-cover grayscale">
                </div>

                <div class="max-w-2xl">
                    <h4 class="mb-2 text-[24px] font-light">
                        {{ $teamFeaturedName }}
                    </h4>

                    <p class="mb-7 text-base font-light text-[#1C1D47]/80">
                        {{ $teamFeaturedPosition }}
                    </p>

                    <p class="text-base font-light leading-8 text-[#1C1D47]/70">
                        {{ $teamFeaturedDescription }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#CBD7C9] px-6 py-24 text-[#1B2D18] lg:px-12">
        <div class="mx-8 md:mx-25.5 grid grid-cols-1 gap-12 lg:grid-cols-[300px_1fr] lg:gap-20">
            <div>
                <div class="mb-5 text-[#FEE1A2]">
                    <div class="mb-4 flex">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    </div>
                </div>

                <h2 class="text-[64px] leading-none md:text-[64px]">
                    {{ $reviewsTitle }}
                </h2>
            </div>

            <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
                @foreach ($reviews as $review)
                    <article>
                        <div class="mb-5 flex gap-2 text-[#C8AC6F]">
                            @php
                                $rating = max(1, min(5, (int) ($review['rating'] ?? 5)));
                            @endphp
                            @for ($i = 0; $i < $rating; $i++)
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
        </div>
    </section>

    <section id="faq" class="grid bg-white lg:grid-cols-2">
        <div class="px-8 py-24 text-[#1C1D47] lg:px-12 flex items-center">
            <div class="mx-auto max-w-xl">
                <div class="mb-5">
                    <div class="mb-4 flex">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    </div>
                    <h2 class="text-black text-[clamp(2.9rem,5vw,4rem)] leading-none">{{ $faqTitle }}</h2>

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
                                        {!! $item['answer'] !!}
                                    </p>
                                </div>
                            </details>
                        @endforeach
                    </div>

                    <a href="{{ $linkUrl($faqButtonLink, '#contact') }}"
                        class="mt-10 inline-flex min-w-37.5 items-center justify-center border-3 border-[#FEE1A2] px-8 py-3 text-[12px] font-semibold uppercase tracking-[0.35em] text-[#1C1D47] transition hover:bg-[#FEE1A2]">
                        {{ $faqButtonLabel }}
                    </a>
                </div>
            </div>
        </div>
        <div class="min-h-105 bg-neutral-900">
            <img src="{{ $imageUrl($faqImage, 'resources/images/two-people.png') }}"
                alt="{{ $imageAlt($faqImage, 'Portret prawniczki') }}" class="h-full w-full object-cover grayscale">
        </div>
    </section>
@endsection
