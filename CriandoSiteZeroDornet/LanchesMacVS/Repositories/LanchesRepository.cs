using LanchesMacVS.Context;
using LanchesMacVS.Models;
using LanchesMacVS.Repositories.Interfaces;
using Microsoft.EntityFrameworkCore;

namespace LanchesMacVS.Repositories
{
    public class LanchesRepository : ILanchesRepository
    {
        private readonly AppDbContext _appDbContext;
        public LanchesRepository(AppDbContext appDbContext)
        {
            _appDbContext = appDbContext;
        }
        public IEnumerable<Lanche> Lanches => _appDbContext.Lanches.Include(c => c.Categoria);

        public IEnumerable<Lanche> LanchesPreferidos => _appDbContext.Lanches.Where(p => p.IsLanchePreferido).Include(c => c.Categoria);

        public Lanche GetLancheById(int lancheId)
        {
            return _appDbContext.Lanches.FirstOrDefault(p => p.Id == lancheId);
        }
    }
}
