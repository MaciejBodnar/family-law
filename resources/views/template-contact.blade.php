{{--
  Template Name: Contact
--}}

@extends('layouts.app')

@section('content')
    @php
        $contactFormShortcode = get_field('contact_form_shortcode');

        $phonePl = get_field('contact_phone_pl') ?: '504 073 785';
        $phoneUk = get_field('contact_phone_uk') ?: '+44 7899 819 843';
        $email = get_field('contact_email') ?: 'ewa.kodymowska@adwokatura.pl';
        $address = get_field('contact_address') ?: 'ul Kielecka 6/4, 31-526 Kraków';

        $facebookUrl = get_field('contact_facebook_url') ?: '#';
        $linkedinUrl = get_field('contact_linkedin_url') ?: '#';

        $mapEmbed = get_field('contact_map_embed');
        $mapImage = get_field('contact_map_image');

        $mapImageUrl = is_array($mapImage)
            ? $mapImage['url'] ?? null
            : (is_numeric($mapImage)
                ? wp_get_attachment_image_url($mapImage, 'full')
                : $mapImage);
    @endphp

    <section class="bg-[#FAFAF8] text-[#1C1D47]">
        <div class="mx-auto max-w-[1094px] px-6 pb-[90px] pt-[28px] md:px-0">
            {{-- Breadcrumbs --}}
            <div class="mb-[74px] text-[14px] font-light leading-none text-[#1C1D47]/25">
                <a href="{{ home_url('/') }}">
                    Strona Główna
                </a>

                <span class="mx-[5px]">-</span>

                <span>Kontakt</span>
            </div>

            <div class="mb-[45px]">
                <div class="mb-[22px] text-[#D8B96F]">
                    <span class="text-[13px] leading-none tracking-[0.16em]">▸▸▸</span>
                </div>

                <h1 class="font-serif text-[58px] font-normal leading-[0.96] tracking-[-0.045em] text-[#1C1D47]">
                    Kontakt
                </h1>
            </div>

            <div class="grid grid-cols-1 gap-[66px] lg:grid-cols-[205px_1fr]">
                {{-- Contact details --}}
                <aside>
                    <h2 class="mb-[24px] text-[22px] font-light leading-none tracking-[-0.02em] text-[#1C1D47]">
                        Kontakt
                    </h2>

                    <div class="space-y-[9px] text-[15px] font-light leading-[1.25] text-[#1C1D47]/75">
                        <p>kom: {{ $phonePl }}</p>
                        <p>kom: {{ $phoneUk }}</p>

                        <p>
                            <a href="mailto:{{ $email }}">
                                {{ $email }}
                            </a>
                        </p>

                        <p>{{ $address }}</p>
                    </div>

                    <div class="mt-[25px] flex gap-[11px]">
                        <a href="{{ $facebookUrl }}" aria-label="Facebook"
                            class="flex h-[34px] w-[34px] items-center justify-center rounded-full bg-[#D8B96F] text-[14px] text-white"
                            target="_blank" rel="noopener">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>

                        <a href="{{ $linkedinUrl }}" aria-label="LinkedIn"
                            class="flex h-[34px] w-[34px] items-center justify-center rounded-full bg-[#D8B96F] text-[14px] text-white"
                            target="_blank" rel="noopener">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </div>
                </aside>

                {{-- CF7 form --}}
                <div>
                    <h2 class="mb-[25px] text-[22px] font-light leading-none tracking-[-0.02em] text-[#1C1D47]">
                        Zostaw wiadomość
                    </h2>

                    <div class="contact-cf7">
                        @if ($contactFormShortcode)
                            {!! do_shortcode($contactFormShortcode) !!}
                        @else
                            {{-- Add shortcode in ACF: contact_form_shortcode --}}
                            {!! do_shortcode('[contact-form-7 id="123" title="Kontakt"]') !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Map --}}
        <div class="h-[358px] w-full overflow-hidden bg-[#CBD7C9]">
            @if ($mapEmbed)
                <div class="contact-map h-full w-full">
                    {!! $mapEmbed !!}
                </div>
            @elseif ($mapImageUrl)
                <img src="{{ $mapImageUrl }}" alt="Mapa" class="h-full w-full object-cover">
            @endif
        </div>
    </section>
@endsection
