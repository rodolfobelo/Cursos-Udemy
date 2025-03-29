using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace LanchesMacVS.Migrations
{
    /// <inheritdoc />
    public partial class PopularCategorias : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.Sql("INSERT INTO Categorias (CategoriaNome, descricao) values ('Normais', 'Categoria de lanche feita com ingredientes normais.')");
            migrationBuilder.Sql("INSERT INTO Categorias (CategoriaNome, descricao) values ('Naturais', 'Categoria de lanche feita com ingredientes naturais.')");

        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.Sql("DELETE FROM Categorias");
        }
    }
}
