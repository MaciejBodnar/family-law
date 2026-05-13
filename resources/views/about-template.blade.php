{{--
  Template Name: About Us
--}}

@extends('layouts.app')

@section('content')
    @php
        $breadcrumbHomeLabel =
            get_field('global_ui_breadcrumb_home_label', 'option') ?:
            get_field('ui_breadcrumb_home_label', 'option') ?:
            'Home';
        $breadcrumbSeparator =
            get_field('global_ui_breadcrumb_separator', 'option') ?:
            get_field('ui_breadcrumb_separator', 'option') ?:
            '-';
        $aboutBreadcrumbItems = get_field('about_breadcrumb_items') ?: [];

        $philosophyTitle = get_field('about_philosophy_title') ?: 'Nasza filozofia';
        $philosophyContent =
            get_field('about_philosophy_content') ?:
            'Jesteśmy kancelarią typu *bespoke*. Nie pracujemy w oparciu o schematy, ponieważ sprawy rodzinne – szczególnie te o charakterze międzynarodowym – wymagają indywidualnego podejścia i precyzyjnie dopasowanej strategii.

Każda sprawa, którą prowadzimy, jest dla nas odrębnym projektem – uwzględniającym realia życia klienta, jego sytuację majątkową oraz relacje rodzinne. Naszym celem jest wypracowanie rozwiązań, które są nie tylko trafne prawnie, ale przede wszystkim skuteczne i możliwe do zastosowania w praktyce.

