<x-layout>
    <div class="container mt-5">
        <div class="row">
            <!-- Coluna com instruções -->
            <div class="col-md-4 instruction-panel">
                <x-logo></x-logo>
                <h5>Instruções</h5>
                <p>Por favor, preencha as informações ao lado para gerar a cobrança. Certifique-se de que todos os
                    campos
                    obrigatórios estão corretos.</p>
                <ul>
                    <li>Verifique os dados do cliente</li>
                    <li>Insira o valor da cobrança</li>
                    <li>Confirme a data de vencimento</li>
                </ul>
            </div>

            <!-- Coluna com formulário de cobrança -->
            <div class="col-md-8 form-panel">
                <h5>Gerar Cobrança</h5>
                <form method="post" action="{{route('charges.store')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="row align-items-center">
                            <div class="col-md-10">
                                <select class="form-control" name="client_id">
                                    <option>Selecione o cliente</option>

                                    @foreach($listOfClients as $client)
                                        <option value="{{$client->id}}"
                                                @if($client->id == $id) selected @endif>{{$client->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <a type="button" class="btn btn-primary w-100" href="{{route('clients.list')}}">Adicionar</a>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="form-group">
                        <label for="valor">Valor da Cobrança</label>
                        <input type="number" class="form-control" id="valor" placeholder="Digite o valor"
                               name="amount"
                               value="{{old('amount')}}"
                               required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="vencimento">Data de Vencimento</label>
                        <input type="date" class="form-control" id="vencimento" name="due_date"
                               value="{{old('due_date')}}"
                               required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="vencimento">Forma de Pagamento</label>
                        <select class="form-control" name="payment_type">
                            <option>Selecione a forma de pagamento</option>
                            @foreach(\App\Enums\PaymentType::getOptions() as $type => $payment)
                                <option value="{{$type}}">{{$payment}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="col-md-12 text-end">
                        <a href="{{route('charges.index')}}"> Lista de Cobranças</a>
                        <button type="submit" class="btn btn-primary ml-10">Gerar Cobrança</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
