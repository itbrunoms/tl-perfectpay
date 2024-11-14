<?php

namespace App\Repositories;

use App\Dto\ClientDto;
use App\Enums\StatusOfChange;
use App\Models\Charge;
use App\Models\Client;
use phpDocumentor\Reflection\Types\Collection;

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

    public function getAllCreated()
    {
        return $this->charge::where('status', StatusOfChange::CREATED);
    }

}
