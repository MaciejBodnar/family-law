@php
    $ctaImage = ewa_kodymowska_siola_get_language_option('footer_cta_image');
    $ctaTitle = ewa_kodymowska_siola_get_language_option('footer_cta_title', 'Jak możemy<br>ci pomóc?');
    $ctaButtonText = ewa_kodymowska_siola_get_language_option('footer_cta_button_label', 'Skontaktuj się z nami');
    $ctaButtonLink = ewa_kodymowska_siola_get_language_option('footer_cta_button_link');

    $footerName = ewa_kodymowska_siola_get_language_option('footer_name', 'Ewa Kodymowska-Sioła');

    $footerSocials = ewa_kodymowska_siola_get_language_option('footer_socials', [
        [
            'icon' => 'fa-brands fa-facebook-f',
            'url' => '#',
        ],
        [
            'icon' => 'fa-brands fa-linkedin-in',
            'url' => '#',
        ],
    ]);

    $privacyLabel = ewa_kodymowska_siola_get_language_option('footer_privacy_label', 'Polityka Prywatności');
    $privacyLink = ewa_kodymowska_siola_get_language_option('footer_privacy_link');

    $footerCopyrightText = ewa_kodymowska_siola_get_language_option(
        'footer_copyright_text',
        '© ' . date('Y') . ' ' . $footerName . ' - D&C with',
    );
    $footerCopyrightHeartSymbol = ewa_kodymowska_siola_get_language_option('footer_copyright_heart_symbol', '♥');
    $footerCopyrightAgencyText = ewa_kodymowska_siola_get_language_option('footer_copyright_agency_text', 'SLT Media');

    $footerServicesHeading = ewa_kodymowska_siola_get_language_option('footer_services_heading', 'Usługi');
    $footerServices = ewa_kodymowska_siola_get_language_option('footer_services', [
        [
            'title' => 'Międzynarodowe prawo rodzinne',
            'link' => '#',
        ],
        [
            'title' => 'Konwencja haska & relokacje',
            'link' => '#',
        ],
        [
            'title' => 'Strategiczne rozwody',
            'link' => '#',
        ],
        [
            'title' => 'Przemoc domowa & bezpieczeństwo',
            'link' => '#',
        ],
    ]);

    $footerContactHeading = ewa_kodymowska_siola_get_language_option('footer_contact_heading', 'Kontakt');
    $footerContactRows = ewa_kodymowska_siola_get_language_option('footer_contact_rows', [
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
    ]);

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

    $normalizeLink = function ($link, $fallback = '#') {
        if (is_array($link)) {
            return $link['url'] ?? $fallback;
        }

        if (is_string($link) && $link) {
            return $link;
        }

        return $fallback;
    };

    $ctaButtonUrl = $normalizeLink($ctaButtonLink, get_permalink(get_page_by_path('kontakt')) ?: '#');
    $privacyUrl = $normalizeLink($privacyLink, get_permalink(get_page_by_path('polityka-prywatnosci')) ?: '#');

    $renderIcon = function ($icon) {
        if (!is_string($icon) || $icon === '') {
            return '';
        }

        if (str_contains($icon, '<i')) {
            return $icon;
        }

        return '<i class="' . esc_attr($icon) . '"></i>';
    };

    $renderContactValue = function ($row) {
        $type = $row['type'] ?? 'text';
        $value = $row['value'] ?? '';

        if ($type === 'phone' && $value !== '') {
            $phoneHref = preg_replace('/\s+/', '', $value);

            return '<a href="tel:' . esc_attr($phoneHref) . '">' . esc_html($value) . '</a>';
        }

        if ($type === 'email' && $value !== '') {
            return '<a href="mailto:' . esc_attr($value) . '">' . esc_html($value) . '</a>';
        }

        return esc_html($value);
    };
@endphp

