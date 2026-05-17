{{--
  Template Name: Contact
--}}

@extends('layouts.app')

@section('content')
    @php
        $contactArrowText = get_field('contact_arrow_text') ?: '-';
        $contactBreadcrumbItems = get_field('contact_breadcrumb_items') ?: [];
        $contactTitle = get_field('contact_title') ?: 'Kontakt';
        $contactDetailsHeading = get_field('contact_details_heading') ?: 'Kontakt';
        $contactDetailsRows = get_field('contact_details_rows') ?: [
            [
                'label' => 'kom',
                'value' => '504 073 785',
                'type' => 'phone',
            ],
            [
                'label' => 'kom',
                'value' => '+44 7899 819 843',
                'type' => 'phone',
            ],
            [
                'label' => '',
                'value' => 'ewa.kodymowska@adwokatura.pl',
                'type' => 'email',
            ],
            [
                'label' => '',
                'value' => 'ul Kielecka 6/4, 31-526 Kraków',
                'type' => 'address',
            ],
        ];
        $contactSocials = get_field('contact_socials') ?: [
            [
                'icon' => 'fa-brands fa-facebook-f',
                'label' => 'Facebook',
                'url' => '#',
            ],
            [
                'icon' => 'fa-brands fa-linkedin-in',
                'label' => 'LinkedIn',
                'url' => '#',
            ],
        ];
        $contactFormHeading = get_field('contact_form_heading') ?: 'Zostaw wiadomość';
        $contactFormShortcodePL = get_field('contact_form_shortcode_pl');
        $contactFormShortcodeEN = get_field('contact_form_shortcode_en');
        $contactFormShortcodeFr = get_field('contact_form_shortcode_fr');

        $renderIcon = function ($icon) {
            if (!is_string($icon) || $icon === '') {
                return '';
            }

            if (str_contains($icon, '<i')) {
                return $icon;
            }

            return '<i class="' . esc_attr($icon) . '"></i>';
        };

        $renderDetailValue = function ($item) {
            $type = $item['type'] ?? 'text';
            $value = $item['value'] ?? '';

            if ($type === 'phone' && $value !== '') {
                return '<a href="tel:' . esc_attr(preg_replace('/\s+/', '', $value)) . '">' . esc_html($value) . '</a>';
            }

            if ($type === 'email' && $value !== '') {
                return '<a href="mailto:' . esc_attr($value) . '">' . esc_html($value) . '</a>';
            }

            return esc_html($value);
        };
    @endphp

    <section class="mt-19.5 bg-[#FAFAF8] text-[#1C1D47]">
        <div class="mx-auto max-w-273.5 px-6 pb-22.5 pt-7 md:px-0">
            {{-- Breadcrumbs --}}
            <div class="mb-18.5 text-[14px] font-light leading-none text-[#1C1D47]/25">
                @include('partials.breadcrumbs', [
                    'items' => $contactBreadcrumbItems,
                    'separator' => $contactArrowText,
                ])
            </div>

            <div class="mb-11.25">
                <div class="mb-4 flex">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                </div>

                <h1 class="  text-[58px] md:text-[64px] font-normal leading-[0.96] tracking-[-0.045em] text-[#1C1D47]">
                    {{ $contactTitle }}
                </h1>
            </div>

            <div class="grid grid-cols-1 gap-16.5 lg:grid-cols-[205px_1fr]">
                {{-- Contact details --}}
                <aside>
                    <h4 class="mb-6 text-[24px] font-light leading-none tracking-[-0.02em] text-[#1C1D47]">
                        {{ $contactDetailsHeading }}
                    </h4>

                    <div class="space-y-2.25 text-[16px] font-light leading-tight text-[#1C1D47]/75">
                        @foreach ($contactDetailsRows as $item)
                            <p>
                                @if (!empty($item['label']))
                                    {{ $item['label'] }}:
                                @endif

                                {!! $renderDetailValue($item) !!}
                            </p>
                        @endforeach
                    </div>

                    <div class="mt-6.25 flex gap-2.75">
                        @foreach ($contactSocials as $social)
                            <a href="{{ $social['url'] ?? '#' }}" aria-label="{{ $social['label'] ?? '' }}"
                                class="flex h-8.5 w-8.5 items-center justify-center rounded-full bg-[#D8B96F] text-[14px] text-white"
                                target="_blank" rel="noopener">
                                {!! $renderIcon($social['icon'] ?? '') !!}
                            </a>
                        @endforeach
                    </div>
                </aside>

                {{-- CF7 form --}}
                <div>
                    <h4 class="mb-6.25 text-[24px] font-light leading-none tracking-[-0.02em] text-[#1C1D47]">
                        {{ $contactFormHeading }}
                    </h4>

                    <div class="contact-cf7">
                        @if (function_exists('pll_current_language'))
                            @if (pll_current_language() === 'pl')
                                {!! do_shortcode($contactFormShortcodePL) !!}
                            @elseif (pll_current_language() === 'en')
                                {!! do_shortcode($contactFormShortcodeEN) !!}
                            @elseif (pll_current_language() === 'fr')
                                {!! do_shortcode($contactFormShortcodeFr) !!}
                            @else
                                {!! do_shortcode('[contact-form-7 id="98d3aa4" title="Contact"]') !!}
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Map --}}
        {{-- <div class="h-89.5 w-full overflow-hidden bg-[#CBD7C9]">
            @if ($mapEmbed)
                <div class="contact-map h-full w-full">
                    {!! $mapEmbed !!}
                </div>
            @elseif ($mapImageUrl) --}}
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23297.202532494648!2d19.949305898755103!3d50.06759717462841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165b23cb2743a7%3A0xe49e42a04dadc2f9!2sKielecka%206%2F4%2C%2031-526%20Krak%C3%B3w!5e0!3m2!1spl!2spl!4v1778534941469!5m2!1spl!2spl"
            width="100%" height="376" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        {{-- @endif
        </div> --}}
    </section>
@endsection
