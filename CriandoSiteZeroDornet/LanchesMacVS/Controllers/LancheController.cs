using LanchesMacVS.Repositories.Interfaces;
using LanchesMacVS.ViewModels;
using Microsoft.AspNetCore.Mvc;

namespace LanchesMacVS.Controllers
{
    public class LancheController : Controller
    {
        private readonly ILanchesRepository _lanchesRepository;

        public LancheController(ILanchesRepository lanchesRepository)
        {
            _lanchesRepository = lanchesRepository;
        }

        public IActionResult List()
        {
            var lancheListViewModel = new LancheListViewModel();
            var lanches = _lanchesRepository.Lanches;

            lancheListViewModel.Lanches = lanches;
            lancheListViewModel.CategoriaAtual = "Categoria Atual";

            return View(lanches);
        }
    }
}
