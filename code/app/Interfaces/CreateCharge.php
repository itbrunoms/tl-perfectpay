<?php

namespace App\Interfaces;

use App\Dto\ChargeDto;
use App\Models\Charge;

interface CreateCharge
{
    public function create(ChargeDto $dto): Charge;
}
