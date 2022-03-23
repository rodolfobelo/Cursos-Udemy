namespace Session01
{
    public class SobreCarga
    {
        public SobreCarga()
        {
            System.Console.WriteLine("Nenhum valor informado");
        }
        public SobreCarga(double a, double b)
        {
            System.Console.WriteLine(a + b);
        }

        public double A { get; set; }
        public double B { get; set; }
    }
}