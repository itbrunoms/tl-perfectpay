<?php

namespace App\Services;

use App\Dto\ClientDto;
use App\Events\CreateClientAsaas;
use App\Repositories\ClientRepository;

class CreateClient
{
    public function __construct(
        public ClientRepository $clientRepository
    )
    {
    }

    public function create(ClientDto $clientDto)
    {
        $client = $this->clientRepository->create($clientDto);
        event(new CreateClientAsaas($client));

        return $client;
    }
}
