<x-layout>
    <div class="container my-5">
        <div class="text-center mb-5">
            <h1 class="display-5">Desafio de TL</h1>
            <p class="lead">PHP | Laravel</p>
        </div>

        <section class="mb-4">
            <h2 class="h4">Objetivo</h2>
            <p>O desafio consiste em desenvolver um sistema de processamento de pagamentos integrado ao ambiente de
                homologação do Asaas. O cliente acessará uma página onde poderá selecionar a forma de pagamento: Boleto,
                Cartão ou Pix.</p>
        </section>

        <section class="mb-4">
            <h2 class="h4">Detalhes do Desafio</h2>
            <ul>
                <li>O sistema deve ser desenvolvido em <strong>PHP</strong> usando o framework <strong>Laravel</strong>.
                </li>
                <li>Tratar os dados na requisição para garantir que todos os dados necessários estejam presentes e
                    corretos.
                </li>
                <li>Responder às solicitações padronizando as respostas com Resources conforme necessário.</li>
                <li>Implementar e padronizar as requisições de API para integração com o Asaas.</li>
                <li>Oferecer opções de pagamento via Boleto, Cartão de Crédito e Pix.</li>
                <li>Na página de confirmação, fornecer links e dados conforme o tipo de pagamento.</li>
                <li>Exibir mensagens amigáveis em caso de erros ou recusas de pagamento.</li>
            </ul>
        </section>

        <section class="mb-4">
            <h2 class="h4">Passos para Iniciar</h2>
            <p>
                1. Crie uma conta no Asaas Sandbox: <a href="https://sandbox.asaas.com/" target="_blank">https://sandbox.asaas.com/</a>.<br>
                2. Acesse a parte de Configuração de Conta -> Integrações e obtenha a API Key para integração.<br>
                3. Inicie o desenvolvimento do sistema e submeta o código no GitHub em um repositório privado,
                compartilhado com <strong>lucassdoro</strong>.<br>
                4. Envie o link do repositório para nosso email assim que finalizar.
            </p>
        </section>

        <section class="mb-4">
            <h2 class="h4">Opcionais</h2>
            <ul>
                <li>Testes automatizados com cobertura de testes.</li>
                <li>Persistência dos dados em banco relacional (preferencialmente MySQL).</li>
            </ul>
        </section>

        <section class="mb-5">
            <h2 class="h4">Recomendações</h2>
            <ul>
                <li>Utilizar boas práticas de programação e Git.</li>
                <li>Documentar como rodar o projeto.</li>
                <li>Não se preocupe com a qualidade do front-end, o foco está na funcionalidade.</li>
            </ul>
        </section>

        <div class="text-center">
            <a class="btn btn-primary" href="{{route('clients.list')}}">Ver clientes</a>
            <a class="btn btn-primary" href="{{route('charges.index')}}">Ver cobranças</a>
            <a class="btn btn-primary" href="{{route('charges.create')}}">Criar uma cobrança</a>
        </div>
    </div>

</x-layout>
