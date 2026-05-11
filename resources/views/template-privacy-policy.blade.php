{{--
  Template Name: Privacy Policy
--}}

@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php(the_post())

        <section class="mt-19.5 min-h-screen bg-[#FAFAF8] pb-24 text-[#1C1D47]">
            <div class="mx-auto max-w-273.5 px-6 pt-7 md:px-0">
                {{-- Breadcrumbs --}}
                <div class="mb-18.5 text-[14px] font-light leading-none text-[#1C1D47]/25">
                    <a href="{{ home_url('/') }}">
                        Strona Główna
                    </a>

                    <span class="mx-1.25">-</span>

                    <span>{{ get_the_title() }}</span>
                </div>

                {{-- Heading --}}
                <div class="mb-14.5">
                    <div class="mb-4 flex">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    </div>

                    <h1
                        class="font-serif text-[58px] font-normal leading-[0.96] tracking-[-0.045em] text-[#1C1D47] md:text-[68px]">
                        {{ get_the_title() ?: 'Privacy Policy' }}
                    </h1>
                </div>

                {{-- Content --}}
                <div class="max-w-215 border-l border-[#D8B96F] pl-10.5 md:pl-18">
                    <div class="privacy-policy-content max-w-180 text-[14px] font-light leading-[1.72] text-[#1C1D47]/72">
                        @if (trim(get_the_content()))
                            {!! apply_filters('the_content', get_the_content()) !!}
                        @else
                            <p><strong>Welcome to our Privacy Policy</strong></p>

                            <p>— Your privacy is critically important to us.</p>

                            <p>It is kancelariaadwokackaewa policy to respect your privacy regarding any information we may
                                collect while operating our website. This Privacy Policy applies to kancelariaadwokackaewa
                                hereinafter, “us”, “we”, or “kancelariaadwokackaewa”. We respect your privacy and are
                                committed to protecting personally identifiable information you may provide us through the
                                Website. We have adopted this privacy policy “Privacy Policy” to explain what information
                                may be collected on our Website, how we use this information, and under what circumstances
                                we may disclose the information to third parties. This Privacy Policy applies only to
                                information we collect through the Website and does not apply to our collection of
                                information from other sources.</p>

                            <p>This Privacy Policy, together with the Terms and conditions posted on our Website, set forth
                                the general rules and policies governing your use of our Website. Depending on your
                                activities when visiting our Website, you may be required to agree to additional terms and
                                conditions.</p>

                            <p><strong>Website Visitors</strong></p>

                            <p>Like most website operators, kancelariaadwokackaewa collects non-personally-identifying
                                information of the sort that web browsers and servers typically make available, such as the
                                browser type, language preference, referring site, and the date and time of each visitor
                                request. kancelariaadwokackaewa purpose in collecting non-personally identifying information
                                is to better understand how kancelariaadwokackaewa visitors use its website. From time to
                                time, kancelariaadwokackaewa may release non-personally-identifying information in the
                                aggregate, e.g., by publishing a report on trends in the usage of its website.</p>

                            <p><strong>Gathering of Personally-Identifying Information</strong></p>

                            <p>Certain visitors to kancelariaadwokackaewa websites choose to interact with
                                kancelariaadwokackaewa ways that require kancelariaadwokackaewa to gather
                                personally-identifying information. The amount and type of information that
                                kancelariaadwokackaewa gathers depends on the nature of the interaction.</p>

                            <p><strong>Security</strong></p>

                            <p>The security of your Personal Information is important to us, but remember that no method of
                                transmission over the Internet, or method of electronic storage is 100% secure. While we
                                strive to use commercially acceptable means to protect your Personal Information, we cannot
                                guarantee its absolute security.</p>

                            <p><strong>Advertisements</strong></p>

                            <p>Ads appearing on our website may be delivered to users by advertising partners, who may set
                                cookies. These cookies allow the ad server to recognize your computer each time they send
                                you an online advertisement to compile information about you or others who use your
                                computer. This information allows ad networks to, among other things, deliver targeted
                                advertisements that they believe will be of most interest to you. This Privacy Policy covers
                                the use of cookies by kancelariaadwokackaewa and does not cover the use of cookies by any
                                advertisers.</p>

                            <p><strong>Links To External Sites</strong></p>

                            <p>Our Service may contain links to external sites that are not operated by us. If you click on
                                a third party link, you will be directed to that third party’s site. We strongly advise you
                                to review the Privacy Policy and terms and conditions of every site you visit.</p>

                            <p>We have no control over, and assume no responsibility for the content, privacy policies or
                                practices of any third party sites, products or services.</p>

                            <p><strong>Aggregated Statistics</strong></p>

                            <p>kancelariaadwokackaewa may collect statistics about the behavior of visitors to its website.
                                kancelariaadwokackaewa may display this information publicly or provide it to others.
                                However, kancelariaadwokackaewa does not disclose your personally-identifying information.
                            </p>

                            <p><strong>Cookies</strong></p>

                            <p>To enrich and perfect your online experience, kancelariaadwokackaewa uses “Cookies”, similar
                                technologies and services provided by others to display personalized content, appropriate
                                advertising and store your preferences on your computer.</p>

                            <p>A cookie is a string of information that a website stores on a visitor’s computer, and that
                                the visitor’s browser provides to the website each time the visitor returns.
                                kancelariaadwokackaewa uses cookies to help kancelariaadwokackaewa identify and track
                                visitors and their website access preferences. kancelariaadwokackaewa visitors who do not
                                wish to have cookies placed on their computers should set their browsers to refuse cookies
                                before using kancelariaadwokackaewa websites, with the drawback that certain features of
                                kancelariaadwokackaewa’s websites may not function properly without the aid of cookies.</p>

                            <p>By continuing to navigate our website without changing your cookie settings, you hereby
                                acknowledge and agree to kancelariaadwokackaewa‘ use of cookies.</p>

                            <p><strong>Privacy Policy Changes</strong></p>

                            <p>Although most changes are likely to be minor, kancelariaadwokackaewa may change its Privacy
                                Policy from time to time, and in kancelariaadwokackaewa sole discretion.
                                kancelariaadwokackaewa encourages visitors to frequently check this page for any changes to
                                its Privacy Policy. Your continued use of this site after any change in this Privacy Policy
                                will constitute your acceptance of such change.</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endwhile
@endsection
