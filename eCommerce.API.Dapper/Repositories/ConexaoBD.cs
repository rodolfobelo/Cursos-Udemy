namespace eCommerce.API.Dapper.Repositories
{
    public class ConexaoBD
    {        
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

        public string unifametroConectionHomol()
        {
            string c = @"Server=10.5.15.79;Database=RM_05_01_22;User Id=rm;Password=1q2w3e4r5t;";
            return c;
        }
    }
}