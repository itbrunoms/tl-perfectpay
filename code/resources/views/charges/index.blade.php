<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 instruction-panel">
                <x-logo></x-logo>
                <h5>Instruções</h5>
                <p>Visualize todas as cobranças geradas no sistema</p>
                <ul>
                    <li>Visualize as cobranças</li>
                    <li>Cliente em detalhes para visualizar o timeline da cobrança</li>
                </ul>
            </div>

            <!-- Coluna com formulário de cobrança -->
            <div class="col-md-8 form-panel">
                <div class="row">
                    <div class="md-12 text-end">
                        <a href="{{route('charges.create')}}" class="btn btn-primary ">Criar cobrança</a>
                    </div>
                </div>
                <br>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nome do Cliente</th>
                        <th>E-mail</th>
                        <th>Valor</th>
                        <th>Data de Vencimento</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($charges as $charge)
                        <tr>
                            <td>{{$charge->id}}</td>
                            <td>{{$charge->client->name}}</td>
                            <td>{{$charge->client->email}}</td>
                            <td>{{$charge->amount}}</td>
                            <td>{{$charge->due_date}}</td>
                            <td>{{$charge->status}}</td>
                        </tr>
                    @endforeach
                    <!-- Adicione mais linhas conforme necessário -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabela com lista de cobranças -->
        <div class="row mt-5">
            <div class="col-12">

            </div>
        </div>
    </div>
</x-layout>
