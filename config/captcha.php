<?php

return [
    'secret' => env('RECAPTCHA_SITEKEY'),
    'sitekey' => env('RECAPTCHA_SECRET'),
    'options' => [
        'timeout' => 30,
    ],
];
