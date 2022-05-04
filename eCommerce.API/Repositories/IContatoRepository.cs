using eCommerce.API.Models;

namespace eCommerce.API.Repositories

{
    public interface IContatoRepository
    {
        public List<Contato> Get();
        public Contato GetContato(int id);
        public void InsertContato(Contato contato);
        public void UpdateContato(Contato contato);
        public void DeleteContato(int id);

    }
}
