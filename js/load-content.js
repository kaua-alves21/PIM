// load-content.js

document.addEventListener("DOMContentLoaded", function () {
    // Obtém o nome da página atual a partir da URL
    const path = window.location.pathname;
    const page = path.split("/").pop(); // Pega a última parte da URL

    // Define um mapeamento de cada página e o arquivo de conteúdo correspondente
    const contentMap = {
        "produtos.html": "content-produtos.html",
        "clientes.html": "content-clientes.html",
        "vendas.html": "content-vendas.html",
        "relatorios.html": "content-relatorios.html",
        "layout.html": "content-home.html",
        "relatorio_selecao.html" : "content-relatorios_selecao.html"
    };

    // Identifica o arquivo de conteúdo a ser carregado
    const contentFile = contentMap[page] || "content-home.html"; // Carrega 'content-home.html' como padrão

    // Carrega o conteúdo dinamicamente
    fetch(contentFile)
        .then(response => response.text())
        .then(data => {
            document.getElementById("content").innerHTML = data;
        })
        .catch(error => {
            console.error("Erro ao carregar o conteúdo:", error);
        });
});
