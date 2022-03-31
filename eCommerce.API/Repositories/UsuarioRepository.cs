using eCommerce.API.Models;

namespace eCommerce.API.Repositories
{
    public class UsuarioRepository : IUsuarioRepository
    {
        private static List<Usuario> _db = new List<Usuario>()
        {
            new Usuario() { Id = 1, Nome="Filipe", Email="filipe@gmail.com"},
            new Usuario() { Id = 2, Nome = "Marcelo", Email = "marcelo@gmail.com"},
            new Usuario() { Id = 3, Nome = "Jessica", Email = "jessica@gmail.com"}
        };

        public List<Usuario> GetUsuarios()
        {
            return _db;
        }
        public Usuario GetUsuario(int id)
        {
            return _db.FirstOrDefault(a => a.Id == id);
        }
        public void InsertUsuario(Usuario usuario)
        {
            var ultimoUsuario = _db.LastOrDefault();
            if(ultimoUsuario == null)
            {
                usuario.Id = 1;
            }
            else
            {
                usuario.Id = ultimoUsuario.Id;
                usuario.Id++;
            }
            _db.Add(usuario);
        }
        public void UpdateUsuario(Usuario usuario)
        {
            _db.Remove(_db.FirstOrDefault(a => a.Id == usuario.Id));
            _db.Add(usuario);
        }
        public void DeleteUsuario(int id)
        {
            _db.Remove(_db.FirstOrDefault(a => a.Id == id));
        }
    }
}
