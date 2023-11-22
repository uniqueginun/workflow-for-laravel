<?php

return [
    'route-prefix' => 'workflow',

    'actions' => [
        'send' => 'Send',
        'reject' => 'Reject'
    ],

    'status' => [
        'new' => 'New',
        'on-progress' => 'On Progress',
        'done' => 'Done'
    ],

    'middlewares' => [
        'web'
    ]
];
