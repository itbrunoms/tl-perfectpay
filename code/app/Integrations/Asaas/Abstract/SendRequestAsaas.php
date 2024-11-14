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
        foreach ($data as $key => $value) {
            $this->url = str_replace("{" . $key . "}", $value, $this->url);
        }
    }

    public function send(): array
    {
        $urlAsaas = env('ASAAS_URL') . $this->url;
        $client = new Client();

        $content = [
            'body' => json_encode($this->data),
            'headers' => [
                'accept' => 'application/json',
                'access_token' => env('ASAAS_TOKEN'),
                'content-type' => 'application/json',
            ]
        ];

        if ($this->method == 'GET') unset($content['body']);

        $response = $client->request($this->method, $urlAsaas, $content);

        return json_decode($response->getBody(), true);
    }
}
