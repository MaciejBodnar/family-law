@extends('layouts.app')

@section('content')
    @while (have_posts())
        <?php the_post(); ?>

        @php
            $postId = get_the_ID();
            $postTitle = get_the_title();

            $heroImage = get_the_post_thumbnail_url($postId, 'full') ?: asset('images/blog/single-placeholder.jpg');

            $previousPost = get_previous_post();
            $nextPost = get_next_post();

            $navigationPost = $previousPost ?: $nextPost;
            $navigationLabel = $previousPost ? 'Poprzedni post' : 'Następny post';

            $navigationImage = $navigationPost ? get_the_post_thumbnail_url($navigationPost->ID, 'large') : null;

            $navigationExcerpt = $navigationPost ? get_the_excerpt($navigationPost->ID) : '';

            if ($navigationPost && !$navigationExcerpt) {
                $navigationExcerpt = wp_trim_words(
                    wp_strip_all_tags(get_post_field('post_content', $navigationPost->ID)),
                    18,
                );
            }
        @endphp

        <article class="bg-[#FAFAF8] text-[#1C1D47]">
            {{-- Hero --}}
            <section class="relative min-h-[397px]">
                <div class="mx-auto grid max-w-[1024px] grid-cols-1 lg:grid-cols-[456px_568px]">
                    <div class="px-6 pt-[23px] md:px-0 md:pl-[108px]">
                        {{-- Breadcrumbs --}}
                        <div class="mb-[88px] max-w-[300px] text-[13px] font-light leading-[1.45] text-[#1C1D47]/25">
                            <a href="{{ home_url('/') }}">
                                Strona Główna
                            </a>

                            <span class="mx-[4px]">-</span>

                            <a href="{{ get_permalink(get_option('page_for_posts')) ?: '#' }}">
                                Blog
                            </a>

                            <span class="mx-[4px]">-</span>

                            <span>{{ $postTitle }}</span>
                        </div>

                        <div class="mb-[26px] text-[#D8B96F]">
                            <span class="text-[13px] leading-none tracking-[0.16em]">▸▸▸</span>
                        </div>

                        <h1
                            class="max-w-[300px] font-serif text-[54px] font-normal leading-[1.08] tracking-[-0.045em] text-[#1C1D47]">
                            {{ $postTitle }}
                        </h1>
                    </div>

                    <div class="h-[397px] bg-neutral-200">
                        <img src="{{ $heroImage }}" alt="{{ esc_attr($postTitle) }}"
                            class="h-full w-full object-cover grayscale">
                    </div>
                </div>
            </section>

            {{-- Content --}}
            <section class="pb-[78px] pt-[25px]">
                <div class="mx-auto max-w-[1024px] px-6 md:px-0">
                    <div class="relative ml-0 max-w-[820px] border-l border-[#D8B96F] pb-[2px] pl-[72px] md:ml-[108px]">
                        <div
                            class="prose max-w-[670px] text-[13px] font-light leading-[1.65] text-[#1C1D47]/75 prose-p:mb-[25px] prose-p:leading-[1.65] prose-p:text-[#1C1D47]/75 prose-a:text-[#1C1D47] prose-strong:text-[#1C1D47]">
                            {!! apply_filters('the_content', get_the_content()) !!}
                        </div>
                    </div>
                </div>
            </section>

            {{-- Previous / Next post --}}
            @if ($navigationPost)
                <section class="bg-[#CBD7C9] py-[90px] text-[#1B2D18]">
                    <div
                        class="mx-auto grid max-w-[810px] grid-cols-1 gap-[38px] px-6 md:grid-cols-[100px_260px_1fr] md:gap-[40px] md:px-0">
                        <div>
                            <div class="mb-[20px] text-[#D8B96F]">
                                <span class="text-[13px] leading-none tracking-[0.16em]">▸▸▸</span>
                            </div>

                            <h2
                                class="font-serif text-[27px] font-normal leading-[1.12] tracking-[-0.035em] text-[#1B2D18]">
                                {{ $navigationLabel }}
                            </h2>
                        </div>

                        <a href="{{ get_permalink($navigationPost) }}"
                            class="block h-[180px] w-[260px] overflow-hidden bg-neutral-200">
                            <img src="{{ $navigationImage ?: asset('images/blog/blog-placeholder.jpg') }}"
                                alt="{{ esc_attr(get_the_title($navigationPost)) }}"
                                class="h-full w-full object-cover grayscale">
                        </a>

                        <div class="max-w-[310px] pt-[31px]">
                            <h3 class="mb-[12px] text-[20px] font-light leading-[1.18] tracking-[-0.02em] text-[#1C1D47]">
                                <a href="{{ get_permalink($navigationPost) }}">
                                    {{ get_the_title($navigationPost) }}
                                </a>
                            </h3>

                            <p class="mb-[13px] text-[13px] font-light leading-[1.5] text-[#1C1D47]/75">
                                {{ $navigationExcerpt }}
                            </p>

                            <a href="{{ get_permalink($navigationPost) }}"
                                class="text-[10px] font-bold uppercase leading-none tracking-[0.22em] text-[#D8B96F]">
                                Czytaj więcej
                            </a>
                        </div>
                    </div>
                </section>
            @endif
        </article>
    @endwhile
@endsection
