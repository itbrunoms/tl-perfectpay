<?php

namespace App\Integrations\Asaas\Services;

use App\Integrations\Asaas\Abstract\SendRequestAsaas;
use App\Integrations\Asaas\Interface\RequestAssasInterface;
use GuzzleHttp\Client;

class CreateClient extends SendRequestAsaas implements RequestAssasInterface
{
    protected string $url = 'customers';
    protected string $method = 'POST';
}
