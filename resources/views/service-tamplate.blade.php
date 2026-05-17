{{--
  Template Name: Service Page
--}}

@extends('layouts.app')

@section('content')
    @php
        $serviceBreadcrumbItems = get_field('service_breadcrumb_items') ?: [];

        $serviceNumber = get_field('service_number') ?: 'I';
        $serviceTitle = get_field('service_title') ?: get_the_title();
        $serviceIntro = get_field('service_intro');
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

        $serviceImage = get_field('service_image');
        $serviceFaqTitle = get_field('service_faq_title') ?: 'FAQ';
        $serviceFaqButtonLabel = get_field('service_faq_button_label') ?: 'Czytaj więcej';
        $serviceFaqButtonLink = get_field('service_faq_button_link');
        $faqImage = get_field('service_faq_image');

        $serviceFaqItems = get_field('service_faq_items') ?: [
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

            if (is_numeric($image)) {
                $alt = get_post_meta($image, '_wp_attachment_image_alt', true);

                return $alt ?: $fallback;
            }

            return $fallback;
        };

    @endphp

    <section class="mt-19.5 bg-[#FAFAF8] text-[#1C1D47]">
        <div class="mx-8 px-6 pb-14 pt-7.25 md:mx-38 md:px-0">
            <div class="mb-21.75 text-[14px] font-light leading-none text-[#1C1D47]/25">
                @include('partials.breadcrumbs', [
                    'items' => $serviceBreadcrumbItems,
                    'separator' => '-',
                ])
            </div>

            <h3 class="mb-8.5   text-[64px] font-normal leading-none tracking-[0.02em] text-[#E1BF74]">
                {{ $serviceNumber }}
            </h3>

            <h1
                class="mb-5 max-w-245   text-[44px] font-normal leading-[0.98] tracking-[-0.045em] text-[#1C1D47] md:text-[64px]">
                {{ $serviceTitle }}
            </h1>
            <p class="mb-12.25 text-base font-light leading-[1.55] text-[#1C1D47]/78">
                {{ $serviceIntro }}
            </p>

            <div class="grid grid-cols-1 gap-y-9.5 md:grid-cols-4 md:gap-x-8">
                @foreach ($serviceItems as $item)
                    <article>
                        <h4 class="mb-3.5 text-[24px] font-light leading-[1.18] tracking-[-0.02em] text-[#1C1D47]">
                            {{ $item['title'] ?? '' }}
                        </h4>

                        <p class="text-base font-light leading-[1.55] text-[#1C1D47]/80">
                            {{ $item['text'] ?? '' }}
                        </p>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="h-90 w-full bg-neutral-200">
            <img src="{{ $imageUrl($serviceImage, asset('resources/images/service.png')) }}"
                alt="{{ $imageAlt($serviceImage, $serviceTitle) }}" class="h-full w-full object-cover grayscale">
        </div>
    </section>

    <section class="grid min-h-215 grid-cols-1 bg-[#FAFAF8] lg:grid-cols-2">
        <div class="bg-[#FAFAF8] px-6 py-23 text-[#1C1D47] md:px-20 lg:px-0 flex items-center justify-center">
            <div class="mx-auto w-full max-w-155.5 lg:ml-47 lg:mr-0">
                <div class="mb-4 flex">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                </div>

                <h2 class="mb-11   text-[76px] font-normal leading-[0.9] tracking-[-0.055em] text-[#1C1D47]">
                    {{ $serviceFaqTitle }}
                </h2>

                <div class="mb-7.5">
                    @foreach ($serviceFaqItems as $index => $item)
                        <details class="group py-3.25" @if ($index === 0) open @endif>
                            <summary
                                class="flex cursor-pointer list-none items-center gap-8 text-[19px] font-light leading-[1.45] tracking-[-0.015em] text-[#1C1D47]/42">
                                <span class="w-114.5">{{ $item['question'] ?? '' }}</span>

                                <i
                                    class="fa-solid fa-caret-down text-[12px] text-[#1C1D47]/38 transition-transform duration-200 group-open:rotate-180"></i>
                            </summary>

                            <div class="pb-3.5 pl-18 pr-22 pt-6">
                                <p class="text-[18px] font-light leading-[1.7] tracking-[-0.015em] text-[#1C1D47]/38">
                                    {!! $item['answer'] ?? '' !!}
                                </p>
                            </div>
                        </details>
                    @endforeach
                </div>

                <a href="{{ is_array($serviceFaqButtonLink) ? $serviceFaqButtonLink['url'] ?? '#' : (is_string($serviceFaqButtonLink) ? $serviceFaqButtonLink : '#') }}"
                    class="mt-2 inline-flex h-12.5 min-w-51.25 items-center justify-center border-3 border-[#D8B96F] px-7.5 text-[12px] font-bold uppercase tracking-[0.42em] text-[#1C1D47]">
                    {{ $serviceFaqButtonLabel }}
                </a>
            </div>
        </div>

        <div class="min-h-215 bg-neutral-300">
            <img src="{{ $imageUrl($faqImage, asset('resources/images/two-people.png')) }}"
                alt="{{ $imageAlt($faqImage, 'FAQ') }}" class="h-full w-full object-cover grayscale">
        </div>
    </section>
@endsection
