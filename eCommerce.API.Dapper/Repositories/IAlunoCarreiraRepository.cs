using eCommerce.API.Dapper.Models;
namespace eCommerce.API.Dapper.Repositories
{
    public interface IAlunoCarreiraRepository
    {
        public List<AlunoCarreira> Get();
        public AlunoCarreira Get(string Ra);
        public void Insert(AlunoCarreira AlunoCarreira);
        public void Update(AlunoCarreira AlunoCarreira);
        public void Delete(string Ra);
    }
}
