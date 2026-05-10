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

    <section class="grid min-h-screen grid-cols-1 bg-[#FAFAF8] lg:grid-cols-2">
        {{-- Top left: Philosophy --}}
        <div class="min-h-[640px] bg-[#FAFAF8] px-[32px] pb-[90px] pt-[24px] text-[#1C1D47] md:px-[80px] lg:px-0">
            <div class="mx-auto max-w-[372px] lg:ml-[125px] lg:mr-0">
                <div class="mb-[63px] text-[14px] font-light leading-none text-[#1C1D47]/25">
                    <a href="{{ home_url('/') }}" class="transition hover:text-[#1C1D47]/50">
                        Strona Główna
                    </a>
                    <span class="mx-[5px]">-</span>
                    <span>O nas</span>
                </div>

                <div class="mb-[20px] text-[#E1BF74]">
                    <span class="text-[13px] leading-none tracking-[0.18em]">▸▸▸</span>
                </div>

                <h1
                    class="mb-[22px] font-serif text-[52px] font-normal leading-[0.98] tracking-[-0.045em] text-[#1C1D47] md:text-[58px]">
                    Nasza filozofia
                </h1>

                <div class="space-y-[22px] text-[14px] font-light leading-[1.58] text-[#1C1D47]/78">
                    @foreach ($philosophyParagraphs as $paragraph)
                        <p>{!! wp_kses_post($paragraph) !!}</p>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Top right image --}}
        <div class="min-h-[640px] bg-neutral-200">
            <img src="{{ $imageUrl($philosophyImage, asset('images/about/about-philosophy.jpg')) }}"
                alt="{{ $imageAlt($philosophyImage, 'Nasza filozofia') }}" class="h-full w-full object-cover grayscale">
        </div>

        {{-- Bottom left image --}}
        <div class="min-h-[640px] bg-neutral-200">
            <img src="{{ $imageUrl($whyImage, asset('images/about/about-why.jpg')) }}"
                alt="{{ $imageAlt($whyImage, 'Dlaczego my') }}" class="h-full w-full object-cover grayscale">
        </div>

        {{-- Bottom right: Why us --}}
        <div
            class="min-h-[640px] bg-[#FAFAF8] px-[32px] py-[100px] text-[#1C1D47] md:px-[80px] lg:px-0 lg:pb-[90px] lg:pt-[145px]">
            <div class="mx-auto max-w-[435px] lg:ml-[95px] lg:mr-0">
                <div class="mb-[18px] text-[#E1BF74]">
                    <span class="text-[13px] leading-none tracking-[0.18em]">▸▸▸</span>
                </div>

                <h2
                    class="mb-[20px] font-serif text-[52px] font-normal leading-[0.98] tracking-[-0.045em] text-[#1C1D47] md:text-[58px]">
                    Dlaczego my
                </h2>

                <p class="text-[14px] font-light leading-[1.58] text-[#1C1D47]/78">
                    {!! wp_kses_post($whyParagraph) !!}
                </p>
            </div>
        </div>
    </section>
    <section class="bg-[#FAFAF8] text-[#1C1D47]">
        <div class="mx-auto max-w-[980px] px-6 pb-[88px] pt-[82px] md:px-0">
            {{-- Section heading --}}
            <div class="grid grid-cols-1 gap-[34px] md:grid-cols-[270px_1fr] md:gap-[68px]">
                <div>
                    <div class="mb-[20px] text-[#E1BF74]">
                        <span class="text-[13px] leading-none tracking-[0.18em]">▸▸▸</span>
                    </div>

                    <h2
                        class="font-serif text-[54px] font-normal leading-[0.96] tracking-[-0.045em] text-[#1C1D47] md:text-[58px]">
                        Zespół
                    </h2>
                </div>

                <p class="max-w-[680px] pt-[48px] text-[14px] font-light leading-[1.55] text-[#1C1D47]/78 md:pt-[48px]">
                    {{ $teamIntro }}
                </p>
            </div>

            {{-- Members --}}
            <div class="mt-[64px] space-y-[58px]">
                @foreach ($teamMembers as $index => $member)
                    @php
                        $fallbackImage =
                            $index === 0 ? asset('images/about/team-ewa.jpg') : asset('images/about/team-mikolaj.jpg');

                        $bio = $member['bio'] ?? [];

                        if (is_string($bio)) {
                            $bio = preg_split('/\r\n|\r|\n/', $bio);
                        }
                    @endphp

                    <article class="grid grid-cols-1 gap-[42px] md:grid-cols-[230px_1fr] md:gap-[106px]">
                        <div class="h-[230px] w-[230px] overflow-hidden rounded-full bg-neutral-200">
                            <img src="{{ $getImageUrl($member['image'] ?? null, $fallbackImage) }}"
                                alt="{{ $getImageAlt($member['image'] ?? null, $member['name'] ?? '') }}"
                                class="h-full w-full object-cover grayscale">
                        </div>

                        <div class="max-w-[655px] pt-[1px]">
                            <h3 class="mb-[8px] text-[23px] font-light leading-[1.05] tracking-[-0.02em] text-[#1C1D47]">
                                {{ $member['name'] ?? '' }}
                            </h3>

                            <p class="mb-[27px] text-[13px] font-light leading-[1.25] text-[#1C1D47]/75">
                                {{ $member['position'] ?? '' }}
                            </p>

                            <div class="space-y-[21px] text-[14px] font-light leading-[1.62] text-[#1C1D47]/62">
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
    <section class="min-h-[768px] bg-[#CBD7C9] text-[#1B2D18]">
        <div
            class="mx-auto grid max-w-[1080px] grid-cols-1 gap-[68px] px-6 pb-[70px] pt-[112px] md:grid-cols-[210px_1fr] md:px-0">
            <div>
                <div class="mb-[24px] text-[#D8B96F]">
                    <span class="text-[13px] leading-none tracking-[0.16em]">▸▸▸</span>
                </div>

                <h1 class="font-serif text-[58px] font-normal leading-[0.96] tracking-[-0.045em] text-[#1B2D18]">
                    Opinie
                </h1>
            </div>

            <div class="grid grid-cols-1 gap-x-[64px] gap-y-[54px] md:grid-cols-3">
                @foreach ($reviews as $review)
                    <article class="max-w-[230px]">
                        <div class="mb-[16px] flex gap-[12px] text-[#D8B96F]">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="fa-solid fa-star text-[14px] leading-none"></i>
                            @endfor
                        </div>

                        <p class="mb-[24px] text-[15px] font-light leading-[1.52] tracking-[-0.01em] text-[#1B2D18]/68">
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
