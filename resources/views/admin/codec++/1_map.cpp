#include <iostream>
#include <vector>
#include <stdexcept>
using namespace std;

template <typename Key, typename Value>
class Map {
private:
    vector<pair<Key, Value>> elementos;

public:
    void insertar(const Key& clave, const Value& valor) {
        for (auto& elemento : elementos) {
            if (elemento.first == clave) { 
                elemento.second = valor;
                return;
            }
        }
        elementos.push_back(make_pair(clave, valor));
    }
    Value obtener(const Key& clave) const {
        for (const auto& elemento : elementos) {
            if (elemento.first == clave) {
                return elemento.second;
            }
        }
        throw out_of_range("La clave no se encontró en el mapa.");
    }
    void eliminar(const Key& clave) {
        for (auto it = elementos.begin(); it != elementos.end(); ++it) {
            if (it->first == clave) {
                elementos.erase(it);
                return;
            }
        }
    }
    bool contiene(const Key& clave) const {
        for (const auto& elemento : elementos) {
            if (elemento.first == clave) {
                return true;
            }
        }
        return false;
    }
    size_t tamano() const {
        return elementos.size();
    }
};