<footer class="bg-[#1C1D47] text-white">
    @if (!is_page_template('template-contact.blade.php') && !is_front_page())
        {{-- CTA --}}
        <section class="relative h-132.5 bg-[#1C1D47] bg-cover bg-center"
            style="background-image: url('{{ $imageUrl($ctaImage, asset('resources/images/footer.png')) }}');">
            <div class="absolute inset-0 bg-[#1C1D47]/10"></div>

            <div class="relative z-10 flex h-full items-center justify-center px-6 text-center">
                <div class="-mt-4.5">
                    <div class="mb-7 flex justify-center">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    </div>

                    <h2
                        class="mb-9.5   text-[64px] font-normal uppercase leading-[0.98] tracking-[-0.035em] text-white">
                        {!! wp_kses_post($ctaTitle) !!}
                    </h2>

                    <a href="{{ $ctaButtonUrl }}"
                        class="inline-flex h-11.25 min-w-62.5 items-center justify-center border border-[#D8B96F] px-7.5 text-[12px] font-bold uppercase tracking-[0.42em] text-white">
                        {{ $ctaButtonText }}
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- Footer main --}}
    <section class="bg-[#1C1D47] pb-16.5 pt-26">
        <div
            class="mx-auto grid max-w-318.5 grid-cols-1 justify-between gap-16 px-6 md:grid-cols-[420px_1fr] md:gap-17.5 md:px-0">
            {{-- Left --}}
            <div>
                <h4 class="mb-5.5 text-[26px] font-light leading-none tracking-[-0.02em] text-white">
                    {{ $footerName }}
                </h4>

                <div class="mb-12.5 flex gap-3">
                    @foreach ($footerSocials as $social)
                        <a href="{{ $normalizeLink($social['url'] ?? '#') }}" target="_blank" rel="noopener"
                            aria-label="{{ $social['label'] ?? '' }}"
                            class="flex h-10.5 w-10.5 items-center justify-center rounded-full bg-[#D8B96F] text-[15px] text-white">
                            {!! $renderIcon($social['icon'] ?? '') !!}
                        </a>
                    @endforeach
                </div>

                <a href="{{ $privacyUrl }}" class="mb-4.5 block text-[16px] font-light leading-none text-white/45">
                    {{ $privacyLabel }}
                </a>

                <p class="text-[16px] font-light leading-none text-white/45">
                    {!! wp_kses_post($footerCopyrightText) !!}
                    <span class="text-[#D8B96F]">{{ $footerCopyrightHeartSymbol }}</span>
                    <a href="https://www.sltmedia.com" target="_blank" rel="noopener"
                        aria-label="{{ $footerCopyrightAgencyText }}" class="hover:text-[#D8B96F]">
                        {{ $footerCopyrightAgencyText }}
                    </a>
                </p>
            </div>
            <div class="flex flex-col md:flex-row gap-8 justify-end">
                {{-- Services --}}
                <div>
                    <h3 class="mb-7 text-[26px] font-light leading-none tracking-[-0.02em] text-white">
                        {{ $footerServicesHeading }}
                    </h3>

                    <nav>
                        @foreach ($footerServices as $index => $service)
                            @if ($index === 3)
                                <a href="{{ $normalizeLink($service['link'] ?? '#') }}"
                                    class="block py-2 text-[17px] font-light leading-none text-white/45 hover:text-[#D8B96F]">
                                    {{ $service['title'] ?? '' }}
                                </a>
                            @else
                                <a href="{{ $normalizeLink($service['link'] ?? '#') }}"
                                    class="block border-b-2 border-[#E0C690]/55 py-2 text-[17px] font-light leading-none text-white/45 hover:text-[#D8B96F]">
                                    {{ $service['title'] ?? '' }}
                                </a>
                            @endif
                        @endforeach
                    </nav>
                </div>

                {{-- Contact --}}
                <div>
                    <h3 class="mb-7 text-[26px] font-light leading-none tracking-[-0.02em] text-white">
                        {{ $footerContactHeading }}
                    </h3>

                    <div class="text-[17px] font-light leading-none text-white/45">
                        @foreach ($footerContactRows as $row)
                            <p class="{{ !$loop->last ? 'border-b-2 border-[#E0C690]/55' : '' }} py-2">
                                @if (!empty($row['label']))
                                    {!! $row['label'] !!}:
                                @endif

                                {!! $renderContactValue($row) !!}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
