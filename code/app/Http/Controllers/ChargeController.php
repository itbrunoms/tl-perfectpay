<?php

namespace App\Http\Controllers;

use App\Dto\ChargeDto;
use App\Enums\StatusOfChange;
use App\Factories\CreateChargeFactory;
use App\Http\Requests\StoreCharge;
use App\Models\Charge;
use App\Repositories\ChargeRepository;
use App\Repositories\ClientRepository;
use App\Services\SendChargeBase;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    public function __construct(
        protected ClientRepository $clientRepository,
        protected ChargeRepository $chargeRepository
    )
    {

    }

    public function index(Request $request)
    {
        $charges = $this->chargeRepository->all();
        return view('charges.index', ['charges' => $charges]);
    }

    public function create(Request $request, $id = null)
    {
        $listOfClientes = $this->clientRepository->all();
        return view('charges.create', ['listOfClients' => $listOfClientes, 'id' => $id]);
    }

    public function store(StoreCharge $request)
    {
        try {
            $dto = ChargeDto::buildfromRequest($request);
            $service = CreateChargeFactory::build();

            $base = new SendChargeBase();
            $base->send($dto, $service);

            return redirect()->route('charges.index')->with('success', 'Cobrança criada com sucesso');
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function view(Request $request, Charge $charge)
    {
        return view('charges.view', ['charge' => $charge]);
    }

    public function confirm(Request $request, Charge $charge)
    {
        if($charge->status != StatusOfChange::APPROVED->value){
            $charge->status = StatusOfChange::APPROVED;
            $charge->save();
            return redirect()->route('charges.index')->with('success', 'Cobrança aprovada com sucesso');
        } else {
            return redirect()->route('charges.index')->with('error', 'Cobrança já aprovada');
        }
    }
}
