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

    <section class="mt-19.5 bg-[#FAFAF8] text-[#1C1D47]">
        <div class="mx-auto max-w-273.5 px-6 pb-22.5 pt-7 md:px-0">
            {{-- Breadcrumbs --}}
            <div class="mb-18.5 text-[14px] font-light leading-none text-[#1C1D47]/25">
                <a href="{{ home_url('/') }}">
                    Strona Główna
                </a>

                <span class="mx-1.25">-</span>

                <span>Kontakt</span>
            </div>

            <div class="mb-11.25">
                <div class="mb-4 flex">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                </div>

                <h1
                    class="font-serif text-[58px] md:text-[64px] font-normal leading-[0.96] tracking-[-0.045em] text-[#1C1D47]">
                    Kontakt
                </h1>
            </div>

            <div class="grid grid-cols-1 gap-16.5 lg:grid-cols-[205px_1fr]">
                {{-- Contact details --}}
                <aside>
                    <h2 class="mb-6 text-[24px] font-light leading-none tracking-[-0.02em] text-[#1C1D47]">
                        Kontakt
                    </h2>

                    <div class="space-y-2.25 text-[16px] font-light leading-tight text-[#1C1D47]/75">
                        <p>kom: {{ $phonePl }}</p>
                        <p>kom: {{ $phoneUk }}</p>

                        <p>
                            <a href="mailto:{{ $email }}">
                                {{ $email }}
                            </a>
                        </p>

                        <p>{{ $address }}</p>
                    </div>

                    <div class="mt-6.25 flex gap-2.75">
                        <a href="{{ $facebookUrl }}" aria-label="Facebook"
                            class="flex h-8.5 w-8.5 items-center justify-center rounded-full bg-[#D8B96F] text-[14px] text-white"
                            target="_blank" rel="noopener">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>

                        <a href="{{ $linkedinUrl }}" aria-label="LinkedIn"
                            class="flex h-8.5 w-8.5 items-center justify-center rounded-full bg-[#D8B96F] text-[14px] text-white"
                            target="_blank" rel="noopener">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </div>
                </aside>

                {{-- CF7 form --}}
                <div>
                    <h2 class="mb-6.25 text-[24px] font-light leading-none tracking-[-0.02em] text-[#1C1D47]">
                        Zostaw wiadomość
                    </h2>

                    <div class="contact-cf7">
                        @if ($contactFormShortcode)
                            {!! do_shortcode($contactFormShortcode) !!}
                        @else
                            {{-- Add shortcode in ACF: contact_form_shortcode --}}
                            {!! do_shortcode('[contact-form-7 id="98d3aa4" title="Contact"]') !!}
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
