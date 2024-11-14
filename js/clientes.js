 // Função para adicionar cliente ao localStorage
 function adicionarCliente() {
    const nomeCliente = document.getElementById('nomeCliente').value.trim();
    const enderecoCliente = document.getElementById('enderecoCliente').value.trim();
    const telefoneCliente = document.getElementById('telefoneCliente').value.trim();
    const idadeCliente = document.getElementById('idadeCliente').value;
    const emailCliente = document.getElementById('emailCliente').value.trim();

    if (nomeCliente === "" || enderecoCliente === "" || telefoneCliente === "" || idadeCliente === "" || emailCliente === "") {
        alert('Por favor, preencha todos os campos.');
        return;
    }

    let clientes = JSON.parse(localStorage.getItem('clientes')) || [];

    const novoCliente = {
        nome: nomeCliente,
        endereco: enderecoCliente,
        telefone: telefoneCliente,
        idade: idadeCliente,
        email: emailCliente
    };

    clientes.push(novoCliente);
    localStorage.setItem('clientes', JSON.stringify(clientes));

    document.getElementById('mensagem').innerText = 'Cliente cadastrado com sucesso!';
    cancelarCadastro();
}

// Função para cancelar o cadastro
function cancelarCadastro() {
    document.getElementById('nomeCliente').value = '';
    document.getElementById('enderecoCliente').value = '';
    document.getElementById('telefoneCliente').value = '';
    document.getElementById('idadeCliente').value = '';
    document.getElementById('emailCliente').value = '';
    document.getElementById('mensagem').innerText = '';
}