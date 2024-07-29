<?php

namespace Yuricronos\LaravelService\Services;

use GuzzleHttp\Client;

class ApiService
{
    protected $client;

    private $headers = [
        'Authorization' => 'Bearer ',
        'Accept'        => 'application/json',
    ];

    public function __construct()
    {
        $this->client = new Client(['base_uri' => config('lrvlsrvce.api_url')]);
        $this->headers['Authorization'] .= config('lrvlsrvce.api_token');
    }

    public function getData(string $endpoint = "")
    {
        try {
            $response = $this->client->request('GET', $endpoint, ['headers' => $this->headers]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function postData(string $endpoint = "", array $data = [])
    {
        try {
            $response = $this->client->request('POST', $endpoint, ['headers' => $this->headers, 'json' => $data]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return null;
        }
    }
}
