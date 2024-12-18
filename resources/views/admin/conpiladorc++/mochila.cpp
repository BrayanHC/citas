#include <cstdlib>
#include <iostream>
using namespace std;
struct objeto
{
    double peso;
    double valor;
    double valorPeso;
    bool tomado;
};
objeto objetos[5];
double solucion[] = {0, 0, 0, 0, 0};
int SeleccionVoraz()
{
    // estrategia del mayor valor/peso
    double mayor = -1;
    int indice = -1, j = 0;

    for (int j = 0; j < 5; j++)
    {
        if (!objetos[j].tomado && (mayor < objetos[j].valorPeso))
        {
            mayor = objetos[j].valorPeso;
            indice = j;
        };
    };

    return indice;
};
double valorTotal()
{
    double valor = 0;

    for (int i = 0; i < 5; i++)
        valor = valor + objetos[i].valor * solucion[i];

    return valor;
};

int main(int argc, char *argv[])
{
    double PesoMax, suma = 0;
    int i;

    for (i = 0; i < 5; i++)
    {
        cout << "Peso del objeto " << i << " ? = \n";
        cin >> objetos[i].peso;
        cout << "Valor del objeto " << i << " ? = \n";
        cin >> objetos[i].valor;
        objetos[i].valorPeso = objetos[i].valor / objetos[i].peso;
        objetos[i].tomado = false;
    };

    cout << "¿Peso maximo de la mochila?";
    cin >> PesoMax;

    while (suma < PesoMax)
    {
        i = SeleccionVoraz();

        if ((suma + objetos[i].peso) < PesoMax)
        {
            solucion[i] = 1;
            suma = suma + objetos[i].peso;
            objetos[i].tomado = true;
        }
        else
        {
            solucion[i] = (PesoMax - suma) / objetos[i].peso;
            suma = PesoMax; // corregir error al multiplicar por fracción
        };
    };

    cout << " el valor maximo obtenido es: " << valorTotal() << endl;
    cout << " y el vector solucion es: \n";
    for (i = 0; i < 5; i++)
        cout << " " << solucion[i] << ", ";

    system("PAUSE");
    return EXIT_SUCCESS;
}