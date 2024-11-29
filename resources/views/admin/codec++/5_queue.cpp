#include <iostream>
#include <vector>
#include <stdexcept>
using namespace std;

template <typename T>
class Queue {
private:
    vector<T> elementos;

public:
    void enqueue(const T& valor) {
        elementos.push_back(valor);
    }
    void dequeue() {
        if (empty()) {
            throw out_of_range("No se puede desencolar de una cola vacía.");
        }
        elementos.erase(elementos.begin());
    }
    T& front() {
        if (empty()) {
            throw out_of_range("La cola está vacía.");
        }
        return elementos.front();
    }
    bool empty() const {
        return elementos.empty();
    }
    size_t size() const {
        return elementos.size();
    }
};
