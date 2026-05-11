@php
    $ctaImage = get_field('footer_cta_image', 'option');
    $ctaTitle = get_field('footer_cta_title', 'option') ?: 'Jak możemy<br>ci pomóc?';
    $ctaButtonText = get_field('footer_cta_button_text', 'option') ?: 'Skontaktuj się z nami';
    $ctaButtonUrl = get_field('footer_cta_button_url', 'option') ?: (get_permalink(get_page_by_path('kontakt')) ?: '#');

    $footerName = get_field('footer_name', 'option') ?: 'Ewa Kodymowska-Sioła';

    $facebookUrl = get_field('footer_facebook_url', 'option') ?: '#';
    $linkedinUrl = get_field('footer_linkedin_url', 'option') ?: '#';

    $privacyUrl =
        get_field('footer_privacy_url', 'option') ?: (get_permalink(get_page_by_path('polityka-prywatnosci')) ?: '#');

    $footerServices = get_field('footer_services', 'option') ?: [
        [
            'title' => 'Międzynarodowe prawo rodzinne',
            'url' => '#',
        ],
        [
            'title' => 'Konwencja haska & relokacje',
            'url' => '#',
        ],
        [
            'title' => 'Strategiczne rozwody',
            'url' => '#',
        ],
        [
            'title' => 'Przemoc domowa & bezpieczeństwo',
            'url' => '#',
        ],
    ];

    $phonePl = get_field('footer_phone_pl', 'option') ?: '504 073 785';
    $phoneUk = get_field('footer_phone_uk', 'option') ?: '+44 7899 819 843';
    $email = get_field('footer_email', 'option') ?: 'ewa.kodymowska@adwokatura.pl';
    $address = get_field('footer_address', 'option') ?: 'ul Kielecka 6/4, 31-526 Kraków';

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
@endphp

<footer class="bg-[#1C1D47] text-white">
    @if (!is_page_template('template-contact.blade.php') && !is_page_template('front-page.blade.php'))
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
                        class="mb-9.5 font-serif text-[64px] font-normal uppercase leading-[0.98] tracking-[-0.035em] text-white md:text-[74px]">
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
            class="mx-auto grid max-w-318.5 grid-cols-1 gap-16 px-6 md:grid-cols-[420px_290px_290px] md:gap-17.5 md:px-0">
            {{-- Left --}}
            <div>
                <h3 class="mb-5.5 text-[26px] font-light leading-none tracking-[-0.02em] text-white">
                    {{ $footerName }}
                </h3>

                <div class="mb-12.5 flex gap-3">
                    <a href="{{ $facebookUrl }}" target="_blank" rel="noopener" aria-label="Facebook"
                        class="flex h-10.5 w-10.5 items-center justify-center rounded-full bg-[#D8B96F] text-[15px] text-white">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="{{ $linkedinUrl }}" target="_blank" rel="noopener" aria-label="LinkedIn"
                        class="flex h-10.5 w-10.5 items-center justify-center rounded-full bg-[#D8B96F] text-[15px] text-white">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </div>

                <a href="{{ $privacyUrl }}" class="mb-4.5 block text-[17px] font-light leading-none text-white/45">
                    Polityka Prywatności
                </a>

                <p class="text-[17px] font-light leading-none text-white/45">
                    © {{ date('Y') }} {{ $footerName }} - D&amp;C with
                    <span class="text-[#D8B96F]">♥</span>
                    SLT Media
                </p>
            </div>

            {{-- Services --}}
            <div>
                <h3 class="mb-7 text-[26px] font-light leading-none tracking-[-0.02em] text-white">
                    Usługi
                </h3>

                <nav>
                    @foreach ($footerServices as $service)
                        <a href="{{ $service['url'] ?? '#' }}"
                            class="block border-b border-[#D8B96F]/55 py-2 text-[17px] font-light leading-none text-white/45">
                            {{ $service['title'] ?? '' }}
                        </a>
                    @endforeach
                </nav>
            </div>

            {{-- Contact --}}
            <div>
                <h3 class="mb-7 text-[26px] font-light leading-none tracking-[-0.02em] text-white">
                    Kontakt
                </h3>

                <div class="text-[17px] font-light leading-none text-white/45">
                    <p class="border-b border-[#D8B96F]/55 py-2">
                        kom: {{ $phonePl }}
                    </p>

                    <p class="border-b border-[#D8B96F]/55 py-2">
                        kom: {{ $phoneUk }}
                    </p>

                    <p class="border-b border-[#D8B96F]/55 py-2">
                        <a href="mailto:{!! antispambot($email) !!}">
                            {!! antispambot($email) !!}
                        </a>
                    </p>

                    <p class="py-2">
                        {{ $address }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</footer>
