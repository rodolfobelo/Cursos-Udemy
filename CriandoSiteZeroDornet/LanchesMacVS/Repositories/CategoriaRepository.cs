using LanchesMacVS.Context;
using LanchesMacVS.Models;
using LanchesMacVS.Repositories.Interfaces;

namespace LanchesMacVS.Repositories
{
    public class CategoriaRepository : ICategoriasRepository
    {
        private readonly AppDbContext _appDbContext;
        public CategoriaRepository(AppDbContext appDbContext)
        {
            _appDbContext = appDbContext;
        }
        public IEnumerable<Categoria> Categorias => _appDbContext.Categorias;
    }
}
