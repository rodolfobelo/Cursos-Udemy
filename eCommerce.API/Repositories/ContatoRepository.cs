using eCommerce.API.Models;
using System.Data;
using System.Data.SqlClient;

namespace eCommerce.API.Repositories
{
    public class ContatoRepository : IContatoRepository
    {
        private IDbConnection _connection;
        readonly string _connectionString = new ConexaoBD().localeCommerce();
        public ContatoRepository()
        {
            _connection = new SqlConnection(_connectionString);
        }
        public List<Contato> Get()
        {
            List<Contato> contatos = new List<Contato>();
            _connection.Open();
            try
            {
                SqlCommand command = new SqlCommand();
                command.Connection = (SqlConnection)_connection;
                command.CommandText = @"[sp].[SelecionarContatos]";
                command.CommandType = CommandType.StoredProcedure;

                SqlDataReader dataReader = command.ExecuteReader();

                while (dataReader.Read())
                {
                    Contato contato = new Contato();
                    contato.Id = dataReader.GetInt32("Id");
                    contato.UsuarioId = dataReader.GetInt32("UsuarioId");
                    contato.Telefone = dataReader.GetString("Telefone");
                    contato.Celular = dataReader.GetString("Celular");

                    contatos.Add(contato);
                }
                return contatos;
            }
            finally
            {
                _connection.Close();
            }
        }

        public Contato GetContato(int id)
        {
            Contato contato = new Contato();
            _connection.Open();
            try
            {
                SqlCommand command = new SqlCommand();
                command.Connection = (SqlConnection)_connection;
                command.CommandText = @"SELECT * FROM Contatos WHERE Id = @Id";
                command.Parameters.AddWithValue("@Id", contato.Id);

                SqlDataReader dataReader = command.ExecuteReader();

                contato.Id = contato.Id;
                contato.UsuarioId = dataReader.GetInt32("UsuarioId");
                contato.Telefone = dataReader.GetString("Telefone");
                contato.Celular = dataReader.GetString("Celular");

                return contato;
            }
            finally
            {
                _connection.Close();
            }
        }

        public void InsertContato(Contato contato)
        {
            _connection.Open();
            SqlTransaction transaction = (SqlTransaction)_connection.BeginTransaction();
            try
            {
                SqlCommand command = new SqlCommand();
                command.Transaction = transaction;
                command.Connection = (SqlConnection)_connection;

                command.CommandText = @"EXEC sp.CadastrarContato @UsuarioId, @Telefone, @Celular" + " SELECT CAST(scope_identity() AS int)";

                command.Parameters.AddWithValue("@UsuarioId", contato.UsuarioId);
                command.Parameters.AddWithValue("@Telefone", contato.Telefone);
                command.Parameters.AddWithValue("@Celular", contato.Celular);

                contato.Id = (int)command.ExecuteScalar();
                //command.ExecuteNonQuery();

                transaction.Commit();
            }
            catch (Exception ex)
            {
                try
                {
                    transaction.Rollback();
                }
                catch (Exception) { }
                throw new Exception("Erro ao tentar cadastrar contato!!");
            }
            finally
            {
                _connection.Close();
            }
        }

        public void UpdateContato(Contato contato)
        {
            throw new NotImplementedException();
        }
        public void DeleteContato(int id)
        {
            throw new NotImplementedException();
        }
    }
}
