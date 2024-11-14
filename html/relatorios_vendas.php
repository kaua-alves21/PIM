<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Relatório de Vendas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/relatorio-vendas.css">
      <script src="../js/load-content.js"></script>
    <script src="../js/relatorio-vendas.js"></script>
</head>

<body>

    <header>
        <h1>Startup Segurança Alimentar</h1>
        <p>&nbsp;</p>
    </header>

    <nav>
        <a href="login.html" class="login-button">
            <img id="imagem" src="../img/login icone.png">
        </a>
        <a href="layout.html">Início</a>
        <a href="produtos.html">Cadastro de Produtos</a>
        <a href="clientes.html">Cadastro de Clientes</a>
        <a href="vendas.html">Vendas</a>
        <a href="relatorios_selecao.html">Relatórios</a>
        <a href="sobre.html">Sobre</a>
    </nav>

    <div class="filtro-container">
        <label for="dataInicio">Data de Início:</label>
        <input type="date" id="dataInicio">
        <label for="dataFim">Data de Fim:</label>
        <input type="date" id="dataFim">
        <button onclick="carregarRelatorio()">Filtrar</button>
    </div>

    <div id="content">
        <div class="relatorio-container">
            <h1>Relatório de Vendas</h1>

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
                    <!-- As vendas serão inseridas aqui -->
                </tbody>
            </table>

            <div class="total-container">
                Valor total: <span id="valorTotal">0.00</span>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Startup de Segurança Alimentar. Todos os direitos reservados.</p>
    </footer>

    

</body>

</html>
