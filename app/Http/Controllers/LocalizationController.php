<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LocalizationController extends Controller
{
    public function setLocale($locale)
    {
        // check the requested lang 
        if (!in_array($locale, config('app.available_locales'))) {
            return back()->withErrors(['error' => trans('global.invalid lang')]);
        }

        // // check if language == en
        // if ($locale == 'en') {
        //     return back()->withErrors(['error' => trans('global.under developing', ['attribute' => trans('global.en')])])->withInput();
        // }

        // set the new locale
        app()->setLocale($locale);

        // check locale in session
        Session::put('locale', $locale);

        // redirect back
        return back()->with('success', trans('global.lang changed', ['lang' => trans('global.' . $locale)]));
    }
}
