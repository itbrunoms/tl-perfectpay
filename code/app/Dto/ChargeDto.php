<?php

namespace App\Dto;

use App\Enums\StatusOfChange;
use App\Http\Requests\StoreCharge;
use App\Interfaces\BuildFromRequest;
use App\Interfaces\ToArray;
use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;

class ChargeDto implements ToArray, BuildFromRequest
{
    public function __construct(
        public int    $client_id,
        public float  $amount,
        public string $due_date,
        public string $payment_type,
        public string $status,
    )
    {
    }

    /**
     * @param StoreCharge $request
     * @return ChargeDto
     */
    static function buildfromRequest(FormRequest $request): ChargeDto
    {
        return new ChargeDto(
            $request->client_id,
            $request->amount,
            $request->due_date,
            $request->payment_type,
            StatusOfChange::PENDING->value
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'client_id' => $this->client_id,
            'amount' => $this->amount,
            'due_date' => $this->due_date,
            'payment_type' => $this->payment_type,
            'status' => $this->status,
        ];
    }
}
