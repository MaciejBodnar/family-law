@extends('layouts.app')

@section('content')
    @while (have_posts())
        <?php the_post(); ?>

        @php
            $postId = get_the_ID();
            $postTitle = get_the_title();

            $heroImage = get_the_post_thumbnail_url($postId, 'full') ?: asset('resources/images/blog1.png');

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

        <article class="mt-19.5 bg-[#FAFAF8] text-[#1C1D47]">
            {{-- Hero --}}
            <section class="relative min-h-99.25">
                <div class="mx-auto grid grid-cols-1 lg:grid-cols-[456px_800px] justify-between">
                    <div class="px-6 pt-5.75 md:px-0 md:pl-27 md:ml-10.5">
                        {{-- Breadcrumbs --}}
                        <div class="mb-22 max-w-75 text-[13px] font-light leading-[1.45] text-[#1C1D47]/25">
                            <a href="{{ home_url('/') }}">
                                Strona Główna
                            </a>

                            <span class="mx-1">-</span>

                            <a href="{{ get_permalink(get_option('page_for_posts')) ?: '#' }}">
                                Blog
                            </a>

                            <span class="mx-1">-</span>

                            <span>{{ $postTitle }}</span>
                        </div>

                        <div class="mb-4 flex">
                            <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                            <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                            <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                        </div>

                        <h1
                            class="max-w-75 font-serif text-[54px] font-normal leading-[1.08] tracking-[-0.045em] text-[#1C1D47] mb-10 md:mb-0">
                            {{ $postTitle }}
                        </h1>
                    </div>

                    <div class="min-h-135 bg-neutral-200">
                        <img src="{{ $heroImage }}" alt="{{ esc_attr($postTitle) }}"
                            class="h-full w-full object-cover grayscale">
                    </div>
                </div>
            </section>

            {{-- Content --}}
            <section class="py-20">
                <div class="mx-auto px-6 md:px-0">
                    <div class="relative ml-0 border-l border-[#D8B96F] pb-0.5 pl-18 md:mx-37.5">
                        <div
                            class="prose text-[16px] font-light leading-[1.65] text-[#1C1D47]/75 prose-p:mb-[25px] prose-p:leading-[1.65] prose-p:text-[#1C1D47]/75 prose-a:text-[#1C1D47] prose-strong:text-[#1C1D47]">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id neque eleifend, congue lectus ac,
                            vestibulum lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                            inceptos himenaeos. Curabitur in lacus blandit, feugiat ipsum in, vulputate mi. In vel placerat
                            ante. Fusce molestie libero quis fringilla pulvinar. In at libero quis purus bibendum suscipit
                            vel porta eros. Proin at est vel odio euismod sodales nec a lorem. Etiam luctus augue sit amet
                            sapien posuere suscipit. Nam luctus odio eros, eget ultrices tortor commodo vulputate. In in
                            lorem eget orci aliquet pharetra.

                            In et mauris non diam lobortis pellentesque. Mauris rutrum elit sed sapien accumsan vulputate
                            vel quis leo. Vivamus imperdiet ultricies neque vel egestas. Quisque ut arcu consectetur,
                            convallis lacus semper, lobortis nisi. Nunc vel hendrerit mauris. Vestibulum a sapien molestie,
                            posuere tellus sit amet, auctor risus. Sed sagittis felis ligula, sit amet auctor diam sodales
                            in. Nunc et ipsum vitae augue venenatis facilisis in non metus. Curabitur euismod ligula at
                            sapien pharetra volutpat. In tristique, nulla nec accumsan gravida, lectus elit efficitur
                            mauris, eu molestie elit enim et leo. Phasellus vitae ultricies dui. Ut at congue nulla.
                            Vestibulum in ex quis lectus pulvinar commodo.

                            Praesent sit amet nisl arcu. In sagittis, libero vitae laoreet rhoncus, mauris nibh sollicitudin
                            velit, in congue ante felis quis leo. Sed tincidunt risus in metus eleifend tempus. Mauris
                            cursus mollis odio, non facilisis urna sodales sit amet. Nullam vel volutpat diam. Etiam quam
                            dolor, vehicula vel interdum at, faucibus id eros. Sed ut odio eget odio pretium gravida. Ut
                            ornare ultrices tortor, eget tristique magna maximus vel. Ut egestas ullamcorper consequat.
                            Vestibulum tempor, nulla a rutrum ultrices, arcu ligula egestas augue, varius varius eros purus
                            vitae ante. Proin interdum erat dolor, eu efficitur tortor ornare vitae.

                            Aenean et lorem elementum, gravida felis quis, vulputate nibh. Curabitur eu lectus in metus
                            commodo iaculis. Vestibulum sagittis congue malesuada. Aliquam semper dapibus magna. Maecenas
                            non ipsum eros. Curabitur placerat lobortis ex, ac luctus risus luctus ac. In venenatis nulla eu
                            justo euismod, non iaculis elit pellentesque. Sed hendrerit, dui nec imperdiet pretium, nunc
                            neque porta est, in condimentum nisi nisl eget mauris. Quisque ornare a nibh sed ultrices. Cras
                            eleifend sem ac ullamcorper congue. Etiam iaculis id sem a ornare. Nunc aliquet, ante vel porta
                            consectetur, leo libero vestibulum lectus, nec elementum ante nibh vitae massa. Ut fermentum
                            aliquam tellus molestie mattis.

                            Curabitur vulputate felis erat, lacinia porta mi imperdiet et. Aenean id dolor orci. Donec at
                            nunc cursus, lobortis augue nec, ultricies risus. Donec sollicitudin cursus velit. Orci varius
                            natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam interdum nisi
                            nisl, placerat malesuada diam ultricies non. Donec sit amet turpis augue. Duis quis sapien
                            feugiat, congue eros non, semper diam. Donec euismod dolor ante, semper semper dolor vestibulum
                            eget. Vestibulum sagittis tortor ut sapien dapibus, ut rutrum erat placerat. Nam vitae congue
                            dui. Morbi a est ac augue ultricies luctus. Proin rhoncus consequat neque, ut iaculis urna
                            maximus vitae. Nullam in odio efficitur, feugiat sem vel, convallis felis.
                        </div>
                    </div>
                </div>
            </section>

            {{-- Previous / Next post --}}
            @if ($navigationPost)
                <section class="bg-[#CBD7C9] py-22.5 text-[#1B2D18]">
                    <div
                        class="mx-8 md:mx-37.5 grid grid-cols-1 gap-9.5 px-6 md:grid-cols-[155px_360px_1fr] md:gap-10 md:px-0">
                        <div>
                            <div class="mb-4 flex">
                                <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                                <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                                <img src="{{ asset('resources/images/rec.svg') }}" alt="">
                            </div>

                            <h2
                                class="font-serif text-[32px] font-normal leading-[1.12] tracking-[-0.035em] text-[#1B2D18]">
                                {{ $navigationLabel }}
                            </h2>
                        </div>

                        <a href="{{ get_permalink($navigationPost) }}" class="block h-63 overflow-hidden bg-neutral-200">
                            <img src="{{ $navigationImage ?: asset('resources/images/blog2.png') }}"
                                alt="{{ esc_attr(get_the_title($navigationPost)) }}"
                                class="h-full w-full object-cover grayscale">
                        </a>

                        <div class="pt-7.75 md:ml-10 max-w-115">
                            <h3 class="mb-3 text-[24px] font-light leading-[1.18] tracking-[-0.02em] text-[#1C1D47]">
                                <a href="{{ get_permalink($navigationPost) }}">
                                    {{ get_the_title($navigationPost) }}
                                </a>
                            </h3>

                            <p class="mb-3.25 text-[16px] font-light leading-normal text-[#1C1D47]/75">
                                {{ $navigationExcerpt ?: 'Ochrona relacji z dzieckiem wymaga odpowiednio zaplanowanych działań prawnych i właściwego przygotowania materiału dowodowego.' }}
                            </p>

                            <a href="{{ get_permalink($navigationPost) }}"
                                class="text-[12px] font-bold uppercase leading-none tracking-[0.22em] text-[#D8B96F]">
                                Czytaj więcej
                            </a>
                        </div>
                    </div>
                </section>
            @endif
        </article>
    @endwhile
@endsection
