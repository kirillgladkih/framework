<?php
/**
 * AUTH CONFIG
 */
return [
    /**
     * AUTH PROVIDER
     */
    "auth" => \App\Services\Auth\Providers\JwtAuthProvider::class,
    /**
     * JWT CONFIG
     */
    "jwt" => [
        "key" => "ZG6I[|xG2!EG??PYglW8D?S=1m{hG<[/A(knRQbe^jS>#KBP;/4f#n$3#n8Gu`",
        "secure" => [
            "iss" => "http://shop.local",
            "aud" => "http://shop.local/",
            "iat" => "1356999524",
            "nbf" => "1357000000"
        ],
        "allowedAlgs" => ["HS256"]
    ]
];
