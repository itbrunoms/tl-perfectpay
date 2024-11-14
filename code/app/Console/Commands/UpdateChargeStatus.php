<?php

namespace App\Console\Commands;

use App\Enums\StatusOfChange;
use App\Integrations\Asaas\Services\ViewCharge;
use App\Repositories\ChargeRepository;
use Illuminate\Console\Command;

/***
 * implementação simples para autalizar o status da cobrança
 * o ideal nesse cenário é umplementar um webhook, mas a modelo de apresentação vamos fazer como rotina
 * Já que para tratar um volume alto de requisições que ache interessante usar fila
 */
class UpdateChargeStatus extends Command
{
    protected $signature = 'app:update-charge-status';


    protected $description = 'Command description';

    public function handle()
    {
        $repository = app(ChargeRepository::class);
        $list = $repository->getAllCreated()->get();

        $this->withProgressBar($list, function ($charge) {
            $data = ['id' => $charge->external_id];
            $service = new ViewCharge();
            $service->build($data);
            $asaasPayment = $service->send();
            if ($charge->status != $asaasPayment['status']) {
                $charge->update([
                    'status' => StatusOfChange::from($asaasPayment['status'])->value
                ]);
            }
        });
    }
}
