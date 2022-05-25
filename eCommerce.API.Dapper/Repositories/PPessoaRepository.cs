using eCommerce.API.Dapper.Models;
using System.Data;
using System.Data.SqlClient;
using Dapper;

namespace eCommerce.API.Dapper.Repositories
{
    public class PPessoaRepository : IPPessoaRepository
    {
        ConexaoBD conexaoBD = new ConexaoBD();
        private IDbConnection _connection;
        public PPessoaRepository()
        {
            _connection = new SqlConnection(conexaoBD.localEXEMPLO_12134());
        }
        public List<PPessoa> Get()
        {
            return _connection.Query<PPessoa>("select top 10 CODIGO, NOME, CPF from ppessoa").ToList();
        }

        public PPessoa Get(int Codigo)
        {
            return null;
        }

        public void Insert(PPessoa pPessoa)
        {
            throw new NotImplementedException();
        }

        public void Update(PPessoa pPessoa)
        {
            throw new NotImplementedException();
        }
        public void Delete(int Codigo)
        {
            throw new NotImplementedException();
        }
    }
}
