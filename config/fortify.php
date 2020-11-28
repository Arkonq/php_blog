<?php

use App\Providers\RouteServiceProvider;
use Laravel\Fortify\Features;

return [

    'guard' => 'web',

    'passwords' => 'users',

    'username' => 'email',

    'email' => 'email',

    'home' => RouteServiceProvider::HOME,

    'middleware' => ['web'],

    'limiters' => [
        'login' => null,
    ],

    'features' => [
        Features::registration(),
//        Features::resetPasswords(),
        // Features::emailVerification(),
//        Features::updateProfileInformation(),
//        Features::updatePasswords(),
//        Features::twoFactorAuthentication([
//            'confirmPassword' => true,
//        ]),
    ],

];
