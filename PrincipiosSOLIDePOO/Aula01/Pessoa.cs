namespace Aula01
{
    public class Pessoa
    {
        public Pessoa(string Nome, string SobreNome)
        {
            this.Nome = Nome;
            this.SobreNome = SobreNome;
        }
        public string Nome { get; set; }
        public string SobreNome { get; set; }

        public override string ToString()
        {
            return Nome + " " + SobreNome + "!";
        }
    }
}