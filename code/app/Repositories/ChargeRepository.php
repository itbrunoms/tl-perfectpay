<?php

namespace App\Repositories;

use App\Dto\ClientDto;
use App\Models\Charge;
use App\Models\Client;

class ChargeRepository
{
    public function __construct(
        protected Charge $charge
    )
    {
    }

    public function all()
    {
        return $this->charge::with('client')->get();
    }

}
