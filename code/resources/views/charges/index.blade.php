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
                    @for($i = 0; $i < 10; $i++)
                        <tr>
                            <td>1</td>
                            <td>João Silva</td>
                            <td>joao@email.com</td>
                            <td>R$ 150,00</td>
                            <td>2024-11-15</td>
                            <td>Pendente</td>
                        </tr>
                    @endfor
                    <tr>
                        <td>2</td>
                        <td>Maria Santos</td>
                        <td>maria@email.com</td>
                        <td>R$ 200,00</td>
                        <td>2024-11-20</td>
                        <td>Paga</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Pedro Costa</td>
                        <td>pedro@email.com</td>
                        <td>R$ 300,00</td>
                        <td>2024-12-01</td>
                        <td>Atrasada</td>
                    </tr>
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
