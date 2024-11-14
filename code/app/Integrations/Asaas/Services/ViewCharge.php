<?php

namespace App\Integrations\Asaas\Services;

use App\Integrations\Asaas\Abstract\SendRequestAsaas;
use App\Integrations\Asaas\Interface\RequestAssasInterface;
use GuzzleHttp\Client;


class ViewCharge extends SendRequestAsaas implements RequestAssasInterface
{
    protected string $url = 'payments/{id}';
    protected string $method = 'GET';
}
