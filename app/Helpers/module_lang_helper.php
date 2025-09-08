<?php

if (!function_exists('ml')) {

    /**
     * Module-based language helper
     *
     * @param string $module  Nama module (contoh: 'Login')
     * @param string $key     Key dalam file language
     * @return string
     */
    function ml(string $module, string $key): string
    {
        $locale = session('lang') ?? 'ms';
        $file = APPPATH . "Modules/$module/Language/$locale/$module.php";

        if (!file_exists($file)) {
            return $key; // fallback kalau file tak wujud
        }

        $lines = include $file;

        return $lines[$key] ?? $key; // fallback kalau key tak wujud
    }
}

// if (!function_exists('ml')) {
//     function ml(string $module, string $key): string
//     {
//         return lang("$module.$key");
//     }
// }
