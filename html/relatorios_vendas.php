<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Relatório de Vendas</title>
    
    <!-- Link para os arquivos de estilo CSS -->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/relatorio-vendas.css">
    
    <!-- Scripts JavaScript para funcionalidades adicionais -->
    <script src="../js/load-content.js"></script>
    <script src="../js/relatorio-vendas.js"></script>
</head>

<body>

    <!-- Cabeçalho com o nome da startup -->
    <header>
        <h1>CIFU - Controle Inteligente de Fazendo Urbana</h1>
        <p>&nbsp;</p>
    </header>

    <!-- Barra de navegação com links para as principais páginas -->
    <nav>
        <a href="login.html" class="login-button">
            <!-- Ícone de login -->
            <img id="imagem" src="../img/login icone.png">
        </a>
        <a href="layout.html">Início</a>
        <a href="produtos.html">Cadastro de Produtos</a>
        <a href="clientes.html">Cadastro de Clientes</a>
        <a href="vendas.html">Vendas</a>
        <a href="relatorios_selecao.html">Relatórios</a>
        <a href="sobre.html">Sobre</a>
    </nav>

    <!-- Seção de filtro de datas para o relatório -->
    <div class="filtro-container">
        <label for="dataInicio">Data de Início:</label>
        <!-- Campo de seleção de data de início -->
        <input type="date" id="dataInicio">
        
        <label for="dataFim">Data de Fim:</label>
        <!-- Campo de seleção de data de fim -->
        <input type="date" id="dataFim">
        
        <!-- Botão para aplicar o filtro de data -->
        <button onclick="carregarRelatorio()">Filtrar</button>
    </div>

    <!-- Conteúdo principal da página -->
    <div id="content">
        <div class="relatorio-container">
            <h1>Relatório de Vendas</h1>

            <!-- Tabela para exibir dados do relatório de vendas -->
            <table>
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody id="relatorioTabelaBody">
                    <!-- Dados do relatório serão carregados aqui dinamicamente -->
                </tbody>
            </table>

            <!-- Área para exibir o valor total das vendas -->
            <div class="total-container">
                Valor total: <span id="valorTotal">0.00</span>
            </div>
        </div>
    </div>

    <!-- Rodapé com direitos autorais -->
    <footer>
        <p>&copy; 2024 CIFU - Controle Inteligente de Fazendo Urbana. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