Działamy tam, gdzie granice państw spotykają się z różnicami systemów prawnych, oferując wsparcie w sprawach wymagających szczególnej dokładności, doświadczenia i zrozumienia kontekstu międzynarodowego.
';
        $philosophyImage = get_field('about_philosophy_image');

        $whyTitle = get_field('about_why_title') ?: 'Dlaczego my';
        $whyContent =
            get_field('about_why_content') ?:
            'Pracujemy jako zespół, łącząc doświadczenie, różne perspektywy oraz komplementarne podejścia do prowadzenia spraw. Naszą siłą jest synergia – połączenie międzynarodowego doświadczenia i strategicznego podejścia z precyzją procesową oraz analitycznym spojrzeniem. Łączymy także perspektywę kobiet i mężczyzn oraz doświadczenie różnych etapów życia, co pozwala nam lepiej rozumieć dynamikę konfliktów rodzinnych i skuteczniej reprezentować interesy klientów. Działając między Krakowem a Londynem, oferujemy wsparcie w sprawach transgranicznych, zapewniając ciągłość i spójność działań niezależnie od jurysdykcji. W naszej praktyce każda sprawa traktowana jest indywidualnie – z należytą uwagą, dyskrecją i odpowiedzialnością.';
        $whyImage = get_field('about_why_image');

        $teamTitle = get_field('about_team_title') ?: 'Zespół';
        $teamIntro =
            get_field('about_team_intro') ?:
            'Jako pierwszy adwokat w Polsce łączy praktykę prawną z certyfikowanym coachingiem rozwodowym, wykorzystując akredytowane narzędzia w pracy z klientem.';
        $teamMembers = get_field('about_team_members') ?: [
            [
                'image' => null,
                'name' => 'adw. Ewa Kodymowska-Sioła',
                'position' => 'Founder | International Family Lawyer | Accredited Divorce Coach',
                'bio' => 'Adwokat z ponad 18-letnim doświadczeniem w sprawach rodzinnych o charakterze międzynarodowym, w tym rozwodach transgranicznych, uprowadzeniach rodzicielskich (Konwencja Haska 1980) oraz sprawach dotyczących dzieci.

Pracuje między Krakowem a Londynem, współpracując z klientami i kancelariami w sprawach obejmujących różne jurysdykcje.

Specjalizuje się w sprawach o wysokim stopniu konfliktu, w tym w reprezentacji mężczyzn jako ofiar przemocy domowej. Łączy praktykę prawniczą z certyfikowanym coachingiem, wspierając klientów w podejmowaniu świadomych i strategicznych decyzji. Ujęta na listach adwokatów prowadzonych przez Konsulat Stanów Zjednoczonych w Krakowie oraz Ambasadę Włoch w Warszawie dla obywateli tych państw.',
            ],
            [
                'image' => null,
                'name' => 'apl. adw. Mikołaj Więcek',
                'position' => 'Junior Partner | International Litigation Specialist',
                'bio' => 'Mikołaj to procesualista, który do spraw transgranicznych wnosi męski punkt widzenia i strategiczne, analityczne podejście. Specjalizuje się w ochronie interesów klientów w sytuacjach najwyższego napięcia, gdzie prawo rodzinne przenika się z psychologią konfliktu.

 *Ochrona mężczyzn w kryzysie:* Buduje skuteczne linie obrony dla mężczyzn doświadczających przemocy domowej (w tym przemocy psychicznej i ekonomicznej). Jego misją jest przywracanie równowagi w procesach, gdzie ojcowie mierzą się z alienacją rodzicielską lub fałszywymi oskarżeniami.

*Precyzja w sprawach Haskich:* Skupia się na technicznej i dowodowej stronie postępowań o powrót dziecka. Specjalizuje się w wykazywaniu "poważnego ryzyka" (Art. 13b), dbając o to, by bezpieczeństwo jego mocodawców było priorytetem w każdej minucie procesu.

*Operacyjność PL-UK:* Doskonale odnajduje się w procedurach łączących Polskę i Wielką Brytanię, zapewniając płynność działań prawnych bez względu na barierę językową czy proceduralną.

*Strategia faktów:* Jego styl pracy to chłodna analiza, zbieranie twardych dowodów i bezkompromisowa walka o prawdę w sprawach rodzinnych o najwyższej stawce.',
            ],
        ];

        $reviewsTitle = get_field('about_reviews_title') ?: 'Opinie';
        $reviewsItems = get_field('about_reviews_items') ?: [
            [
                'rating' => 5,
                'text' => 'Wysoki poziom profesjonalizmu oraz doskonała orientacja w sprawach międzynarodowych.',
                'author' => 'Anna M.',
            ],
            [
                'rating' => 5,
                'text' =>
                    'Zespół wykazał się skutecznością i pełnym zaangażowaniem w sprawie o powrót dziecka. Wsparcie było nieocenione.',
                'author' => 'Tomasz L.',
            ],
            [
                'rating' => 5,
                'text' =>
                    'Połączenie wiedzy prawnej i wsparcia strategicznego pozwoliło mi przejść przez proces z większym poczuciem kontroli.',
                'author' => 'Karolina W.',
            ],
            [
                'rating' => 5,
                'text' => 'Wysoki poziom profesjonalizmu oraz doskonała orientacja w sprawach międzynarodowych.',
                'author' => 'Anna M.',
            ],
            [
                'rating' => 5,
                'text' =>
                    'Zespół wykazał się skutecznością i pełnym zaangażowaniem w sprawie o powrót dziecka. Wsparcie było nieocenione.',
                'author' => 'Tomasz L.',
            ],
            [
                'rating' => 5,
                'text' =>
                    'Połączenie wiedzy prawnej i wsparcia strategicznego pozwoliło mi przejść przez proces z większym poczuciem kontroli.',
                'author' => 'Karolina W.',
            ],
            [
                'rating' => 5,
                'text' => 'Wysoki poziom profesjonalizmu oraz doskonała orientacja w sprawach międzynarodowych.',
                'author' => 'Anna M.',
            ],
            [
                'rating' => 5,
                'text' =>
                    'Zespół wykazał się skutecznością i pełnym zaangażowaniem w sprawie o powrót dziecka. Wsparcie było nieocenione.',
                'author' => 'Tomasz L.',
            ],
            [
                'rating' => 5,
                'text' =>
                    'Połączenie wiedzy prawnej i wsparcia strategicznego pozwoliło mi przejść przez proces z większym poczuciem kontroli.',
                'author' => 'Karolina W.',
            ],
        ];

        $imageUrl = function ($image, $fallback) {
            if (is_array($image) && !empty($image['url'])) {
                return $image['url'];
            }

            if (is_numeric($image)) {
                return wp_get_attachment_image_url($image, 'full') ?: $fallback;
            }

            if (is_string($image) && $image !== '') {
                return $image;
            }

            return $fallback;
        };

        $imageAlt = function ($image, $fallback) {
            if (is_array($image) && !empty($image['alt'])) {
                return $image['alt'];
            }

            if (is_numeric($image)) {
                $alt = get_post_meta($image, '_wp_attachment_image_alt', true);

                return $alt ?: $fallback;
            }

            return $fallback;
        };
    @endphp

    <section class="mt-19.5 grid min-h-screen grid-cols-1 bg-[#FAFAF8] lg:grid-cols-2">
        <div
            class="mx-auto max-w-150 h-full bg-[#FAFAF8] px-8 pb-22.5 pt-6 text-[#1C1D47] sm:pr-28.75 md:px-20 lg:ml-31.25 lg:mr-0 lg:px-0">
            <div class="text-base font-light leading-5 text-[#1C1D47]/25">
                @include('partials.breadcrumbs', [
                    'items' => $aboutBreadcrumbItems,
                    'separator' => $breadcrumbSeparator,
                ])
            </div>

            <div class="flex h-full flex-col justify-center">
                <div class="mb-4 flex">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                </div>

                <h1
                    class="mb-5.5   text-[52px] font-light leading-[0.98] tracking-[-0.045em] text-[#1C1D47] md:text-[58px]">
                    {{ $philosophyTitle }}
                </h1>

                <div class="space-y-5.5 text-base font-light leading-[1.58] text-[#1C1D47]/78">
                    {!! wp_kses_post($philosophyContent) !!}
                </div>
            </div>
        </div>

        <div class="bg-neutral-200">
            <img src="{{ $imageUrl($philosophyImage, asset('resources/images/sitting1.png')) }}"
                alt="{{ $imageAlt($philosophyImage, $philosophyTitle) }}" class="max-h-200 w-full object-cover grayscale">
        </div>

        <div class="bg-neutral-200">
            <img src="{{ $imageUrl($whyImage, asset('resources/images/sitting2.png')) }}"
                alt="{{ $imageAlt($whyImage, $whyTitle) }}" class="max-h-200 w-full object-cover grayscale">
        </div>

        <div class="min-h-160 bg-[#FAFAF8] px-8 py-25 text-[#1C1D47] md:px-20 lg:pb-22.5 lg:pt-36.25 lg:px-0">
            <div class="mx-auto flex h-full max-w-150 flex-col justify-center lg:ml-23.75 lg:mr-0">
                <div class="mb-4 flex">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                </div>

                <h2 class="mb-5   text-[52px] font-light leading-[0.98] tracking-[-0.045em] text-[#1C1D47] md:text-[58px]">
                    {{ $whyTitle }}
                </h2>

                <div class="text-base font-light leading-[1.58] text-[#1C1D47]/78">
                    {!! wp_kses_post($whyContent) !!}
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#ffffff] text-[#1C1D47]">
        <div class="mx-8 px-6 pb-22 pt-20.5 md:mx-37.5 md:px-0">
            <div class="grid grid-cols-1 gap-8.5 md:grid-cols-[270px_1fr] md:gap-17">
                <div>
                    <div class="mb-4 flex">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    </div>

                    <h2 class="  text-[54px] font-light leading-[0.96] tracking-[-0.045em] text-[#1C1D47] md:text-[64px]">
                        {{ $teamTitle }}
                    </h2>
                </div>

                <p class="pt-12 text-base font-light leading-[1.55] text-[#1C1D47]/78 md:pt-12">
                    {!! wp_kses_post($teamIntro) !!}
                </p>
            </div>

            <div class="mt-16 space-y-25">
                @foreach ($teamMembers as $index => $member)
                    @php
                        $fallbackImage =
                            $index === 0 ? asset('resources/images/team1.png') : asset('resources/images/team2.png');
                        $bio = $member['bio'] ?? '';

                        if (is_string($bio)) {
                            $bio = preg_split('/\r\n|\r|\n/', $bio);
                        }
                    @endphp

                    <article
                        class="grid grid-cols-1 justify-items-center gap-10.5 md:grid-cols-[230px_1fr] md:justify-items-start md:gap-30">
                        <div class="h-57.5 w-57.5 overflow-hidden rounded-full bg-neutral-200">
                            <img src="{{ $imageUrl($member['image'] ?? null, $fallbackImage) }}"
                                alt="{{ $imageAlt($member['image'] ?? null, $member['name'] ?? '') }}"
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
        <div class="mx-8 grid grid-cols-1 gap-17.5 px-6 pb-17.5 pt-28 md:mx-25.5 md:grid-cols-[210px_1fr] md:px-0">
            <div>
                <div class="mb-4 flex">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                </div>

                <h1 class="  font-light leading-[0.96] tracking-[-0.045em] text-[#1B2D18] md:text-[64px]">
                    {{ $reviewsTitle }}
                </h1>
            </div>

            <div class="grid grid-cols-1 gap-x-16 gap-y-13.5 md:grid-cols-3">
                @foreach ($reviewsItems as $review)
                    @php
                        $rating = max(1, min(5, (int) ($review['rating'] ?? 5)));
                    @endphp

                    <article class="flex h-full max-w-57.5 flex-col">
                        <div class="mb-4 flex gap-3 text-[#D8B96F]">
                            @for ($i = 0; $i < $rating; $i++)
                                <i class="fa-solid fa-star text-base leading-none"></i>
                            @endfor
                        </div>

                        <p class="mb-6 text-[15px] font-light leading-[1.52] tracking-[-0.01em] text-[#1B2D18]/68">
                            „{{ $review['text'] ?? '' }}”
                        </p>

                        <p class="mt-auto text-[12px] font-bold uppercase leading-none tracking-[0.02em] text-[#1B2D18]">
                            {{ $review['author'] ?? '' }}
                        </p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
