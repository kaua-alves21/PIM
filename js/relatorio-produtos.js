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