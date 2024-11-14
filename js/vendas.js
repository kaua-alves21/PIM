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