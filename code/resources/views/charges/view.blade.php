<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 instruction-panel">
                <x-logo></x-logo>
                <h5>Instruções</h5>
                <p>Utilize os dados para pagamento</p>
                <ul>
                    <li>Leia o qrcode</li>
                    <li>Use o copia e cola</li>
                </ul>
            </div>

            <div class="col-md-8 form-panel">
                <div class="row">
                    <div class="md-12 pull-right">
                        <a href="{{route('charges.index')}}" class="btn btn-primary ">Cobranças</a>
                    </div>
                </div>

                <h3>Detalhes da cobrança</h3>

                <br>

                @include('charges.components.'.$charge->payment_page, ['charge' => $charge])


            </div>
        </div>
    </div>
</x-layout>
