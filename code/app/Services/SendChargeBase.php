<?php

namespace App\Services;

use App\Dto\ChargeDto;
use App\Interfaces\CreateCharge;
use App\Models\Charge;

class SendChargeBase
{
    public function send(ChargeDto $dto, CreateCharge $service): Charge
    {
        return $service->create($dto);
    }
}
