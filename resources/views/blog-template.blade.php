{{--
  Template Name: Blog
--}}

@extends('layouts.app')

@section('content')
    @php
        $paged = max(1, get_query_var('paged') ?: get_query_var('page') ?: 1);

        $blogQuery = new WP_Query([
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 6,
            'paged' => $paged,
        ]);

        $fallbackImage = asset('images/blog/blog-placeholder.jpg');
    @endphp

    <section class="min-h-screen bg-[#FAFAF8] pb-[74px] text-[#1C1D47]">
        <div class="mx-auto max-w-[990px] px-6 pt-[30px] md:px-0">
            {{-- Breadcrumbs --}}
            <div class="mb-[65px] text-[14px] font-light leading-none text-[#1C1D47]/25">
                <a href="{{ home_url('/') }}">
                    Strona Główna
                </a>

                <span class="mx-[5px]">-</span>

                <span>Blog</span>
            </div>

            {{-- Page heading --}}
            <div class="mb-[82px]">
                <div class="mb-[20px] text-[#D8B96F]">
                    <span class="text-[13px] leading-none tracking-[0.16em]">▸▸▸</span>
                </div>

                <h1
                    class="font-serif text-[54px] font-normal leading-[0.96] tracking-[-0.045em] text-[#1C1D47] md:text-[58px]">
                    Blog
                </h1>
            </div>

            {{-- Posts --}}
            @if ($blogQuery->have_posts())
                <div class="mx-auto max-w-[820px] space-y-[29px]">
                    @while ($blogQuery->have_posts())
                        @php
                            $blogQuery->the_post();

                            $postImage = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: $fallbackImage;
                            $postTitle = get_the_title();
                            $postExcerpt = get_the_excerpt();

                            if (!$postExcerpt) {
                                $postExcerpt = wp_trim_words(wp_strip_all_tags(get_the_content()), 18);
                            }
                        @endphp

                        <article class="grid grid-cols-1 gap-[82px] md:grid-cols-[315px_1fr] md:items-center">
                            <a href="{{ get_permalink() }}" class="block h-[214px] w-full overflow-hidden bg-neutral-200">
                                <img src="{{ $postImage }}" alt="{{ esc_attr($postTitle) }}"
                                    class="h-full w-full object-cover grayscale">
                            </a>

                            <div class="max-w-[380px] pt-[2px]">
                                <h2
                                    class="mb-[12px] text-[22px] font-light leading-[1.18] tracking-[-0.02em] text-[#1C1D47]">
                                    <a href="{{ get_permalink() }}">
                                        {{ $postTitle }}
                                    </a>
                                </h2>

                                <p class="mb-[16px] text-[13px] font-light leading-[1.55] text-[#1C1D47]/70">
                                    {{ $postExcerpt }}
                                </p>

                                <a href="{{ get_permalink() }}"
                                    class="text-[10px] font-bold uppercase leading-none tracking-[0.22em] text-[#D8B96F]">
                                    Czytaj więcej
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
                    <nav class="mt-[67px] flex justify-center">
                        <div class="flex items-center gap-[26px] text-[13px] font-light leading-none text-[#1C1D47]/65">
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
