<?php
namespace Application\Service;

use GuzzleHttp\Client as HttpClient;

class TrackService
{

    public function __construct()
    {
        $this->client = new HttpClient();
    }

    public function sendRegistration($name, $email, $cookie)
    {
        $body = [
            'name' => $name,
            'email' => $email,
            'cookie' => $cookie
        ];
        
        $options = [
            'headers' => [
                'content-type' => 'application/json'
            ]
        ];
        
        $this->client->request('POST', 'https://secret-hamlet-70870.herokuapp.com/register', [
            'json' => $body
        ], $options);
    }
}