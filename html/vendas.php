<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro de Vendas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/vendas.css">
     <script src="../js/load-content.js"></script>
    <script src="../js/vendas.js"></script>
</head>

<body>

    <!-- Cabeçalho e Navegação principal do layout.html -->
    <header>
        <h1>CIFU - Controle Inteligente de Fazendo Urbana</h1>
    </header>

    <!-- Navegação -->
     <nav>
        <a href="login.php" class="login-button">
            <img id="imagem" src="../img/login icone.png"> <!-- Ícone de Login -->
        </a>
        <a href="layout.php">Início</a>
        <a href="produtos.php">Cadastro de Produtos</a>
        <a href="clientes.php">Cadastro de Clientes</a>
        <a href="vendas.php">Vendas</a>
        <a href="relatorios_selecao.php">Relatórios</a>
        <a href="sobre.php">Sobre</a>
    </nav>

    <!-- Conteúdo principal da página de vendas -->
    <div class="venda-container">
        <h1>Registro de Vendas</h1>
        <br><br>

        <!-- Cabeçalho da venda -->
        <div class="venda-header">
            <div>
                <label for="cliente">Selecione o cliente:</label>
                <select id="cliente">
                    <!-- Os clientes serão carregados aqui -->
                </select>
            </div>

            <div>
                <label for="produto">Selecione o produto:</label>
                <select id="produto">
                    <!-- Os produtos serão carregados aqui -->
                </select>
            </div>

            <div>
                <label for="quantidade">Quantidade:</label>
                <input type="number" id="quantidade" value="1" min="1">
            </div>
        </div>

        <!-- Tabela de produtos -->
        <div class="venda-table-container">
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>QTD</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody id="vendaTabelaBody">
                    <!-- Os produtos serão inseridos aqui -->
                </tbody>
            </table>
        </div>

        <!-- Total -->
        <div class="total-container">
            Valor total: R$ <span id="valorTotal">0.00</span>
        </div>

        <!-- Mensagem de sucesso -->
        <div id="mensagemSucesso" class="mensagem-sucesso" style="display:none;">Vendas enviadas com sucesso!</div>

        <!-- Botões de ação -->
        <div class="venda-actions">
            <button class="enviar-btn" onclick="adicionarVenda()">Adicionar</button>
            <button class="cancelar-btn">Cancelar</button>
            <button class="apagar-btn" onclick="apagarUltimo()">Apagar último</button>
            <button class="enviar-relatorio-btn" onclick="enviarRelatorio()">Enviar</button>
        </div>
    </div>

    <!-- Rodapé principal do layout.html -->
    <footer>
        <p>&copy; 2024 CIFU - Controle Inteligente de Fazendo Urbana. Todos os direitos reservados.</p>
    </footer>

    <script>
       
    </script>
</body>

</html>
