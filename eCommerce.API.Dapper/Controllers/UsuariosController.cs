using eCommerce.API.Dapper.Models;
using eCommerce.API.Dapper.Repositories;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;

namespace eCommerce.API.Dapper.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class UsuariosController : ControllerBase
    {
        private IUsuarioRepository _repository;
        public UsuariosController()
        {
            _repository = new UsuarioRepository();
        }
        [HttpGet]
        public IActionResult Get()
        {
            return Ok(_repository.Get());
        }
        [HttpGet("{id}")]
        public IActionResult Get(int id)
        {
            var usuario = _repository.Get(id);
            if (usuario == null)
            {
                return NotFound();
            }
            return Ok(usuario);

        }
        [HttpPost]
        public IActionResult Insert([FromBody] Usuario usuario)
        {
            
            //try
            //{
                _repository.Insert(usuario);
                return Ok(usuario);
            //}catch (Exception ex)
            //{
            //    return StatusCode(500, ex.Message);
            //}
        }
        [HttpPut]
        public IActionResult Update([FromBody] Usuario usuario)
        {
            try
            {
                _repository.Update(usuario);
                return Ok(usuario);
            }
            catch (Exception ex)
            {
                return StatusCode(500, ex.Message);
            }
        }
        [HttpDelete("{id}")]
        public IActionResult Delete(int Id)
        {
            _repository.Delete(Id);
            return Ok();
        }
    }
}
