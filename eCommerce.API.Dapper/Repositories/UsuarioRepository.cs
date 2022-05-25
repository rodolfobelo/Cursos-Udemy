using eCommerce.API.Dapper.Models;
using System.Data;
using System.Data.SqlClient;
using Dapper;

namespace eCommerce.API.Dapper.Repositories
{
    public class UsuarioRepository : IUsuarioRepository
    {
        ConexaoBD conexaoBD = new ConexaoBD();
        private IDbConnection _connection;
        public UsuarioRepository()
        {
            _connection = new SqlConnection(conexaoBD.localeCommerce());
        }
        public List<Usuario> Get()
        {
            return _connection.Query<Usuario>("SELECT * FROM Usuarios").ToList();
        }

        public Usuario Get(int id)
        {
            return _connection.QuerySingleOrDefault<Usuario>("SELECT * FROM Usuarios WHERE id = @Id", new { Id = id });
        }

        public void Insert(Usuario usuario)
        {

        }

        public void Update(Usuario usuario)
        {

        }
        public void Delete(int Id)
        {

        }
    }
}
