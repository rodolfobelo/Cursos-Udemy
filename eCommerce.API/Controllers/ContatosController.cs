using eCommerce.API.Models;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using eCommerce.API.Repositories;

namespace eCommerce.API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class ContatosController : ControllerBase
    {
        private IContatoRepository _repository;
        public ContatosController()
        {
            _repository = new ContatoRepository();
        }

        [HttpGet]
        public IActionResult GetContatos()
        {
            return Ok(_repository.Get());
        }
        [HttpGet("{id}")]
        public IActionResult GetContatos(int id)
        {
            var contato = Ok(_repository.GetContato(id));
            if (contato == null)
            {
                return NotFound();
            }
            return Ok(contato);
        }

        [HttpPost]
        public IActionResult InsertContato([FromBody] Contato contato)
        {
            try
            {
                _repository.InsertContato(contato);
                return Ok(contato);
            }catch (Exception ex)
            {
                return StatusCode(500, ex.Message);
            }
        }

        [HttpPut]
        public IActionResult UpdateContato(Contato contato)
        {
            try
            {
                _repository.UpdateContato(contato);
                return Ok(contato);
            }
            catch (Exception ex)
            {
                return StatusCode(500, ex.Message);
            }
        }

        [HttpDelete("{id}")]
        public IActionResult DeleteContato(int id)
        {
            try
            {
                _repository.DeleteContato(id);
                return Ok();
            }
            catch (Exception ex)
            {
                return StatusCode(500, ex.Message);
            }
        }
    }
}
