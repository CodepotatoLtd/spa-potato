<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserStateResource;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display the SPA dashboard
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showSite()
    {
        $state = [];

        if (auth()->check()) {
            $state['user'] = new UserStateResource(auth()->user());
        }

        return view('dashboard', ['state' => $state]);
    }
}
