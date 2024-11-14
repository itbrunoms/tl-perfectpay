<?php

namespace App\Http\Controllers;

use App\Dto\ClientDto;
use App\Http\Requests\CreateClient;
use App\Http\Resources\ClientResource;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;
use function Pest\Laravel\put;

class ClientController extends Controller
{
    public function __construct(public ClientRepository $clientRepository)
    {

    }

    public function index()
    {
        $list = $this->clientRepository->all();
        return view('client.index', ['list' => $list]);
    }

    public function store(CreateClient $createClientRequest)
    {
        $clientDto = ClientDto::buildFromRequest($createClientRequest);
        $client = app(\App\Services\CreateClient::class)->create($clientDto);

        session()->flash('success', 'Cliente cadastrado com sucesso!');
        return redirect()->route('clients.list');
    }
}
