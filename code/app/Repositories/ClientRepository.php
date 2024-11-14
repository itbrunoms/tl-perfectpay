<?php

namespace App\Repositories;

use App\Dto\ClientDto;
use App\Models\Client;

class ClientRepository
{
    public function all()
    {
        return Client::all();
    }

    public function create(ClientDto $clientDto): Client
    {
        return Client::create($clientDto->toArray());
    }

    public function where(array $where)
    {
        return Client::where($where)->get();
    }
}
