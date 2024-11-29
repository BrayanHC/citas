#include <iostream>
#include <vector>
using namespace std;

template <typename T>
class Set {
private:
    vector<T> elementos;

public:
    void insertar(const T& valor) {
        if (!contiene(valor)) {
            elementos.push_back(valor);
        }
    }
    void eliminar(const T& valor) {
        for (auto it = elementos.begin(); it != elementos.end(); ++it) {
            if (*it == valor) {
                elementos.erase(it);
                return;
            }
        }
    }
    bool contiene(const T& valor) const {
        for (const auto& elemento : elementos) {
            if (elemento == valor) {
                return true;
            }
        }
        return false;
    }
    size_t tamano() const {
        return elementos.size();
    }
    void vaciar() {
        elementos.clear();
    }
};
