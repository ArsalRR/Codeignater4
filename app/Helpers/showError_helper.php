<?php

if (!function_exists('show_error_class')) {
    function show_error_class(string $key): string
    {
        return session()->getFlashData($key) ? 'is-invalid' : '';
    }
}
if (!function_exists('show_error')) {
    function show_error(string $key): string
    {
        return session()->getFlashData($key) ? '<div class="invalid-feedback">' . session()->getFlashData($key) . '</div>' : '';
    }
}
