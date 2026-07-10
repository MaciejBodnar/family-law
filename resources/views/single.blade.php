@extends('layouts.app')

@section('content')
    @while (have_posts())
        <?php the_post(); ?>

        @php
            $postId = get_the_ID();
            $postTitle = get_the_title();

            $singlePostTitle = get_field('single_post_title') ?: $postTitle;
            $singlePostContent = get_field('single_post_content');
            $singlePostSummary = get_field('single_post_summary');
            $singlePostHeroImage = get_field('single_post_hero_image');
            $singlePostThumbnailImage = get_field('single_post_thumbnail_image');
            $navigationEnabled = get_field('single_post_navigation_enabled');
            $previousLabel = get_field('single_post_previous_label') ?: 'Poprzedni post';
            $readMoreLabel = get_field('single_post_read_more_label') ?: 'Czytaj więcej';

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

            $heroImage = $imageUrl(
                $singlePostHeroImage,
                get_the_post_thumbnail_url($postId, 'full') ?: asset('resources/images/blog1.png'),
            );
            $heroImageAlt = $imageAlt($singlePostHeroImage, $singlePostTitle);

            $previousPost = get_previous_post();
            $nextPost = get_next_post();

            $navigationPost = $previousPost ?: $nextPost;
            $navigationLabel = $previousPost ? $previousLabel : 'Następny post';

            $navigationThumbnailImage = $navigationPost
                ? get_field('single_post_thumbnail_image', $navigationPost->ID)
                : null;

            $navigationImage = $navigationPost
                ? $imageUrl(
                    $navigationThumbnailImage,
                    get_the_post_thumbnail_url($navigationPost->ID, 'large') ?: asset('resources/images/blog2.png'),
                )
                : null;
            $navigationImageAlt = $navigationPost
                ? $imageAlt($navigationThumbnailImage, get_the_title($navigationPost))
                : '';

            $navigationExcerpt = $navigationPost
                ? (get_field('single_post_summary', $navigationPost->ID) ?:
                get_the_excerpt($navigationPost->ID))
                : '';

            $singleBreadcrumbItems = get_field('single_post_breadcrumb_items') ?: [];

            if ($navigationPost && !$navigationExcerpt) {
                $navigationExcerpt = wp_trim_words(
                    wp_strip_all_tags(get_post_field('post_content', $navigationPost->ID)),
                    18,
                );
            }
        @endphp

        <article class="mt-19.5 bg-[#FAFAF8] text-[#1C1D47]">
            {{-- Hero --}}
            <section class="relative min-h-99.25">
                <div class="mx-auto grid grid-cols-1 lg:grid-cols-[1fr_1fr] justify-between">
                    <div class="mx-14 pt-5.75 md:px-0 md:ml-37.5">
                        {{-- Breadcrumbs --}}
                        <div class="mb-22 max-w-75 text-[13px] font-light leading-[1.45] text-[#1C1D47]/25">
                            @include('partials.breadcrumbs', [
                                'items' => $singleBreadcrumbItems,
                                'separator' => '-',
                            ])
                        </div>

                        <div class="mb-4 flex">
                            <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                            <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                            <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        </div>

                        <h1
                            class="text-[48px] md:text-[64px] font-normal leading-normal tracking-[0.2] text-[#1C1D47] mb-10 md:mb-0">
                            {!! $singlePostTitle !!}
                        </h1>
                    </div>

                    <div class="min-h-135 bg-neutral-200">
                        <img src="{{ $heroImage }}" alt="{{ esc_attr($heroImageAlt) }}"
                            class="h-full w-full object-cover grayscale">
                    </div>
                </div>
            </section>

            {{-- Content --}}
            <section class="py-20">
                <div class="mx-auto px-6 md:px-0">
                    <div class="relative ml-0 border-l border-[#D8B96F] pb-0.5 pl-18 md:mx-37.5">
                        <div
                            class="
        text-[16px]
        font-light
        leading-[1.65]
        text-[#1C1D47]/75

        [&_h1]:mb-8
        [&_h1]:text-[48px]
        [&_h1]:font-normal
        [&_h1]:leading-[1.15]
        [&_h1]:text-[#1C1D47]

        [&_h2]:mt-12
        [&_h2]:mb-5
        [&_h2]:text-[32px]
        [&_h2]:font-normal
        [&_h2]:leading-[1.2]
        [&_h2]:text-[#1C1D47]

        [&_p]:mb-3
        [&_p]:font-light
        [&_p]:leading-[1.65]
        [&_p]:text-[#1C1D47]/75

        [&_strong]:font-semibold
        [&_strong]:text-[#1C1D47]

        [&_a]:text-[#1C1D47]

        [&_ul]:my-6
        [&_ul]:list-disc
        [&_ul]:pl-6

        [&_li]:mb-2
        [&_li]:text-[#1C1D47]/75
    ">
                            {!! $singlePostContent !!}
                        </div>
                    </div>
                </div>
            </section>

            {{-- Previous / Next post --}}
            @if ($navigationEnabled && $navigationPost)
                <section class="bg-[#CBD7C9] py-22.5 text-[#1B2D18]">
                    <div
                        class="mx-8 md:mx-37.5 grid grid-cols-1 gap-9.5 px-6 lg:grid-cols-[155px_360px_1fr] md:gap-10 md:px-0">
                        <div>
                            <div class="mb-4 flex">
                                <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                                <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                                <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                            </div>

                            <h2 class="  text-[32px] font-normal leading-[1.12] tracking-[-0.035em] text-[#1B2D18]">
                                {{ $navigationLabel }}
                            </h2>
                        </div>

                        <a href="{{ get_permalink($navigationPost) }}" class="relative block h-62.25 bg-neutral-200">
                            <div class="pointer-events-none absolute top-1 left-1 h-62.25 w-full bg-[#E0C690]"
                                aria-hidden="true"></div>
                            <img src="{{ $navigationImage ?: asset('resources/images/blog2.png') }}"
                                alt="{{ esc_attr($navigationImageAlt ?: get_the_title($navigationPost)) }}"
                                class="h-full w-full object-cover grayscale">
                        </a>

                        <div class="pt-7.75 md:ml-10 lg:max-w-115">
                            <h4 class="mb-3 text-[24px] font-light leading-[1.18] tracking-[-0.02em] text-[#1C1D47]">
                                <a href="{{ get_permalink($navigationPost) }}">
                                    {{ get_the_title($navigationPost) }}
                                </a>
                            </h4>

                            <p class="mb-3.25 text-[16px] font-light leading-normal text-[#1C1D47]/75">
                                {{ $navigationExcerpt ?: 'Ochrona relacji z dzieckiem wymaga odpowiednio zaplanowanych działań prawnych i właściwego przygotowania materiału dowodowego.' }}
                            </p>

                            <a href="{{ get_permalink($navigationPost) }}"
                                class="text-[12px] font-bold uppercase leading-none tracking-[0.22em] text-[#D8B96F]">
                                {{ $readMoreLabel }}
                            </a>
                        </div>
                    </div>
                </section>
            @endif
        </article>
    @endwhile
@endsection
