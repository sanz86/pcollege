<?php

namespace App\Classes;
use App;

class Client {
    
    public static function getClient($client)
    {
        $clients = ['barama' => ['client_id' => 'barama',
                            'description' => 'Barama College',
                            'tag_line' => 'nice',
                            'short' => 'BC'],
                    'pansoi' => ['client_id' => 'pansoi',
                            'description' => 'Pansoi College',
                            'tag_line' => 'Very nice',
                            'short' => 'PC'],
                    ];
                
        return $clients[$client];
    }
}