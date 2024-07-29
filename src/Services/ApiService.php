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

    private $options = [];

    public function __construct()
    {
        $api_url = config('lrvlsrvce.api_url');
        $this->client = new Client(['base_uri' => $api_url]);
        $this->headers['Authorization'] .= config('lrvlsrvce.api_token');
        $this->options = ['headers' => $this->headers];
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
            if (count($data) > 0) {
                $this->options['json'] = $data;
            }
            $path = sprintf("%s%s", $this->client->getConfig('base_uri')->getPath(), $endpoint);
            $response = $this->client->request('POST', $path, $this->options);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return null;
        }
    }
}
