using Microsoft.AspNetCore.Mvc;

namespace MyApp.Namespace
{
    public class TesteController : Controller
    {
        // GET: TesteController
        public IActionResult Index()
        {
            return View();
        }
        public IActionResult Demo(){
            return View();
        }

    }
}
