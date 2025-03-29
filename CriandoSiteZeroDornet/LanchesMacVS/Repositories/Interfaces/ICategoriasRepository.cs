using LanchesMacVS.Models;

namespace LanchesMacVS.Repositories.Interfaces
{
    public interface ICategoriasRepository
    {
        IEnumerable<Categoria> Categorias { get; }
    }
}