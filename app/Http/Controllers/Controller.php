<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $locale = preg_replace('/[_-]\w+$/', '', Request::getPreferredLanguage());

        if (empty($locale) || !in_array($locale, array_keys(config('tunes.languages')))) {
            $locale = 'en';
        }

        App::setLocale($locale);
    }
}
