<?php

if (! function_exists('ewa_kodymowska_siola_language_options_post_id')) {
    function ewa_kodymowska_siola_language_options_post_id(?string $language = null): string
    {
        $language = $language ?: (function_exists('pll_current_language') ? pll_current_language() : 'pl');

        return match ($language) {
            'bg', 'en' => 'header-footer-en',
            'fr' => 'header-footer-fr',
            'pl' => 'header-footer-pl',
            default => 'header-footer-pl',
        };
    }
}

if (! function_exists('ewa_kodymowska_siola_get_language_option')) {
    function ewa_kodymowska_siola_get_language_option(string $field, mixed $default = null, ?string $language = null): mixed
    {
        if (! function_exists('get_field')) {
            return $default;
        }

        $languagePostId = ewa_kodymowska_siola_language_options_post_id($language);
        $value = get_field($field, $languagePostId);

        if (! empty($value)) {
            return $value;
        }

        $sharedValue = get_field($field, 'option');

        return ! empty($sharedValue) ? $sharedValue : $default;
    }
}
