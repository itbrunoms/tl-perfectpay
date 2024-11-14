<?php

namespace App\Services;

use App\Dto\ChargeDto;
use App\Enums\PaymentType;
use App\Events\CreateAsaasChargeApi;
use App\Interfaces\CreateCharge;
use App\Models\Charge;

class CreateAsaasCharge implements CreateCharge
{
    public function create(ChargeDto $dto): Charge
    {
        $charge = Charge::create($dto->toArray());
        event(new CreateAsaasChargeApi($charge));

        return $charge;
    }
}
