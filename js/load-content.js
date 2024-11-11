// load-content.js

document.addEventListener("DOMContentLoaded", function () {
    // Obtém o nome da página atual a partir da URL
    const path = window.location.pathname;
    const page = path.split("/").pop(); // Pega a última parte da URL

    // Define um mapeamento de cada página e o arquivo de conteúdo correspondente
    const contentMap = {
        "produtos.php": "content-produtos.php",
        "clientes.php": "content-clientes.php",
        "vendas.php": "content-vendas.php",
        "relatorios.php": "content-relatorios.php",
        "layout.php": "content-home.php",
        "relatorio_selecao.php" : "content-relatorios_selecao.php"
    };

    // Identifica o arquivo de conteúdo a ser carregado
    const contentFile = contentMap[page] || "content-home.php"; // Carrega 'content-home.php' como padrão

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