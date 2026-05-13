@php
    $items = $items ?? [];
    $separator = $separator ?? '-';
    $count = is_array($items) ? count($items) : 0;

    $resolveItemUrl = function ($item) {
        $link = $item['link'] ?? ($item['url'] ?? null);

        if (is_array($link)) {
            return $link['url'] ?? null;
        }

        if (is_string($link) && $link !== '') {
            return $link;
        }

        return null;
    };
@endphp

@if ($count)
    @foreach ($items as $i => $item)
        @if ($i > 0)
            <span class="mx-1.25">{{ $separator }}</span>
        @endif

        @php
            $isLast = $i === $count - 1;
            $label = $item['label'] ?? '';
            $url = $resolveItemUrl($item);
        @endphp

        @if (!$isLast && !empty($url))
            <a href="{{ $url }}">{{ $label }}</a>
        @elseif (!$isLast && empty($url))
            <a href="#">{{ $label }}</a>
        @else
            <span>{{ $label }}</span>
        @endif
    @endforeach
@endif
