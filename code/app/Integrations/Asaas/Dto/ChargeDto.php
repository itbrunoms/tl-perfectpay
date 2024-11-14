<?php

namespace App\Integrations\Asaas\Dto;

use App\Integrations\Asaas\Interface\AssasDtoInterface;
use Illuminate\Database\Eloquent\Model;

class ChargeDto implements AssasDtoInterface
{

    public function __construct(
        public string $customer,
        public string $billingType,
        public string $value,
        public string $dueDate,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'customer' => $this->customer,
            'billingType' => $this->billingType,
            'value' => $this->value,
            'dueDate' => $this->dueDate,
        ];
    }

    public static function buildFromModel(Model $model)
    {

        return new self(
            $model->client->external_id,
            $model->payment_type,
            $model->amount,
            $model->due_date,
        );
    }
}
