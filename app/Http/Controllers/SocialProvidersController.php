<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Services\Contracts\Social;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\Foundation\Application;

class SocialProvidersController extends Controller
{
    public function redirect(string $driver): SymfonyRedirectResponse | RedirectResponse

    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social): Redirector | Application | RedirectResponse
    {
        return redirect($social->loginAndGetRedirectUrl(
            Socialite::driver($driver)->user())
        );
    }
}
