using eCommerce.API.Dapper.Models;

namespace eCommerce.API.Dapper.Repositories
{
    public interface IUsuarioRepository
    {
        public List<Usuario> Get();
        public Usuario Get(int Id);
        public void Insert (Usuario usuario);
        public void Update (Usuario usuario);
        public void Delete (int Id);
    }
}
