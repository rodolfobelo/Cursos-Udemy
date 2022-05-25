using eCommerce.API.Dapper.Repositories;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;

namespace eCommerce.API.Dapper.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class PPessoaController : ControllerBase
    {
        private IPPessoaRepository _repository;
        public PPessoaController()
        {
            _repository = new PPessoaRepository();
        }
        [HttpGet]
        public IActionResult Get()
        {
            return Ok(_repository.Get());
        }
        //[HttpGet("{codigo}")]

        //[HttpPost]

        //[HttpPut]

        //[HttpDelete("{codigo}")]

    }
}
