<?php

namespace App\Repositories;

use App\Dto\ClientDto;
use App\Models\Client;

class ClientRepository
{
    public function __construct(
        protected Client $client
    )
    {

    }

    public function all()
    {
        return $this->client::all();
    }

    public function create(ClientDto $clientDto): Client
    {
        return $this->client::create($clientDto->toArray());
    }

    public function where(array $where)
    {
        return $this->client::where($where)->get();
    }
}
