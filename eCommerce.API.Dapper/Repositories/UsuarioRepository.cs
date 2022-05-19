using eCommerce.API.Dapper.Models;

namespace eCommerce.API.Dapper.Repositories
{
    public class UsuarioRepository : IUsuarioRepository
    {
        public static List<Usuario> _db = new List<Usuario>
        {
            new Usuario() { Id = 1, Nome = "Filipe Rodrigues", Email = "felipe.rodrigues@gmail.com"}
        };
        public List<Usuario> Get()
        {
            return _db;
        }

        public Usuario Get(int Id)
        {
            return _db.FirstOrDefault(x => x.Id == Id);
        }

        public void Insert(Usuario usuario)
        {
            var lastUser = _db.LastOrDefault();
            if(lastUser == null)
            {
                usuario.Id = 1;
            }
            else
            {                
                usuario.Id = lastUser.Id;
                usuario.Id++;
                
            }
            _db.Add(usuario);
        }

        public void Update(Usuario usuario)
        {
            _db.Remove(_db.FirstOrDefault(x => x.Id == usuario.Id));
            _db.Add(usuario);
        }
        public void Delete(int Id)
        {
            _db.Remove(_db.FirstOrDefault(x => x.Id == Id));
        }
    }
}
