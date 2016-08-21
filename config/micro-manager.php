<?php

return [

    // Define where the events should broadcast
    'broadcast' => [
        'enabled' => true,
        'channel' => 'laravel:queue:jobs',
    ],
];
