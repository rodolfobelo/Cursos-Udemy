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
        [HttpGet("{TIPO}")]
        public IActionResult Get(string tipo)
        {
            return Ok(_repository.Get(tipo));
        }

        [HttpGet("{RA, TIPO}")]
        public IActionResult Get(string ra, string tipo)
        {
            var identificacao = _repository.Get(ra, tipo);
            if (identificacao == null)
            {
                return NotFound();
            }
            return Ok(identificacao);
        }
    }
}
