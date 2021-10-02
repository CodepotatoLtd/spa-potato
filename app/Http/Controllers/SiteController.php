<?php

namespace App\Http\Controllers;

use App\Helpers\StateHelper;
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
        // Build up any state that should be passed down to the SPA.

        $state = (new StateHelper)->getAppState();

        return view('dashboard', ['state' => $state]);
    }
}
