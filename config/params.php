<?php

return [
    'domain' => getenv('APP_URL'),
    'adminEmail' => getenv('APP_MAILER_USERNAME'),
    'supportEmail' => getenv('APP_MAILER_USERNAME'),
    'contactEmail' => getenv('APP_MAIL_CONTACT'),
    'bsDependencyEnabled' => false, // this will not load Bootstrap CSS and JS for all Krajee extensions
    // you need to ensure you load the Bootstrap CSS/JS manually in your view layout before Krajee CSS/JS assets
    //
    // other params settings below
     'bsVersion' => '4.x',
    // 'adminEmail' => 'admin@example.com'
];
