using System;
namespace Session01
{
    class Program
    {
        static int Somar(int x, int z = 0, int a = 0)
        {
            return x + z + a;
        }
        static void Main(string[] args)
        {
            System.Console.WriteLine(Somar(x: 2, a: 10, z: 34));
        }
    }
}