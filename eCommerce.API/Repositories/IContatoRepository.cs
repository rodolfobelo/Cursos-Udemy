using eCommerce.API.Models;

namespace eCommerce.API.Repositories

{
    public interface IContatoRepository
    {
        public List<Contato> Get();
        public Usuario GetContato(int id);
        public void InsertContato(Usuario usuario);
        public void UpdateContato(Usuario usuario);
        public void DeleteContato(int id);

    }
}
