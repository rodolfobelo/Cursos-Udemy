using eCommerce.API.Dapper.Models;
using System.Data;
using System.Data.SqlClient;
using Dapper;

namespace eCommerce.API.Dapper.Repositories
{
    public class AlunoCarreiraRepository : IAlunoCarreiraRepository
    {
        ConexaoBD conexaoBD = new ConexaoBD();
        private IDbConnection _connection; //string de conexao

        public AlunoCarreiraRepository()
        {
            _connection = new SqlConnection(conexaoBD.unifametroConectionHomol());
        }

        public List<AlunoCarreira> Get()
        {
            //if (tipo == "Alunos")
            //{
            return _connection.Query<AlunoCarreira>("SELECT * FROM FN_DadosPortalValorizza_RA ('%')").ToList();
            //}
            //else
            //    return null;
        }

        public AlunoCarreira Get(string ra)
        {
            //return _connection.QuerySingleOrDefault<AlunoCarreira>("SELECT * FROM FN_DadosPortalValorizza_RA ('%')", new { Ra = ra });
            return _connection.QuerySingleOrDefault<AlunoCarreira>("SELECT * FROM SALUNO WHERE RA = @Ra", new { Ra = ra });
        }

        public void Insert(AlunoCarreira AlunoCarreira)
        {
            throw new NotImplementedException();
        }

        public void Update(AlunoCarreira AlunoCarreira)
        {
            throw new NotImplementedException();
        }

        public void Delete(string ESIAL_IDENTIFICACAO)
        {
            throw new NotImplementedException();
        }
    }
}