<?php

namespace App\Listeners;

use App\Events\CreateAsaasChargeApi;
use App\Integrations\Asaas\Dto\ChargeDto;
use App\Integrations\Asaas\Services\CreateCharge;

class SendAsaasRequestListener
{
    public function handle(CreateAsaasChargeApi $event): void
    {
        $charge = $event->charge;
        $dto = ChargeDto::buildFromModel($charge);
        $service = new CreateCharge();
        $service->build($dto->toArray());
        $process = $service->send();
        dd($process);

    }
}
