<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LocalizationController extends Controller
{
    public function locale($locale)
    {
        App::setLocale($locale);
        Session::put('locale', $locale);

        return Redirect::back();
    }
}
