<?php

namespace App\Listeners;

use App\Events\CreateClientAsaas;
use App\Integrations\Asaas\Dto\ClientDto;
use App\Integrations\Asaas\Services\CreateClient;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateClientAsaasListener
{
    public function handle(CreateClientAsaas $event): void
    {
        $assasDto = ClientDto::buildFromModel($event->client);
        $serviceAsaas = new CreateClient();
        $serviceAsaas->build($assasDto->toArray());
        $result = $serviceAsaas->send();

        $event->client->update([
            'external_id' => $result['id']
        ]);
    }
}
