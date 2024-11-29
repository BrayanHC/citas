#include <iostream>
#include <stdexcept>
#include <string>
using namespace std;

template <typename T>
class Vector {
private:
    T* datos;
    size_t tam;
    size_t capacidad;

    void redimensionar(size_t nueva_capacidad) {
        T* nuevos_datos = new T[nueva_capacidad];
        for (size_t i = 0; i < tam; ++i) {
            nuevos_datos[i] = datos[i];
        }
        delete[] datos;
        datos = nuevos_datos;
        capacidad = nueva_capacidad;
    }

public:
    Vector() : tam(0), capacidad(1) {
        datos = new T[capacidad];
    }
    ~Vector() {
        delete[] datos;
    }
    void agregar(const T& valor) {
        if (tam == capacidad) {
            redimensionar(capacidad * 2);
        }
        datos[tam++] = valor;
    }
    void eliminarUltimo() {
        if (tam > 0) {
            --tam;
        }
    }
    size_t obtenerTam() const {
        return tam;
    }
    size_t obtenerCapacidad() const {
        return capacidad;
    }
    T& operator[](size_t indice) {
        if (indice >= tam) {
            throw out_of_range("Índice fuera de rango");
        }
        return datos[indice];
    }
    void limpiar() {
        tam = 0;
    }
};

int main() {
    Vector<int> vec;

    vec.agregar(10);
    vec.agregar(20);
    vec.agregar(30);

    cout << "Elementos en el vector: ";
    for (size_t i = 0; i < vec.obtenerTam(); ++i) {
        cout << vec[i] << " ";
    }
    cout << endl;

    vec.eliminarUltimo();
    cout << "Despues de eliminar el ultimo, tamano: " << vec.obtenerTam() << endl;

    vec.limpiar();
    cout << "Despues de limpiar tamano: " << vec.obtenerTam() << endl;

    return 0;
}

void created(){
    int number =1;
    bool intento =true;
    string cadena = "ambiguo";
    
}
