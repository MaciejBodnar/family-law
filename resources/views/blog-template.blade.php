{{--
  Template Name: Blog
--}}

@extends('layouts.app')

@section('content')
    @php
        $paged = max(1, get_query_var('paged') ?: get_query_var('page') ?: 1);
        $blogArrowText = get_field('blog_arrow_text') ?: '-';
        $blogTitle = get_field('blog_title') ?: 'Blog';
        $blogBreadcrumbItems = get_field('blog_breadcrumb_items') ?: [];
        $blogPostsPerPage = max(1, absint(get_field('blog_posts_per_page') ?: 6));
        $blogReadMoreLabel = get_field('blog_read_more_label') ?: 'Czytaj więcej';

        $resolveImageUrl = function ($image, $size, $fallback) {
            if (is_array($image) && !empty($image['url'])) {
                return $image['url'];
            }

            if (is_numeric($image)) {
                return wp_get_attachment_image_url($image, $size) ?: $fallback;
            }

            if (is_string($image) && $image) {
                return $image;
            }

            return $fallback;
        };

        $blogQuery = new WP_Query([
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $blogPostsPerPage,
            'paged' => $paged,
        ]);

        $fallbackImage = asset('resources/images/blog1.png');
    @endphp

    <section class="mt-19.5 min-h-screen bg-[#FAFAF8] pb-18.5 text-[#1C1D47]">
        <div class="mx-auto max-w-260.75 px-6 pt-7.5 md:px-0">
            {{-- Breadcrumbs --}}
            <div class="mb-16.25 text-[14px] font-light leading-none text-[#1C1D47]/25">
                @include('partials.breadcrumbs', [
                    'items' => $blogBreadcrumbItems,
                    'separator' => $blogArrowText,
                ])
            </div>

            {{-- Page heading --}}
            <div class="mb-20.5">
                <div class="mb-4 flex">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                    <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                </div>

                <h1 class="  text-[54px] font-normal leading-[0.96] tracking-[-0.045em] text-[#1C1D47] md:text-[58px]">
                    {{ $blogTitle }}
                </h1>
            </div>

            {{-- Posts --}}
            @if ($blogQuery->have_posts())
                <div class="mx-auto max-w-236.25 space-y-7.25">
                    @while ($blogQuery->have_posts())
                        @php
                            $blogQuery->the_post();

                            $postImage = $resolveImageUrl(
                                get_field('single_post_thumbnail_image', get_the_ID()),
                                'large',
                                get_the_post_thumbnail_url(get_the_ID(), 'large') ?: $fallbackImage,
                            );
                            $postTitle = get_the_title();
                            $postSummary = get_field('single_post_summary', get_the_ID()) ?: get_the_excerpt();
                            $postExcerpt =
                                $postSummary ?:
                                'Ochrona relacji z dzieckiem wymaga odpowiednio zaplanowanych działań prawnych i właściwego przygotowania materiału dowodowego.';

                            if (!$postExcerpt) {
                                $postExcerpt = wp_trim_words(wp_strip_all_tags(get_the_content()), 18);
                            }
                        @endphp

                        <article
                            class="grid grid-cols-1 gap-10 md:gap-24.5 md:grid-cols-[360px_1fr] md:items-center mb-25 md:mt-7.5 md:mb-0">
                            <a href="{{ get_permalink() }}" class="relative block w-90 h-full bg-neutral-200">
                                <div class="pointer-events-none absolute top-1 left-1 h-62.25 w-full bg-[#E0C690]"
                                    aria-hidden="true"></div>
                                <img src="{{ $postImage }}" alt="{{ esc_attr($postTitle) }}"
                                    class="max-h-62.25 w-full object-cover grayscale">
                            </a>

                            <div class="pt-0.5">
                                <h4 class="mb-3 text-[24px] font-light leading-[1.18] tracking-[-0.02em] text-[#1C1D47]">
                                    <a href="{{ get_permalink() }}">
                                        {{ $postTitle }}
                                    </a>
                                </h4>

                                <p class="mb-4 text-[16px] font-light leading-[1.55] text-[#1C1D47]/70">
                                    {{ $postExcerpt }}
                                </p>

                                <a href="{{ get_permalink() }}"
                                    class="text-[12px] font-bold uppercase leading-none tracking-[0.22em] text-[#D8B96F]">
                                    {{ $blogReadMoreLabel }}
                                </a>
                            </div>
                        </article>
                    @endwhile
                </div>

                {{-- Pagination --}}
                @php
                    $pagination = paginate_links([
                        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                        'format' => '?paged=%#%',
                        'current' => $paged,
                        'total' => $blogQuery->max_num_pages,
                        'type' => 'array',
                        'prev_next' => false,
                    ]);
                @endphp

                @if ($pagination)
                    <nav class="mt-16.75 flex justify-center">
                        <div class="flex items-center gap-6.5 text-[13px] font-light leading-none text-[#1C1D47]/65">
                            @foreach ($pagination as $pageLink)
                                {!! str_replace(
                                    ['page-numbers current', 'page-numbers'],
                                    ['page-numbers current font-bold text-[#1C1D47]', 'page-numbers text-[#1C1D47]/65'],
                                    $pageLink,
                                ) !!}
                            @endforeach
                        </div>
                    </nav>
                @endif

                @php wp_reset_postdata(); @endphp
            @endif
        </div>
    </section>
@endsection
