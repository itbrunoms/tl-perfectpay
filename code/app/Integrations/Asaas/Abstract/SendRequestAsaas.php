<?php

namespace App\Integrations\Asaas\Abstract;

use GuzzleHttp\Client;
use function Pest\Laravel\json;

class SendRequestAsaas
{
    protected string $url;
    protected array $data;
    protected string $method;

    public function build(array $data): void
    {
        $this->data = $data;
    }

    public function send(): array
    {
        $urlAsaas = env('ASAAS_URL') . $this->url;
        $client = new Client();
        $response = $client->request($this->method, $urlAsaas, [
            'body' => json_encode($this->data),
            'headers' => [
                'accept' => 'application/json',
                'access_token' => env('ASAAS_TOKEN'),
                'content-type' => 'application/json',
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}
