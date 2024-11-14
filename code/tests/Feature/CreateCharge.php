<?php

namespace Tests;


use App\Enums\PaymentType;
use App\Http\Controllers\ChargeController;
use App\Http\Requests\StoreCharge;
use App\Repositories\ChargeRepository;
use App\Repositories\ClientRepository;

beforeEach(function () {
    $this->chargeRepository = \Mockery::mock(ChargeRepository::class);
    $this->clientRepository = \Mockery::mock(ClientRepository::class);
});

/***
 * Exemplo de teste de end-to-end
 */
it('createAccountSuccess', function () {
    $request = \Mockery::mock(StoreCharge::class);
    $request->shouldReceive('validated')
        ->andReturn([
            'client_id' => 1,
            'amount' => 100.00,
            'due_date' => '2027-12-12',
            'payment_type' => PaymentType::PIX->value
        ]);

    $controller = new ChargeController($this->clientRepository, $this->chargeRepository);
    $responseData = $controller->store($request);

    expect($responseData->getStatusCode())->toBe(302);
});



