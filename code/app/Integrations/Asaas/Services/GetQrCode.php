<?php

namespace App\Integrations\Asaas\Services;

use App\Integrations\Asaas\Abstract\SendRequestAsaas;
use App\Integrations\Asaas\Interface\RequestAssasInterface;
use GuzzleHttp\Client;

class GetQrCode extends SendRequestAsaas implements RequestAssasInterface
{
    protected string $url = 'payments/{id}/pixQrCode';
    protected string $method = 'GET';
}
