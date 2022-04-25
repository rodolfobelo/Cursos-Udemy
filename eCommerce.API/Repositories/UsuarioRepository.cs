using eCommerce.API.Models;
using System.Data;
using System.Data.SqlClient;

namespace eCommerce.API.Repositories
{
    public class UsuarioRepository : IUsuarioRepository
    {

        private IDbConnection _connection;

        public UsuarioRepository()
        {
            //_connection = new SqlConnection(@"Data Source=(localdb)\MSSQLLocalDB;Initial Catalog=eCommerce;Integrated Security=True;Connect Timeout=30;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False");
            _connection = new SqlConnection(@"Server=localhost;Database=eCommerce;User Id=sa;Password=!Q2w3e$R;");
        }

        public List<Usuario> Get()
        {
            List<Usuario> usuarios = new List<Usuario>();
            try
            {
                SqlCommand command = new SqlCommand();
                command.CommandText = "SELECT * FROM Usuarios";
                command.Connection = (SqlConnection)_connection;

                _connection.Open();

                SqlDataReader dataReader = command.ExecuteReader();

                while (dataReader.Read())
                {
                    Usuario usuario = new Usuario();
                    usuario.Id = dataReader.GetInt32("Id");
                    usuario.Nome = dataReader.GetString("Nome");
                    usuario.Email = dataReader.GetString("Email");
                    usuario.Sexo = dataReader.GetString("Sexo");
                    usuario.RG = dataReader.GetString("RG");
                    usuario.CPF = dataReader.GetString("CPF");
                    usuario.NomeMae = dataReader.GetString("NomeMae");
                    usuario.SituacaoCadastro = dataReader.GetString("SituacaoCadastro");
                    usuario.DataCadastro = dataReader.GetDateTimeOffset(8);

                    usuarios.Add(usuario);
                }
            }
            finally
            {
                _connection.Close();
            }

            return usuarios;
        }
        public Usuario GetUsuario(int id)
        {
            try
            {
                SqlCommand command = new SqlCommand();
                command.CommandText = "select * from fn.PEGAR_USUARIO_ID (@Id)";
                command.Parameters.AddWithValue("@Id", id);
                command.Connection = (SqlConnection)_connection;

                _connection.Open();
                SqlDataReader dataReader = command.ExecuteReader();

                Dictionary<int, Usuario> usuarios = new Dictionary<int, Usuario>();

                while (dataReader.Read())
                {
                    Usuario usuario = new Usuario();
                    if (!(usuarios.ContainsKey(dataReader.GetInt32(0))))
                    {
                        usuario.Id = dataReader.GetInt32("Id");
                        usuario.Nome = dataReader.GetString("NomeUsuario");
                        usuario.Email = dataReader.GetString("Email");
                        usuario.Sexo = dataReader.GetString("Sexo");
                        usuario.RG = dataReader.GetString("RG");
                        usuario.CPF = dataReader.GetString("CPF");
                        usuario.NomeMae = dataReader.GetString("NomeMae");
                        usuario.SituacaoCadastro = dataReader.GetString("SituacaoCadastro");
                        usuario.DataCadastro = dataReader.GetDateTimeOffset(8);

                        usuarios.Add(usuario.Id, usuario);
                    }
                    else
                    {
                        usuario = usuarios[dataReader.GetInt32(0)];
                    }
                    /*Contato*/
                    Contato contato = new Contato();
                    contato.Id = dataReader.GetInt32(9);
                    contato.UsuarioId = usuario.Id;
                    contato.Telefone = dataReader.GetString("Telefone");
                    contato.Celular = dataReader.GetString("Celular");

                    usuario.Contatos = contato;                    

                    /*EnderecoEntrega*/
                    EnderecoEntrega enderecoEntrega = new EnderecoEntrega();
                    enderecoEntrega.Id = dataReader.GetInt32(13);
                    enderecoEntrega.UsuarioId = usuario.Id;
                    enderecoEntrega.NomeEndereco = dataReader.GetString("NomeEndereco");
                    enderecoEntrega.Cep = dataReader.GetString("Cep");
                    enderecoEntrega.Estado = dataReader.GetString("Estado");
                    enderecoEntrega.Cidade = dataReader.GetString("Cidade");
                    enderecoEntrega.Bairro = dataReader.GetString("Bairro");
                    enderecoEntrega.Endereco = dataReader.GetString("Endereco");
                    enderecoEntrega.Numero = dataReader.GetString("Numero");
                    enderecoEntrega.Complemento = dataReader.GetString("Complemento");

                    usuario.EnderecoEntregas = (usuario.EnderecoEntregas == null) ? new List<EnderecoEntrega>() : usuario.EnderecoEntregas;
                    if(usuario.EnderecoEntregas.FirstOrDefault(a => a.Id == enderecoEntrega.Id) == null)
                    {
                        usuario.EnderecoEntregas.Add(enderecoEntrega);
                    }                    
                    /*Departamento*/
                    Departamento departamento = new Departamento();
                    departamento.Id = dataReader.GetInt32(26);
                    departamento.Nome = dataReader.GetString("NomeDepartamento");


                    usuario.Departamentos = (usuario.Departamentos == null) ? new List<Departamento>() : usuario.Departamentos;
                    if(usuario.Departamentos.FirstOrDefault(a => a.Id == departamento.Id) == null)
                    {
                        usuario.Departamentos.Add(departamento);
                    }
                }
                return usuarios[usuarios.Keys.First()];
            }
            catch (Exception ex)
            {
                return null;
            }
            finally
            {
                _connection.Close();
            }

            return null;
        }
        public void InsertUsuario(Usuario usuario)
        {
            try
            {
                SqlCommand command = new SqlCommand();

                command.CommandText = @"EXECUTE [sp].[CadastrarUsuario] @Nome, @Email, @Sexo, @RG, @CPF, @NomeMae, @SituacaoCadastro " +
                                       "SELECT CAST(scope_identity() AS int)";

                command.Connection = (SqlConnection)_connection;

                command.Parameters.AddWithValue("@Nome", usuario.Nome);
                command.Parameters.AddWithValue("@Email", usuario.Email);
                command.Parameters.AddWithValue("@Sexo", usuario.Sexo);
                command.Parameters.AddWithValue("@RG", usuario.RG);
                command.Parameters.AddWithValue("@CPF", usuario.CPF);
                command.Parameters.AddWithValue("@NomeMae", usuario.NomeMae);
                command.Parameters.AddWithValue("@SituacaoCadastro", usuario.SituacaoCadastro);

                _connection.Open();
                usuario.Id = (int)command.ExecuteScalar();
                Console.WriteLine(usuario.Id);

                /*Contato*/
                command.CommandText = @"EXECUTE [sp].[CadastrarContato] @UsuarioId, @Telefone, @Celular " +
                    "SELECT CAST(scope_identity() AS int)";

                command.Parameters.AddWithValue("@UsuarioId", usuario.Id);
                command.Parameters.AddWithValue("@Telefone", usuario.Contatos.Telefone);
                command.Parameters.AddWithValue("@Celular", usuario.Contatos.Celular);

                usuario.Contatos.UsuarioId = usuario.Id;
     
                usuario.Contatos.Id = (int)command.ExecuteScalar();
                /*EnderecoEntrega*/
                foreach(var endereco in usuario.EnderecoEntregas)
                {
                    command = new SqlCommand();
                    command.Connection = (SqlConnection)_connection;
                    command.CommandText = @"EXECUTE [sp].[CadastroEnderecoEntrega] @UsuarioId, @NomeEndereco, @CEP, @Estado, @Cidade " +
                                           ",@Bairro  ,@Endereco  ,@Numero  ,@Complemento " +
                                           "SELECT CAST(scope_identity() AS int)";
                    command.Parameters.AddWithValue("@UsuarioID", usuario.Id);
                    command.Parameters.AddWithValue("@NomeEndereco", endereco.NomeEndereco);
                    command.Parameters.AddWithValue("@CEP", endereco.Cep);
                    command.Parameters.AddWithValue("@Estado", endereco.Estado);
                    command.Parameters.AddWithValue("@Cidade", endereco.Cidade);
                    command.Parameters.AddWithValue("@Bairro", endereco.Bairro);
                    command.Parameters.AddWithValue("@Endereco", endereco.Endereco);
                    command.Parameters.AddWithValue("@Numero", endereco.Numero);
                    command.Parameters.AddWithValue("@Complemento", endereco.Complemento);

                    endereco.Id = (int)command.ExecuteScalar();
                    endereco.UsuarioId = usuario.Id;
                    /*Departamento*/
                    foreach (var departamento in usuario.Departamentos)
                    {
                        command = new SqlCommand();
                        command.Connection = (SqlConnection)_connection;
                        //command.Transaction = transaction;

                        command.CommandText = "INSERT INTO UsuariosDepartamentos (UsuarioId, DepartamentoId) VALUES (@UsuarioId, @DepartamentoId);";
                        command.Parameters.AddWithValue("@UsuarioId", usuario.Id);
                        command.Parameters.AddWithValue("@DepartamentoId", departamento.Id);

                        command.ExecuteNonQuery();
                    }
                }
                
            }
            finally
            {
                _connection.Close();
            }
        }
        public void UpdateUsuario(Usuario usuario)
        {
            try
            {
                SqlCommand command = new SqlCommand();
                command.CommandText = @"UPDATE Usuarios SET Nome = @NOME, Email = @EMAIL, Sexo = @SEXO, RG = @RG,
                                        CPF = @CPF, NomeMae = @NOMEMAE, SituacaoCadastro = @SITUACAOCADASTRO,
                                        DataCadastro = @DATACADASTRO
                                        WHERE Usuarios.id = @id";
                command.Connection = (SqlConnection)_connection;

                command.Parameters.AddWithValue("@NOME", usuario.Nome);
                command.Parameters.AddWithValue("@Email", usuario.Email);
                command.Parameters.AddWithValue("@Sexo", usuario.Sexo);
                command.Parameters.AddWithValue("@RG", usuario.RG);
                command.Parameters.AddWithValue("@CPF", usuario.CPF);
                command.Parameters.AddWithValue("@NomeMae", usuario.NomeMae);
                command.Parameters.AddWithValue("@SituacaoCadastro", usuario.SituacaoCadastro);
                command.Parameters.AddWithValue("@DataCadastro", usuario.DataCadastro);

                command.Parameters.AddWithValue("@id", usuario.Id);

                _connection.Open();
                command.ExecuteNonQuery();
            }
            finally
            {
                _connection.Close();
            }
        }
        public void DeleteUsuario(int id)
        {
            try
            {
                SqlCommand command = new SqlCommand();
                command.CommandText = "DELETE FROM Usuarios WHERE Id = @Id";
                command.Parameters.AddWithValue("@Id", id);
                command.Connection = (SqlConnection)_connection;

                _connection.Open();
                command.ExecuteNonQuery();
            }
            finally
            {
                _connection.Close();
            }
        }
    }
}
