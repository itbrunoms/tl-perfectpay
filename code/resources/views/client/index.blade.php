<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 instruction-panel">
                <x-logo></x-logo>
                <h5>Instruções</h5>
                <p>Aqui você pode visualizar todos os clientes cadastrados na base</p>
                <ul>
                    <li>Visualize os clientes</li>
                    <li>Adicione uma cobrança para um cliente</li>
                </ul>
            </div>

            <!-- Coluna com formulário de cobrança -->
            <div class="col-md-8 form-panel">
                <div class="row">
                    <div class="md-12">
                        <a href="{{route('charges.create')}}"
                           class="btn btn-primary pull-right mr-15">
                            Criar Cobrança
                        </a>
                        <button type="button" data-toggle="modal" data-target="#createClient"
                                class="btn btn-primary pull-right mr-15">
                            Criar cliente
                        </button>
                    </div>
                </div>
                <br>
                @if($list->count() > 0)
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nome do Cliente</th>
                            <th>E-mail</th>
                            <th>Documento</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $client)
                            <tr>
                                <td><a href="{{route('charges.create', ['id'=>$client->id])}}"> <i
                                                class="glyphicon glyphicon-inbox"></i> </a></td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->document}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info">Nenhum cliente cadastrado</div>
                @endif
            </div>
        </div>

        <!-- Tabela com lista de cobranças -->
        <div class="row mt-5">
            <div class="col-12">

            </div>
        </div>
    </div>

    <!-- Modal de criação de cliente -->
    <x-create-client-modal></x-create-client-modal>

</x-layout>


