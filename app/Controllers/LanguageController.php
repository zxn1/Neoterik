<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;

class LanguageController extends Controller
{
    public function switch($locale = 'ms')
    {
        $session = session();
        $session->set('lang', $locale);

        // tukar locale request
        Services::request()->setLocale($locale);

        return redirect()->back();
    }

    // helper untuk module-based lang
    public static function ml($module, $key)
    {
        $locale = session('lang') ?? 'ms';

        // path ke language file module
        $file = APPPATH . "Modules/$module/Language/$locale/$module.php";

        if (!file_exists($file)) return $key;

        $lines = include $file;

        return $lines[$key] ?? $key;
    }
}
