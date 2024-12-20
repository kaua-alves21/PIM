<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Relatório de Vendas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/relatorio-vendas.css">
</head>

<body>

    <header>
        <h1>CIFU - Controle Inteligente de Fazendo Urbana</h1>
        <p>&nbsp;</p>
    </header>

    <nav>
        <a href="login.php" class="login-button">
            <img id="imagem" src="../img/login icone.png" alt="Ícone de Login"> <!-- Ícone de Login -->
        </a>
        <a href="layout.php">Início</a>
        <a href="produtos.php">Cadastro de Produtos</a>
        <a href="clientes.php">Cadastro de Clientes</a>
        <a href="vendas.php">Vendas</a>
        <a href="relatorios_selecao.php">Relatórios</a>    
        <a href="sobre.php">Sobre</a>
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
        <p>&copy; 2024 CIFU - Controle Inteligente de Fazendo Urbana. Todos os direitos reservados.</p>
    </footer>

    <script>
        function carregarRelatorio() {
            const vendas = JSON.parse(localStorage.getItem('vendas')) || [];
            const totalPorCliente = {};
            let totalGeral = 0;

            // Pega as datas de início e fim dos inputs e converte para datas no formato ISO
            const dataInicio = document.getElementById('dataInicio').value ? new Date(document.getElementById('dataInicio').value + 'T00:00:00') : null;
            const dataFim = document.getElementById('dataFim').value ? new Date(document.getElementById('dataFim').value + 'T23:59:59') : null;

            vendas.forEach((venda, index) => {
                const { cliente, produto, quantidade, valor, dataVenda } = venda;
                const dataVendaConvertida = new Date(dataVenda);

                // Verifica se a venda está dentro do intervalo de datas selecionado
                if ((!dataInicio || dataVendaConvertida >= dataInicio) &&
                    (!dataFim || dataVendaConvertida <= dataFim)) {
                    
                    if (!totalPorCliente[cliente]) {
                        totalPorCliente[cliente] = { total: 0, produtos: [] };
                    }
                    totalPorCliente[cliente].total += valor;
                    totalPorCliente[cliente].produtos.push({ produto, quantidade, valor, index });
                }
            });

            const tabela = document.getElementById('relatorioTabelaBody');
            tabela.innerHTML = '';

            for (const cliente in totalPorCliente) {
                const vendasCliente = totalPorCliente[cliente];
                vendasCliente.produtos.forEach(item => {
                    const novaLinha = document.createElement('tr');
                    novaLinha.innerHTML = `<td>${cliente}</td><td>${item.produto}</td><td>${item.quantidade}</td><td>R$ ${item.valor.toFixed(2)}</td><td><button class="delete-button" onclick="excluirVenda(${item.index})">Excluir</button></td>`;
                    tabela.appendChild(novaLinha);
                });

                const linhaTotal = document.createElement('tr');
                linhaTotal.innerHTML = `<td><strong>Total de ${cliente}</strong></td><td></td><td></td><td><strong>R$ ${vendasCliente.total.toFixed(2)}</strong></td><td></td>`;
                tabela.appendChild(linhaTotal);

                totalGeral += vendasCliente.total;
            }

            document.getElementById('valorTotal').innerText = totalGeral.toFixed(2);
        }

        function excluirVenda(index) {
            const vendas = JSON.parse(localStorage.getItem('vendas')) || [];
            vendas.splice(index, 1); // Remove a venda pelo índice
            localStorage.setItem('vendas', JSON.stringify(vendas)); // Atualiza o localStorage
            carregarRelatorio(); // Recarrega o relatório atualizado
        }

        window.onload = carregarRelatorio;
    </script>

</body>

</html>
