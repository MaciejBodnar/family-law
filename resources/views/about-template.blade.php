{{--
  Template Name: About Us
--}}

@extends('layouts.app')

@section('content')
    @php
        $philosophyImage = get_field('about_philosophy_image');
        $whyImage = get_field('about_why_image');

        $imageUrl = function ($image, $fallback) {
            if (is_array($image)) {
                return $image['url'] ?? $fallback;
            }

            if (is_numeric($image)) {
                return wp_get_attachment_image_url($image, 'full') ?: $fallback;
            }

            if (is_string($image) && $image) {
                return $image;
            }

            return $fallback;
        };

        $imageAlt = function ($image, $fallback) {
            if (is_array($image)) {
                return $image['alt'] ?? $fallback;
            }

            return $fallback;
        };

        $philosophyParagraphs = get_field('about_philosophy_paragraphs') ?: [
            'Jesteśmy kancelarią typu *bespoke*. Nie pracujemy w oparciu o schematy, ponieważ sprawy rodzinne — szczególnie te o charakterze międzynarodowym — wymagają indywidualnego podejścia i precyzyjnie dopasowanej strategii.',
            'Każda sprawa, którą prowadzimy, jest dla nas odrębnym projektem — uwzględniającym realia życia klienta, jego sytuację majątkową oraz relacje rodzinne. Naszym celem jest wypracowanie rozwiązań, które są nie tylko trafne prawnie, ale przede wszystkim skuteczne i możliwe do zastosowania w praktyce.',
            'Działamy tam, gdzie granice państw spotykają się z różnicami systemów prawnych, oferując wsparcie w sprawach wymagających szczególnej dokładności, doświadczenia i zrozumienia kontekstu międzynarodowego.',
        ];

        $whyParagraph =
            get_field('about_why_text') ?:
            'Pracujemy jako zespół, łącząc doświadczenie, różne perspektywy oraz komplementarne podejścia do prowadzenia spraw. Naszą siłą jest synergia — połączenie międzynarodowego doświadczenia i strategicznego podejścia z precyzją procesową oraz analitycznym spojrzeniem. Łączymy także perspektywę kobiet i mężczyzn oraz doświadczenie różnych etapów życia, co pozwala nam lepiej rozumieć dynamikę konfliktów rodzinnych i skutecznie reprezentować interesy klientów. Działając między Krakowem a Londynem, oferujemy wsparcie w sprawach transgranicznych, zapewniając ciągłość i spójność działań niezależnie od jurysdykcji. W naszej praktyce każda sprawa traktowana jest indywidualnie — z należytą uwagą, dyskrecją i odpowiedzialnością.';

        $teamIntro =
            get_field('about_team_intro') ?:
            'Jako pierwszy adwokat w Polsce łączy praktykę prawną z certyfikowanym coachingiem rozwodowym, wykorzystując akredytowane narzędzia w pracy z klientem.';

        $teamMembers = get_field('about_team_members') ?: [
            [
                'name' => 'adw. Ewa Kodymowska-Sioła',
                'position' => 'Founder | International Family Lawyer | Accredited Divorce Coach',
                'image' => null,
                'bio' => [
                    'Adwokat z ponad 18-letnim doświadczeniem w sprawach rodzinnych o charakterze międzynarodowym, w tym rozwodach transgranicznych, uprowadzeniach rodzicielskich (Konwencja Haska 1980) oraz sprawach dotyczących dzieci.',
                    'Pracuje między Krakowem a Londynem, współpracując z klientami i kancelariami w sprawach obejmujących różne jurysdykcje.',
                    'Specjalizuje się w sprawach o wysokim stopniu konfliktu, w tym w reprezentacji mężczyzn jako ofiar przemocy domowej. Łączy praktykę prawniczą z certyfikowanym coachingiem, wspierając klientów w podejmowaniu świadomych i strategicznych decyzji. Ujęta na listach adwokatów prowadzonych przez Konsulat Stanów Zjednoczonych w Krakowie oraz Ambasadę Włoch w Warszawie dla obywateli tych państw.',
                ],
            ],
            [
                'name' => 'apl. adw. Mikołaj Więcek',
                'position' => 'Junior Partner | International Litigation Specialist',
                'image' => null,
                'bio' => [
                    'Mikołaj to procesalista, który do spraw transgranicznych wnosi męski punkt widzenia i strategiczne, analityczne podejście. Specjalizuje się w ochronie interesów klientów w sytuacjach najwyższego napięcia, gdzie prawo rodzinne przenika się z psychologią konfliktu.',
                    '*Ochrona mężczyzn w kryzysie:* Buduje skuteczne obrony dla mężczyzn doświadczających przemocy domowej, w tym przemocy psychicznej i ekonomicznej. Jego misją jest przywracanie równowagi w procesach, gdzie ojcowie mierzą się z alienacją rodzicielską lub fałszywymi oskarżeniami.',
                    '*Precyzja w sprawach Haskich:* Skupia się na technicznej i dowodowej stronie postępowań o powrót dziecka. Specjalizuje się w wykazywaniu "poważnego ryzyka" (Art. 13b), dbając o to, by bezpieczeństwo jego mocodawców było priorytetem w każdej minucie procesu.',
                    '*Operacyjność PL-UK:* Doskonale odnajduje się w procedurach łączących Polskę i Wielką Brytanię, zapewniając płynność działań prawnych bez względu na barierę językową czy proceduralną.',
                    '*Strategia faktów:* Jego styl pracy to chłodna analiza, zbieranie twardych dowodów i bezkompromisowa walka o prawdę w sprawach rodzinnych o najwyższej stawce.',
                ],
            ],
        ];

        $getImageUrl = function ($image, $fallback) {
            if (is_array($image) && !empty($image['url'])) {
                return $image['url'];
            }

            if (is_numeric($image)) {
                return wp_get_attachment_image_url($image, 'full') ?: $fallback;
            }

            if (is_string($image) && $image) {
                return $image;
            }

            return $fallback;
        };

        $getImageAlt = function ($image, $fallback) {
            if (is_array($image) && !empty($image['alt'])) {
                return $image['alt'];
            }

            return $fallback;
        };

        $reviews = get_field('reviews_items') ?: [
            [
                'text' => 'Wysoki poziom profesjonalizmu oraz doskonała orientacja w sprawach międzynarodowych.',
                'author' => 'Anna M.',
            ],
            [
                'text' =>
                    'Zespół wykazał się skutecznością i pełnym zaangażowaniem w sprawie o powrót dziecka. Wsparcie było nieocenione.',
                'author' => 'Tomasz L.',
            ],
            [
                'text' =>
                    'Połączenie wiedzy prawnej i wsparcia strategicznego pozwoliło mi przejść przez proces z większym poczuciem kontroli.',
                'author' => 'Karolina W.',
            ],
            [
                'text' => 'Wysoki poziom profesjonalizmu oraz doskonała orientacja w sprawach międzynarodowych.',
                'author' => 'Anna M.',
            ],
            [
                'text' =>
                    'Zespół wykazał się skutecznością i pełnym zaangażowaniem w sprawie o powrót dziecka. Wsparcie było nieocenione.',
                'author' => 'Tomasz L.',
            ],
            [
                'text' =>
                    'Połączenie wiedzy prawnej i wsparcia strategicznego pozwoliło mi przejść przez proces z większym poczuciem kontroli.',
                'author' => 'Karolina W.',
            ],
            [
                'text' => 'Wysoki poziom profesjonalizmu oraz doskonała orientacja w sprawach międzynarodowych.',
                'author' => 'Anna M.',
            ],
            [
                'text' =>
                    'Zespół wykazał się skutecznością i pełnym zaangażowaniem w sprawie o powrót dziecka. Wsparcie było nieocenione.',
                'author' => 'Tomasz L.',
            ],
            [
                'text' =>
                    'Połączenie wiedzy prawnej i wsparcia strategicznego pozwoliło mi przejść przez proces z większym poczuciem kontroli.',
                'author' => 'Karolina W.',
            ],
        ];

    @endphp

    <section class="mt-19.5 grid min-h-screen grid-cols-1 bg-[#FAFAF8] lg:grid-cols-2">
        {{-- Top left: Philosophy --}}
        <div
            class="h-full bg-[#FAFAF8] px-8 pb-22.5 pt-6 sm:pr-28.75 text-[#1C1D47] md:px-20 lg:px-0 mx-auto max-w-150 lg:ml-31.25 lg:mr-0">
            <div class="text-base font-light leading-5 text-[#1C1D47]/25">
                <a href="{{ home_url('/') }}" class="transition hover:text-[#1C1D47]/50">
                    Strona Główna
                </a>
                <span class="mx-1.25">-</span>
                <span>O nas</span>
            </div>
            <div class="h-full flex flex-col justify-center">

                <div class="mb-4 flex">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                </div>

                <h1
                    class="mb-5.5 font-serif text-[52px] font-normal leading-[0.98] tracking-[-0.045em] text-[#1C1D47] md:text-[58px]">
                    Nasza filozofia
                </h1>

                <div class="space-y-5.5 text-base font-light leading-[1.58] text-[#1C1D47]/78">
                    @foreach ($philosophyParagraphs as $paragraph)
                        <p>{!! wp_kses_post($paragraph) !!}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="bg-neutral-200">
            <img src="{{ $imageUrl($philosophyImage, asset('resources/images/sitting1.png')) }}"
                alt="{{ $imageAlt($philosophyImage, 'Nasza filozofia') }}" class="max-h-200 w-full object-cover grayscale">
        </div>

        {{-- Bottom left image --}}
        <div class="bg-neutral-200">
            <img src="{{ $imageUrl($whyImage, asset('resources/images/sitting2.png')) }}"
                alt="{{ $imageAlt($whyImage, 'Dlaczego my') }}" class="max-h-200 w-full object-cover grayscale">
        </div>

        {{-- Bottom right: Why us --}}
        <div class="min-h-160 bg-[#FAFAF8] px-8 py-25 text-[#1C1D47] md:px-20 lg:px-0 lg:pb-22.5 lg:pt-36.25">
            <div class="mx-auto max-w-150 lg:ml-23.75 lg:mr-0 h-full flex flex-col justify-center">
                <div class="mb-4 flex">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                </div>

                <h2
                    class="mb-5 font-serif text-[52px] font-normal leading-[0.98] tracking-[-0.045em] text-[#1C1D47] md:text-[58px]">
                    Dlaczego my
                </h2>

                <p class="text-base font-light leading-[1.58] text-[#1C1D47]/78">
                    {!! wp_kses_post($whyParagraph) !!}
                </p>
            </div>
        </div>
    </section>
    <section class="bg-[#ffffff] text-[#1C1D47]">
        <div class="mx-8 md:mx-37.5 px-6 pb-22 pt-20.5 md:px-0">
            {{-- Section heading --}}
            <div class="grid grid-cols-1 gap-8.5 md:grid-cols-[270px_1fr] md:gap-17">
                <div>
                    <div class="mb-4 flex">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    </div>

                    <h2
                        class="font-serif text-[54px] font-normal leading-[0.96] tracking-[-0.045em] text-[#1C1D47] md:text-[64px]">
                        Zespół
                    </h2>
                </div>

                <p class="pt-12 text-base font-light leading-[1.55] text-[#1C1D47]/78 md:pt-12">
                    {{ $teamIntro }}
                </p>
            </div>

            {{-- Members --}}
            <div class="mt-16 space-y-14.5">
                @foreach ($teamMembers as $index => $member)
                    @php
                        $fallbackImage =
                            $index === 0 ? asset('resources/images/team1.png') : asset('resources/images/team2.png');

                        $bio = $member['bio'] ?? [];

                        if (is_string($bio)) {
                            $bio = preg_split('/\r\n|\r|\n/', $bio);
                        }
                    @endphp

                    <article
                        class="grid grid-cols-1 gap-10.5 md:grid-cols-[230px_1fr] md:gap-30 justify-items-center md:justify-items-start">
                        <div class="h-57.5 w-57.5 overflow-hidden rounded-full bg-neutral-200">
                            <img src="{{ $getImageUrl($member['image'] ?? null, $fallbackImage) }}"
                                alt="{{ $getImageAlt($member['image'] ?? null, $member['name'] ?? '') }}"
                                class="h-full w-full object-cover grayscale">
                        </div>

                        <div class="pt-px">
                            <h3 class="mb-2 text-2xl font-light leading-[1.05] tracking-[-0.02em] text-[#1C1D47]">
                                {{ $member['name'] ?? '' }}
                            </h3>

                            <p class="mb-6.75 text-base font-light leading-tight text-[#1C1D47]/75">
                                {{ $member['position'] ?? '' }}
                            </p>

                            <div class="space-y-5.25 text-base font-light leading-[1.62] text-[#1C1D47]/62">
                                @foreach ($bio as $paragraph)
                                    @if (!empty(trim($paragraph)))
                                        <p>{!! wp_kses_post($paragraph) !!}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    <section class="min-h-192 bg-[#CBD7C9] text-[#1B2D18]">
        <div class="mx-8 md:mx-25.5 grid grid-cols-1 gap-17.5 px-6 pb-17.5 pt-28 md:grid-cols-[210px_1fr] md:px-0">
            <div>
                <div class="mb-4 flex">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                </div>

                <h1 class="font-serif md:text-[64px] font-normal leading-[0.96] tracking-[-0.045em] text-[#1B2D18]">
                    Opinie
                </h1>
            </div>

            <div class="grid grid-cols-1 gap-x-16 gap-y-13.5 md:grid-cols-3">
                @foreach ($reviews as $review)
                    <article class="max-w-57.5">
                        <div class="mb-4 flex gap-3 text-[#D8B96F]">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="fa-solid fa-star text-base leading-none"></i>
                            @endfor
                        </div>

                        <p class="mb-6 text-[15px] font-light leading-[1.52] tracking-[-0.01em] text-[#1B2D18]/68">
                            „{{ $review['text'] ?? '' }}”
                        </p>

                        <p class="text-[12px] font-bold uppercase leading-none tracking-[0.02em] text-[#1B2D18]">
                            {{ $review['author'] ?? '' }}
                        </p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
