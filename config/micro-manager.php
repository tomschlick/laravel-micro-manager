<?php

return [

    // Define where the events should broadcast
    'broadcast' => [
        'enabled' => true,
        'channel' => 'laravel:queue:jobs',
    ],

    // Define your temporary storage
    'storage'   => [
        'driver'       => 'redis',
        'delete_after' => 180 // minutes
    ],
];
