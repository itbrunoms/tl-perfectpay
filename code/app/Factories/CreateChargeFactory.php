<?php

namespace App\Factories;

use App\Interfaces\CreateCharge;
use App\Services\CreateAsaasCharge;

class CreateChargeFactory
{
    public static function build(): CreateCharge
    {
        $serviceIntregation = env('CHARGE_INTEGRATION');
        switch ($serviceIntregation) {
            case 'ASAAS':
                return new CreateAsaasCharge();
            default:
                throw new \Exception('Integration not found');
        }
    }
}
