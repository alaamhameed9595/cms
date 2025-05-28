<?php
return [
    'urls' => [
        'facebook' => env('FACEBOOK_URL', 'https://www.facebook.com/'),
        'twitter' => env('TWITTER_URL', 'https://www.twitter.com/'),
        'instagram' => env('INSTAGRAM_URL', 'https://www.instagram.com/'),
        'linkedin' => env('LINKEDIN_URL', 'https://www.linkedin.com/'),
        'whatsapp' => env('WHATSAPP_URL', 'https://api.whatsapp.com/send?phone='),
        'telegram' => env('TELEGRAM_URL', 'https://t.me/'),
        'tiktok' => env('TIKTOK_URL', 'https://www.tiktok.com/@'),
        'googleplus' => env('GOOGLEPLUS_URL', 'https://plus.google.com/'),
        'dribbble' => env('DRIBBBLE_URL', 'https://dribbble.com/'),
    ],
    'contact' => [
        'email' => env('CONTACT_EMAIL', 'alaamhameed9595@gmail.com'),
        'phone' => env('CONTACT_PHONE', '+971 506 074 002'),
        'address' => env('CONTACT_ADDRESS', 'UAE, Abu Dhabi'),
        'whatsapp' => env('CONTACT_WHATSAPP', '+971 506 074 002'),
        'location' => env('CONTACT_LOCATION', 'https://goo.gl/maps/3Z1b5z7x8kF2'),
    ],


];
