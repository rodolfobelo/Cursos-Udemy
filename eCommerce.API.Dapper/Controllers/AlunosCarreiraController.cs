using eCommerce.API.Dapper.Repositories;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;

namespace eCommerce.API.Dapper.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class AlunosCarreiraController : ControllerBase
    {
        private IAlunoCarreiraRepository _repository;

        public AlunosCarreiraController()
        {
            _repository = new AlunoCarreiraRepository();
        }
        [HttpGet]
        public IActionResult Get()
        {
            return Ok(_repository.Get());
        }        
    }
}