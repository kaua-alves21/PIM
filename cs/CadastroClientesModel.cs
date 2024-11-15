using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

namespace SeuProjeto.Pages
{
    public class CadastroClientesModel : PageModel
    {
        [BindProperty]
        public Cliente Cliente { get; set; }
        public string Mensagem { get; set; }

        public void OnPost()
        {
            if (ModelState.IsValid)
            {
                // Lógica para salvar no banco de dados ou processar dados
                Mensagem = "Cliente cadastrado com sucesso!";
            }
            else
            {
                Mensagem = "Erro ao cadastrar cliente. Verifique os dados.";
            }
        }
    }

    public class Cliente
    {
        public string Nome { get; set; }
        public string Endereco { get; set; }
        public string Telefone { get; set; }
        public int Idade { get; set; }
        public string Email { get; set; }
    }
}
