<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function lang(Request $request)
    {
        $locale = $request->language;
        App::setLocale($locale);
        session()->put('locale', $locale);
        $user = auth()->user();
        if ($user) {
            $user->update(['locale' => $locale]);
        }
        return redirect()->back();
    }
}
