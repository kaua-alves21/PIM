<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Relatórios</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/relatorio-produtos.css">
 
    <script>
        let produtos = JSON.parse(localStorage.getItem("produtos")) || [];
        let produtoEditandoIndex = null;

        function carregarRelatorio() {
            const tabela = document.getElementById("relatorioProdutos").getElementsByTagName("tbody")[0];
            tabela.innerHTML = "";

            const dataInicio = document.getElementById("dataInicio").value;
            const dataFim = document.getElementById("dataFim").value;

            produtos.forEach((produto, index) => {
                const dataPlantio = new Date(produto.dataPlantio);

                if ((dataInicio === "" || new Date(dataInicio) <= dataPlantio) && 
                    (dataFim === "" || new Date(dataFim) >= dataPlantio)) {
                    
                    const row = tabela.insertRow();
                    row.insertCell(0).innerText = produto.categoria;
                    row.insertCell(1).innerText = produto.nomeProduto;
                    row.insertCell(2).innerText = produto.dataPlantio;
                    row.insertCell(3).innerText = produto.quantidadeEstoque;
                    row.insertCell(4).innerText = `R$ ${produto.preco}`;
                    row.insertCell(5).innerText = produto.disponivel === 'sim' ? 'Sim' : 'Não';

                    // Botão de ações
                    const acoesCell = row.insertCell(6);
                    const editarButton = document.createElement("button");
                    editarButton.innerText = "Editar";
                    editarButton.className = "editar-button";
                    editarButton.onclick = () => abrirFormularioEdicao(index);

                    const excluirButton = document.createElement("button");
                    excluirButton.innerText = "Excluir";
                    excluirButton.className = "excluir-button";
                    excluirButton.onclick = () => excluirProduto(index);

                    // Adicionando ambos os botões na mesma célula
                    acoesCell.appendChild(editarButton);
                    acoesCell.appendChild(excluirButton);
                }
            });
        }

        function abrirFormularioEdicao(index) {
            produtoEditandoIndex = index;
            const produto = produtos[index];
            document.getElementById("categoria").value = produto.categoria;
            document.getElementById("nomeProduto").value = produto.nomeProduto;
            document.getElementById("dataPlantio").value = produto.dataPlantio;
            document.getElementById("quantidadeEstoque").value = produto.quantidadeEstoque;
            document.getElementById("preco").value = produto.preco;
            document.getElementById("disponivel").value = produto.disponivel;

            document.getElementById("form-edicao").style.display = "block";
        }

        function salvarEdicao() {
            const categoria = document.getElementById("categoria").value;
            const nomeProduto = document.getElementById("nomeProduto").value;
            const dataPlantio = document.getElementById("dataPlantio").value;
            const quantidadeEstoque = document.getElementById("quantidadeEstoque").value;
            const preco = document.getElementById("preco").value;
            const disponivel = document.getElementById("disponivel").value;

            produtos[produtoEditandoIndex] = {
                categoria,
                nomeProduto,
                dataPlantio,
                quantidadeEstoque,
                preco,
                disponivel,
            };

            localStorage.setItem("produtos", JSON.stringify(produtos));
            carregarRelatorio();
            document.getElementById("form-edicao").style.display = "none";
        }

        function cancelarEdicao() {
            document.getElementById("form-edicao").style.display = "none";
        }

        function excluirProduto(index) {
            if (confirm("Tem certeza que deseja excluir este produto?")) {
                produtos.splice(index, 1);
                localStorage.setItem("produtos", JSON.stringify(produtos));
                carregarRelatorio();
            }
        }

        window.onload = carregarRelatorio;
    </script>
</head>

<body>

    <header>
        <h1>Startup Segurança Alimentar</h1>
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

    <h2>Relatório de Produtos</h2>
    <table border="1" id="relatorioProdutos">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Nome do Produto</th>
                <th>Data de Plantio</th>
                <th>Quantidade em Estoque</th>
                <th>Preço</th>
                <th>Disponível</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- Produtos serão carregados aqui -->
        </tbody>
    </table>

    <div id="form-edicao">
        <h3>Editar Produto</h3>
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" required>
        <label for="nomeProduto">Nome do Produto:</label>
        <input type="text" id="nomeProduto" required>
        <label for="dataPlantio">Data de Plantio:</label>
        <input type="date" id="dataPlantio" required>
        <label for="quantidadeEstoque">Quantidade em Estoque:</label>
        <input type="number" id="quantidadeEstoque" required>
        <label for="preco">Preço:</label>
        <input type="number" id="preco" required>
        <label for="disponivel">Disponível:</label>
        <select id="disponivel" required>
            <option value="sim">Sim</option>
            <option value="nao">Não</option>
        </select>
        <button onclick="salvarEdicao()">Salvar</button>
        <button onclick="cancelarEdicao()">Cancelar</button>
    </div>
</body>

</html>
