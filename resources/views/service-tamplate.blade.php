{{--
  Template Name: Service Page
--}}

@extends('layouts.app')

@section('content')
    @php
        $serviceNumber = get_field('service_number') ?: 'I';
        $serviceTitle = get_field('service_title') ?: get_the_title();

        $serviceImage = get_field('service_image');

        $serviceItems = get_field('service_items') ?: [
            [
                'title' => 'Jurysdykcja i prawo właściwe',
                'text' =>
                    'Precyzyjnie ustalamy, który sąd i które prawo /polskie lub obce/ będzie najkorzystniejsze dla Twojej sprawy.',
            ],
            [
                'title' => 'Wykonywalność orzeczeń',
                'text' =>
                    'Dbamy o to, aby orzeczenia wydane w jednym kraju były w pełni uznawane i skutecznie egzekwowane w innym.',
            ],
            [
                'title' => 'Alimenty międzynarodowe',
                'text' =>
                    'Skutecznie dochodzimy świadczeń na rzecz dzieci i małżonków niezależnie od miejsca zamieszkania dłużnika.',
            ],
            [
                'title' => 'Doradztwo dla kancelarii zagranicznych',
                'text' => 'Wspieramy zagraniczne kancelarie jako eksperci w zakresie polskiego prawa rodzinnego.',
            ],
        ];

        $imageUrl = function ($image, $fallback) {
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

        $imageAlt = function ($image, $fallback) {
            if (is_array($image) && !empty($image['alt'])) {
                return $image['alt'];
            }

            return $fallback;
        };

        $faqImage = get_field('service_faq_image');

        $faqItems = get_field('service_faq_items') ?: [
            [
                'question' => 'Który sąd jest właściwy w sprawie międzynarodowej?',
                'answer' =>
                    'Ustalenie właściwego sądu zależy od okoliczności sprawy, w szczególności miejsca stałego pobytu stron oraz ich powiązań z danym państwem.',
            ],
            [
                'question' => 'Jak długo trwa postępowanie w sprawach Konwencji haskiej?',
                'answer' =>
                    'Postępowanie w sprawach konwencji haskiej zależy od jurysdykcji, rodzaju dowodów oraz stopnia konfliktu między stronami.',
            ],
            [
                'question' => 'Czy możliwy jest podział majątku znajdującego się w różnych krajach?',
                'answer' =>
                    'Tak, jednak wymaga to analizy prawa właściwego, jurysdykcji oraz skuteczności późniejszego wykonania orzeczenia.',
            ],
            [
                'question' => 'Na czym polega wsparcie certyfikowanego Divorce Coacha?',
                'answer' =>
                    'Wsparcie obejmuje przygotowanie klienta do procesu decyzyjnego, komunikacyjnego i strategicznego w toku sprawy rodzinnej.',
            ],
            [
                'question' => 'Jak chronić się przed fałszywymi oskarżeniami?',
                'answer' =>
                    'Kluczowe jest szybkie zabezpieczenie dowodów, uporządkowanie komunikacji oraz konsekwentne prowadzenie strategii procesowej.',
            ],
        ];

        $faqImageUrl = function ($image, $fallback) {
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

        $faqImageAlt = function ($image, $fallback) {
            if (is_array($image) && !empty($image['alt'])) {
                return $image['alt'];
            }

            return $fallback;
        };
    @endphp

    <section class="bg-[#FAFAF8] text-[#1C1D47]">
        <div class="mx-auto max-w-[1080px] px-6 pb-[56px] pt-[29px] md:px-0">
            {{-- Breadcrumbs --}}
            <div class="mb-[87px] text-[14px] font-light leading-none text-[#1C1D47]/25">
                <a href="{{ home_url('/') }}" class="transition hover:text-[#1C1D47]/45">
                    Strona Główna
                </a>

                <span class="mx-[5px]">-</span>

                <a href="{{ get_permalink(get_page_by_path('uslugi')) ?: '#' }}" class="transition hover:text-[#1C1D47]/45">
                    Usługi
                </a>

                <span class="mx-[5px]">-</span>

                <span>{{ $serviceTitle }}</span>
            </div>

            {{-- Number --}}
            <div class="mb-[34px] font-serif text-[54px] font-normal leading-none tracking-[0.02em] text-[#E1BF74]">
                {{ $serviceNumber }}
            </div>

            {{-- Title --}}
            <h1
                class="mb-[49px] max-w-[980px] font-serif text-[64px] font-normal leading-[0.98] tracking-[-0.045em] text-[#1C1D47]">
                {{ $serviceTitle }}
            </h1>

            {{-- Service columns --}}
            <div class="grid grid-cols-1 gap-y-[38px] md:grid-cols-4 md:gap-x-[58px]">
                @foreach ($serviceItems as $item)
                    <article class="max-w-[220px]">
                        <h2 class="mb-[14px] text-[24px] font-light leading-[1.18] tracking-[-0.02em] text-[#1C1D47]">
                            {{ $item['title'] ?? '' }}
                        </h2>

                        <p class="text-[15px] font-light leading-[1.55] text-[#1C1D47]/80">
                            {{ $item['text'] ?? '' }}
                        </p>
                    </article>
                @endforeach
            </div>
        </div>

        {{-- Main image --}}
        <div class="h-[300px] w-full bg-neutral-200">
            <img src="{{ $imageUrl($serviceImage, asset('images/services/international-family-law.jpg')) }}"
                alt="{{ $imageAlt($serviceImage, $serviceTitle) }}" class="h-full w-full object-cover grayscale">
        </div>
    </section>
    <section class="grid min-h-[860px] grid-cols-1 bg-[#FAFAF8] lg:grid-cols-2">
        <div class="bg-[#FAFAF8] px-6 py-[92px] text-[#1C1D47] md:px-[80px] lg:px-0">
            <div class="mx-auto w-full max-w-[622px] lg:ml-[188px] lg:mr-0">
                <div class="mb-[38px] text-[#D8B96F]">
                    <span class="text-[15px] leading-none tracking-[0.16em]">▸▸▸</span>
                </div>

                <h2 class="mb-[44px] font-serif text-[76px] font-normal leading-[0.9] tracking-[-0.055em] text-[#1C1D47]">
                    FAQ
                </h2>

                <div class="mb-[30px]">
                    @foreach ($faqItems as $index => $item)
                        <details class="group py-[13px]" @if ($index === 0) open @endif>
                            <summary
                                class="flex cursor-pointer list-none items-center justify-between gap-[32px] text-[19px] font-light leading-[1.45] tracking-[-0.015em] text-[#1C1D47]/42">
                                <span>{{ $item['question'] ?? '' }}</span>

                                <i
                                    class="fa-solid fa-caret-down text-[12px] text-[#1C1D47]/38 transition-transform duration-200 group-open:rotate-180"></i>
                            </summary>

                            <div class="pb-[14px] pl-[80px] pr-[72px] pt-[24px]">
                                <p class="text-[18px] font-light leading-[1.7] tracking-[-0.015em] text-[#1C1D47]/38">
                                    {{ $item['answer'] ?? '' }}
                                </p>
                            </div>
                        </details>
                    @endforeach
                </div>

                <a href="{{ get_permalink(get_page_by_path('faq')) ?: '#' }}"
                    class="mt-[8px] inline-flex h-[50px] min-w-[205px] items-center justify-center border border-[#D8B96F] px-[30px] text-[12px] font-bold uppercase tracking-[0.42em] text-[#1C1D47]">
                    Czytaj więcej
                </a>
            </div>
        </div>

        <div class="min-h-[860px] bg-neutral-300">
            <img src="{{ $faqImageUrl($faqImage, asset('images/services/service-faq.jpg')) }}"
                alt="{{ $faqImageAlt($faqImage, 'FAQ') }}" class="h-full w-full object-cover grayscale">
        </div>
    </section>
@endsection
