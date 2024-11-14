<?php

namespace App\Integrations\Asaas\Services;

use App\Integrations\Asaas\Abstract\SendRequestAsaas;
use App\Integrations\Asaas\Interface\RequestAssasInterface;
use GuzzleHttp\Client;

class CreateCharge extends SendRequestAsaas implements RequestAssasInterface
{
    protected string $url = 'payments';
    protected string $method = 'POST';
}
