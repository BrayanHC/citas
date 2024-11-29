#include <iostream>
#include <vector>
#include <string>
#include <unordered_map>
#include <deque>
#include <cstdint>

using namespace std;

int main()
{

    struct Operador
    {
        uint8_t precedencia = 0;
        uint8_t argumentos = 0;
    };

    unordered_map<char, Operador> mapaOperadores;
    mapaOperadores['/'] = {4, 2};
    mapaOperadores['*'] = {3, 2};
    mapaOperadores['+'] = {2, 2};
    mapaOperadores['-'] = {1, 2};

    string expresion = "-((1+2)/((6*-7)+(7*-4)/2)-3)";

    struct Simbolo
    {
        string simbolo = "";

        enum class Tipo : uint8_t
        {
            Desconocido,
            Literal_Numerico,
            Operador,
            Parentesis_Abrir,
            Parentesis_Cerrar
        } tipo = Tipo::Desconocido;

        Operador op;
    };

    deque<Simbolo> pilaTemporal;
    deque<Simbolo> pilaSalida;

    Simbolo simboloAnterior = {"0", Simbolo::Tipo::Literal_Numerico, 0, 0};
    int paso = 0;

    for (const char c : expresion)
    {
        if (isdigit(c))
        {
            pilaSalida.push_back({string(1, c), Simbolo::Tipo::Literal_Numerico});
            simboloAnterior = pilaSalida.back();
        }
        else if (c == '(')
        {
            pilaTemporal.push_front({string(1, c), Simbolo::Tipo::Parentesis_Abrir});
            simboloAnterior = pilaTemporal.front();
        }
        else if (c == ')')
        {
            while (!pilaTemporal.empty() && pilaTemporal.front().tipo != Simbolo::Tipo::Parentesis_Abrir)
            {
                pilaSalida.push_back(pilaTemporal.front());
                pilaTemporal.pop_front();
            }

            if (pilaTemporal.empty())
            {
                cout << "!!!! ERROR! Paréntesis inesperado '" << string(1, c) << "'\n";
                return 0;
            }

            if (!pilaTemporal.empty() && pilaTemporal.front().tipo == Simbolo::Tipo::Parentesis_Abrir)
            {
                pilaTemporal.pop_front();
            }

            simboloAnterior = {string(1, c), Simbolo::Tipo::Parentesis_Cerrar};
        }
        else if (mapaOperadores.find(c) != mapaOperadores.end())
        {
            Operador nuevoOperador = mapaOperadores[c];

            if (c == '-' || c == '+')
            {
                if ((simboloAnterior.tipo != Simbolo::Tipo::Literal_Numerico &&
                     simboloAnterior.tipo != Simbolo::Tipo::Parentesis_Cerrar) ||
                    paso == 0)
                {
                    nuevoOperador.argumentos = 1;
                    nuevoOperador.precedencia = 100;
                }
            }

            while (!pilaTemporal.empty() && pilaTemporal.front().tipo != Simbolo::Tipo::Parentesis_Abrir)
            {
                if (pilaTemporal.front().tipo == Simbolo::Tipo::Operador)
                {
                    const auto& operadorEnPila = pilaTemporal.front().op;

                    if (operadorEnPila.precedencia >= nuevoOperador.precedencia)
                    {
                        pilaSalida.push_back(pilaTemporal.front());
                        pilaTemporal.pop_front();
                    }
                    else
                        break;
                }
            }

            pilaTemporal.push_front({string(1, c), Simbolo::Tipo::Operador, nuevoOperador});
            simboloAnterior = pilaTemporal.front();
        }
        else
        {
            cout << "Símbolo no válido: '" << string(1, c) << "'\n";
            return 0;
        }

        paso++;
    }

    while (!pilaTemporal.empty())
    {
        pilaSalida.push_back(pilaTemporal.front());
        pilaTemporal.pop_front();
    }

    cout << "Expresión  := " << expresion << "\n";
    cout << "RPN        := ";
    for (const auto& s : pilaSalida)
    {
        cout << s.simbolo;
    }
    cout << "\n";

    deque<double> pilaResolucion;

    for (const auto& instruccion : pilaSalida)
    {
        switch (instruccion.tipo)
        {
        case Simbolo::Tipo::Literal_Numerico:
        {
            pilaResolucion.push_front(stod(instruccion.simbolo));
        }
        break;

        case Simbolo::Tipo::Operador:
        {
            vector<double> memoria(instruccion.op.argumentos);
            for (uint8_t a = 0; a < instruccion.op.argumentos; a++)
            {
                if (pilaResolucion.empty())
                {
                    cout << "!!! ERROR! Expresión inválida\n";
                }
                else
                {
                    memoria[a] = pilaResolucion[0];
                    pilaResolucion.pop_front();
                }
            }

            double resultado = 0.0;
            if (instruccion.op.argumentos == 2)
            {
                if (instruccion.simbolo[0] == '/') resultado = memoria[1] / memoria[0];
                if (instruccion.simbolo[0] == '*') resultado = memoria[1] * memoria[0];
                if (instruccion.simbolo[0] == '+') resultado = memoria[1] + memoria[0];
                if (instruccion.simbolo[0] == '-') resultado = memoria[1] - memoria[0];
            }

            if (instruccion.op.argumentos == 1)
            {
                if (instruccion.simbolo[0] == '+') resultado = +memoria[0];
                if (instruccion.simbolo[0] == '-') resultado = -memoria[0];
            }

            pilaResolucion.push_front(resultado);
        }
        break;
        }
    }

    cout << "Resultado := " << to_string(pilaResolucion[0]) << "\n";
    return 0;
}
