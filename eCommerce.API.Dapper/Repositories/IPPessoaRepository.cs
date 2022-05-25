using eCommerce.API.Dapper.Models;

namespace eCommerce.API.Dapper.Repositories

{
    public interface IPPessoaRepository
    {
        public List<PPessoa> Get();
        public PPessoa Get(int Codigo);
        public void Insert(PPessoa pPessoa);
        public void Update(PPessoa pPessoa);
        public void Delete(int Codigo);
    }
}
