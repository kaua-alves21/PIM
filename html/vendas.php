<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro de Vendas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/vendas.css">
    
</head>

<body>

    <!-- Cabeçalho e Navegação principal do layout.html -->
    <header>
        <h1>Startup Segurança Alimentar</h1>
    </header>

    <!-- Navegação -->
    <nav>
        <a href="login.html" class="login-button">
            <img id = "imagem" src="../img/login icone.png" > <!-- Ícone de Login -->
           
        </a>
        <a href="layout.html">Início</a>
        <a href="produtos.html">Cadastro de Produtos</a>
        <a href="clientes.html">Cadastro de Clientes</a>
        <a href="vendas.html">Vendas</a>
        <a href="relatorios_selecao.html">Relatórios</a>
        <a href="sobre.html">Sobre</a>
       
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
        <p>&copy; 2024 Startup de Segurança Alimentar. Todos os direitos reservados.</p>
    </footer>

    <script>
        // Variáveis para armazenar o valor total e os produtos
        let vendas = [];
        let total = 0;

        // Função para carregar os clientes do localStorage
        function carregarClientes() {
            const clientes = JSON.parse(localStorage.getItem("clientes")) || [];
            const clienteSelect = document.getElementById("cliente");

            clientes.forEach(cliente => {
                const option = document.createElement("option");
                option.value = cliente.nome; // Você pode usar um identificador único aqui, se preferir
                option.innerText = cliente.nome;
                clienteSelect.appendChild(option);
            });
        }

        // Função para carregar os produtos do localStorage
        function carregarProdutos() {
            const produtos = JSON.parse(localStorage.getItem("produtos")) || [];
            const produtoSelect = document.getElementById("produto");

            produtos.forEach(produto => {
                const option = document.createElement("option");
                option.value = produto.nomeProduto; // Nome correto do produto
                option.dataset.preco = produto.preco; // Preço do produto
                option.innerText = `${produto.nomeProduto} - R$ ${parseFloat(produto.preco).toFixed(2)}`; // Formatação do nome e preço
                produtoSelect.appendChild(option);
            });
        }

        // Função para adicionar uma nova venda
        function adicionarVenda() {
            const cliente = document.getElementById('cliente').value;
            const produtoSelect = document.getElementById('produto');
            const produtoNome = produtoSelect.value;
            const produtoPreco = parseFloat(produtoSelect.options[produtoSelect.selectedIndex].dataset.preco);
            const quantidade = parseInt(document.getElementById('quantidade').value);

            // Calcular o valor da venda
            const valor = quantidade * produtoPreco;
            total += valor;

            // Atualizar a tabela de vendas
            const tabelaBody = document.getElementById('vendaTabelaBody');
            const row = tabelaBody.insertRow();
            row.insertCell(0).innerText = produtoNome;
            row.insertCell(1).innerText = quantidade;
            row.insertCell(2).innerText = `R$ ${valor.toFixed(2)}`;

            // Atualizar o valor total
            document.getElementById('valorTotal').innerText = total.toFixed(2);

            // Armazenar a venda
            vendas.push({ cliente, produto: produtoNome, quantidade, valor });
        }

        // Função para apagar a última venda adicionada
        function apagarUltimo() {
            if (vendas.length > 0) {
                const ultimaVenda = vendas.pop();
                const tabelaBody = document.getElementById('vendaTabelaBody');
                tabelaBody.deleteRow(tabelaBody.rows.length - 1);
                total -= ultimaVenda.valor; // Subtrair o valor da venda apagada
                document.getElementById('valorTotal').innerText = total.toFixed(2);
            }
        }

        // Função para enviar o relatório
        function enviarRelatorio() {
            if (vendas.length === 0) {
                alert("Nenhuma venda registrada para enviar.");
                return;
            }

            // Salvar as vendas no localStorage
            const vendasAnteriores = JSON.parse(localStorage.getItem("vendas")) || [];
            vendasAnteriores.push(...vendas);
            localStorage.setItem("vendas", JSON.stringify(vendasAnteriores));

            // Limpar os dados da venda atual
            vendas = [];
            total = 0;
            document.getElementById('valorTotal').innerText = total.toFixed(2);
            document.getElementById('vendaTabelaBody').innerHTML = '';

            // Mostrar mensagem de sucesso
            const mensagemSucesso = document.getElementById("mensagemSucesso");
            mensagemSucesso.style.display = "block";

            // Redirecionar para a página de relatórios após 2 segundos
            setTimeout(() => {
                window.location.href = "vendas.html"; // Atualize o nome do arquivo conforme necessário
            }, 2000);
        }

        // Carregar clientes e produtos ao carregar a página
        window.onload = function () {
            carregarClientes();
            carregarProdutos();
        }
    </script>
</body>

</html>
