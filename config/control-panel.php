<?php

return [
    'gitlab' => [
        'token' => env('GITLAB_TOKEN'),
        'url' => env('GITLAB_URL', 'https://git.xtelecom.ro'),
    ],
    'sentry' => [
        'token' => env('SENTRY_TOKEN'),
        'url' => env('SENTRY_URL', 'https://sentry.io'),
    ],
];
