<?php

namespace App\Http\Controllers;

use App\Dto\ChargeDto;
use App\Factories\CreateChargeFactory;
use App\Http\Requests\StoreCharge;
use App\Repositories\ClientRepository;
use App\Services\SendChargeBase;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    public function __construct(
        protected ClientRepository $clientRepository
    )
    {

    }

    public function index(Request $request)
    {
        return view('charges.index');
    }

    public function create(Request $request, $id = null)
    {
        $listOfClientes = $this->clientRepository->all();
        return view('charges.create', ['listOfClients' => $listOfClientes, 'id' => $id]);
    }

    public function store(StoreCharge $request)
    {
//        try {
            $dto = ChargeDto::buildfromRequest($request);
            $service = CreateChargeFactory::build();

            $base = new SendChargeBase();
            $base->send($dto, $service);

            return redirect()->route('charges.index')->with('success', 'Cobrança criada com sucesso');
//        } catch (\Throwable $e) {
//            dd($e->getMessage());
//            return redirect()->back()->with('error', $e->getMessage());
//        }
    }
}
