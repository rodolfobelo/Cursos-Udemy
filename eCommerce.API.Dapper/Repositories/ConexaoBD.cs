namespace eCommerce.API.Dapper.Repositories
{
    public class ConexaoBD
    {
        public ConexaoBD()
        {

        }
        public string localeCommerce()
        {
            string c = @"Server=localhost;Database=eCommerce;User Id=sa;Password=!Q2w3e$R;";
            return c;
        }
        public string localEXEMPLO_12134()
        {
            string c = @"Server=localhost;Database=EXEMPLO_12134;User Id=sa;Password=!Q2w3e$R;";
            return c;
        }
    }
}
