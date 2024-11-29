#include <iostream>

using namespace std;

struct mochila{
    float valor;
    float peso;
    float indice;
};

int main(){
    int n, i, max, j, cont;
    float wmax, valmax = 0;
    cout << "Ingrese el # de elementos en la mochila: ";
    cin >> n;
    mochila elemento[n], aux;
    cout << "\n Ingresar elemento en la mochila : \n";

    for (i = 0; i < n; i++){
        cout << "Valor " << i + 1 << " : ";
        cin >> elemento[i].valor;
        cout << "Peso " << i + 1 << " : ";
        cin >> elemento[i].peso;
        elemento[i].indice = elemento[i].valor / elemento[i].peso;
    }
    for (i = 0; i < n; i++){
        max = i;
        for (j = i + 1; j < n; j++){
            if (elemento[j].indice > elemento[max].indice){
                max = j;
            }
        }
        aux = elemento[i];
        elemento[i] = elemento[max];
        elemento[max] = aux;
    }
    cout << endl;
    cout << "Peso maximo de la mochila: \n";
    cin >> wmax;

    i = 0;

    while (wmax > 0){
        if (wmax > elemento[i].peso){
            wmax = wmax - elemento[i].peso;
            valmax = valmax + elemento[i].valor;
        }
        else{
            valmax = valmax + (elemento[i].valor * (wmax / elemento[i].peso));
            wmax = 0;
        }
        i++;
    }

    cout << "\n El valor maximo de la mochila es :" << valmax;

    return 0;
}