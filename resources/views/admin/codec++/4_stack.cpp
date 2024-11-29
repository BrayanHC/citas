#include <iostream>
#include <vector>
#include <stdexcept>
using namespace std;

template <typename T>
class Stack {
private:
    vector<T> elementos; 

public:
    void push(const T& valor) {
        elementos.push_back(valor);
    }
    void pop() {
        if (empty()) {
            throw out_of_range("No se puede desapilar de una pila vacía.");
        }
        elementos.pop_back();
    }
    T& top() {
        if (empty()) {
            throw out_of_range("La pila está vacía.");
        }
        return elementos.back();
    }
    bool empty() const {
        return elementos.empty();
    }
    size_t size() const {
        return elementos.size();
    }
};
