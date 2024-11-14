 // Função para salvar o produto no LocalStorage
 function salvarProduto(event) {
    event.preventDefault();

    const categoria = document.getElementById("categoria").value;
    const dataPlantio = document.getElementById("data_plantio").value;
    const nomeProduto = document.getElementById("nome_produto").value;
    const quantidadeEstoque = document.getElementById("quantidade_estoque").value;
    const preco = document.getElementById("preco").value;
    const disponivel = document.getElementById("disponivel").value;

    const produto = {
        id: Date.now(),
        categoria: categoria,
        dataPlantio: dataPlantio,
        nomeProduto: nomeProduto,
        quantidadeEstoque: quantidadeEstoque,
        preco: preco,
        disponivel: disponivel
    };

    let produtos = JSON.parse(localStorage.getItem("produtos")) || [];
    produtos.push(produto);
    localStorage.setItem("produtos", JSON.stringify(produtos));

    document.getElementById("produtoForm").reset();
    alert("Produto cadastrado com sucesso!");
}