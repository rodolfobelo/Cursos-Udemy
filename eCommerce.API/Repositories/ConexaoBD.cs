using System.Data.SqlClient;

namespace eCommerce.API.Repositories
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
    }
}
