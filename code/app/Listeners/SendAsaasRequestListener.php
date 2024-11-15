<?php

namespace App\Listeners;

use App\Enums\PaymentType;
use App\Enums\StatusOfChange;
use App\Events\CreateAsaasChargeApi;
use App\Integrations\Asaas\Dto\ChargeDto;
use App\Integrations\Asaas\Services\CreateCharge;
use App\Integrations\Asaas\Services\GetQrCode;

class SendAsaasRequestListener
{
    public function handle(CreateAsaasChargeApi $event): void
    {
        $charge = $event->charge;
        $dto = ChargeDto::buildFromModel($charge);
        $service = new CreateCharge();
        $service->build($dto->toArray());
        $asaasPayment = $service->send();

        $charge->update([
            'external_id' => $asaasPayment['id'],
            'payment_url' => $asaasPayment['invoiceUrl'],
            'status' => StatusOfChange::CREATED
        ]);

        if($charge->payment_type == PaymentType::PIX->value){
            $qrCodeService = new GetQrCode();
            $qrCodeService->build(['id'=>$charge->external_id]);
            $content = $qrCodeService->send();
            $charge->update([
                'encoded_image' => $content['encodedImage'],
                'payload' => $content['payload']
            ]);
        }
    }
}
