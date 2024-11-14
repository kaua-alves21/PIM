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