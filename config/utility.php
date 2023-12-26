<?php

return [
    'custom_length'         =>  env('CUSTOM_ID_LENGTH', 8),
    'default_password'      =>  env('PASSWORD_LENGTH', 16),
    'caching'               =>  env('CACHE_ALLOW', false),

    'body_type'     => ['Slim', 'Curvy', 'Athletic', 'BBW', 'Muscular'],
    'gender'        => ['Men', 'Women', 'Non-binary', 'Couples'],
    'ethinicity'    => ['Asian', 'Black', 'Caucasian', 'Latin', 'Mixed'],
    'cup_size'      => ['AA', 'A', 'B', 'C', 'D', 'DD', 'DDD', 'F', 'G'],
    'hair_color'    => ['Black', 'Blonde', 'Brunette', 'Red', 'Grey', 'White'],
    'eye_color'     => ['Black', 'Blue', 'Brown', 'Green', 'Grey'],
];
