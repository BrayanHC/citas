#include <iostream>
#include <stack>
#include <string.h>
#include <stdlib.h>
#include <fstream>
#include <cctype>
#include <vector>l
#include <cmath>
#include <map>

using namespace std;

//----------------------------------------------------------
// DEFINICIONES
//----------------------------------------------------------
// PALABRAS RESERVADAS
#define INICIO 101
#define FIN 102

#define ENTERO 104

#define REAL 105

#define NUM_ENTERO 106
#define NUM_REAL 107
#define CALCULAR 108
#define IMPRIMIR 332

// SIMBOLOS
#define ABREPAR 204        //   (
#define CIERRAPAR 205      //   )
#define PUNTOYCOMA 206     //   ;
#define IGUAL 207          //   =
#define MAS 208            //   +
#define MENOS 209          //   -
#define MENORMENOR 214     //   <<
#define MAYORMAYOR 215     //   >>
#define IGUALIGUAL 216     //   ==
#define MENORIGUAL 217     //   <=
#define MAYORIGUAL 218     //   >=
#define DIFERENTE 219      //   !=
#define MULTIPLICACION 228 //   *
#define DIVISION 229       //   /
#define POTENCIA 230       //   ^
#define YY 220             //   &&
#define OO 221             //   ||
#define MENOR 223          //   <
#define MAYOR 224          //   >
#define MASMAS 225         //   ++
#define MENOSMENOS 226     //   --
#define MASIGUAL 227       //   +=
#define INGRESAR 330       //
#define MOSTRAR 331        //

// AUXILIARES
#define CADENA 304
#define FINAL 305
#define ERROR 306
#define VARIABLE 307
#define OK 308

//---------------------------------------------------------------
// Declaracion e inicializacion de variables globales
//---------------------------------------------------------------

int p = 0;
int entero;
float real;
char texto[100];
char cadena[300];
char c[50];

struct tabla
{
    int complex;
    char *aplex;
};

struct Variable
{
    string nombre;
    int tipo;    // ENTERO o REAL
    float valor; // Manejará enteros como float también
};

vector<Variable> tablaSimbolos;

tabla tsimb[] =
    {INICIO, "inicio",
     FIN, "fin",
     ENTERO, "entero",
     INGRESAR, "ingresar",
     CALCULAR, "calcular",
     IMPRIMIR, "imprimir",
     MOSTRAR, "mostrar",
     REAL, "real",
     ABREPAR, "(",
     CIERRAPAR, ")",
     PUNTOYCOMA, ";",
     IGUALIGUAL, "==",
     IGUAL, "=",
     MAS, "+",
     MENOS, "-",
     MULTIPLICACION , "*",
    DIVISION , "/",
    POTENCIA , "^",
     MENORMENOR, "<<",
     MAYORMAYOR, ">>",
     MENORIGUAL, "<=",
     MAYORIGUAL, ">=",
     DIFERENTE, "!=",
     YY, "&&",
     OO, "||",
     MENOR, "<",
     MAYOR, ">",
     MASMAS, "++",
     MENOSMENOS, "--",
     MASIGUAL, "+=",
     FINAL, "\0"};

//---------------------------------------------------------------
// Funcion para optener un token
//---------------------------------------------------------------

int GetToken()
{
    while (1)
    {
        if (cadena[p] == '"')
        {
            p++;
            int i = 0;
            while (cadena[p] != '"')
            {
                if (cadena[p] == '\0')
                {
                    return ERROR;
                }
                texto[i] = cadena[p];
                i++;
                p++;
            }
            texto[i] = '\0';
            p++;
            return CADENA;
        }
        if (isalpha(cadena[p]))
        {
            int i = 0;
            while (isalpha(cadena[p]) || isdigit(cadena[p]))
            {
                c[i] = cadena[p];
                i++;
                p++;
            }
            c[i] = '\0';
            for (i = 0; tsimb[i].complex != FINAL; i++)
            {
                if (strcmp(tsimb[i].aplex, c) == 0)
                    return tsimb[i].complex;
            }
            return VARIABLE;
        }
        if (isdigit(cadena[p]))
        {
            int i = 0;
            while (isdigit(cadena[p]))
            {
                c[i] = cadena[p];
                i++;
                p++;
            }
            if (cadena[p] == '.' && isdigit(cadena[p + 1]))
            {
                c[i] = cadena[p];
                i++;
                p++;
                while (isdigit(cadena[p]))
                {
                    c[i] = cadena[p];
                    i++;
                    p++;
                }
                real = atof(c);
                return NUM_REAL;
            }
            entero = atoi(c);
            return NUM_ENTERO;
        }
        char t = cadena[p]; //<=
        if (t == '=' || t == '<' || t == '>' || t == '!' || t == '&' || t == '|' || t == '+' || t == '-')
        {
            char tmpx[3];
            tmpx[0] = t;
            if (cadena[p + 1] == '=' || cadena[p + 1] == '<' || cadena[p + 1] == '>' || cadena[p + 1] == '&' || cadena[p + 1] == '|' || cadena[p + 1] == '+' || cadena[p + 1] == '-')
            {
                tmpx[1] = cadena[p + 1];
                tmpx[2] = '\0';
                p++;
                p++;
                strcpy(c, tmpx);
            }
            else
            {
                tmpx[1] = '\0';
                p++;
                strcpy(c, tmpx);
            }
            for (int i = 0; tsimb[i].complex != FINAL; i++)
            {
                if (strcmp(tmpx, tsimb[i].aplex) == 0)
                    return tsimb[i].complex;
            }
        }
        if (t == '*' || t == '/' || t == '^')
        {
            char tmpx[2] = {t, '\0'};
            strcpy(c, tmpx);
            p++;
            return (t == '*') ? MULTIPLICACION : 
            (t == '/') ? DIVISION : POTENCIA;
        }

        else
        {
            char tmpx[3];
            tmpx[0] = t;
            tmpx[1] = '\0';
            for (int i = 0; tsimb[i].complex != FINAL; i++)
            {
                if (strcmp(tmpx, tsimb[i].aplex) == 0)
                {
                    p++;
                    return tsimb[i].complex;
                }
            }
            c[0] = t;
            c[1] = '\0';
        }
        switch (cadena[p])
        {
        case ' ':
            p++;
            ;
            break;
        case '\t':
            p++;
            ;
            break;
        case '\n':
            p++;
            ;
            break;
        case '\0':
            return FINAL;
        default:
            p++;
            return ERROR;
        }
    }
}

int analisis_lexico()
{
    p = 0;
    int token;
    int flag = 1;
    while (1)
    {
        token = GetToken();
        if (token == FINAL)
        {
            return flag;
        }
        if (token == ERROR)
        {
            cout << "Error!!! token no reconocido " << " ' " << c << " ' " << "\n";
            flag = 0;
        }
        /*if(token==CADENA)
            cout<<texto<<endl;
        if(token==VARIABLE)
            cout<<c<<endl;
        if(token==NUM_ENTERO)
            cout<<entero<<endl;
        if(token==NUM_REAL)
            cout<<real<<endl;
        for(int i=0;tsimb[i].complex!=FINAL;i++)
        {
            if(tsimb[i].complex==token)
            {
                cout<<tsimb[i].aplex<<endl;
                break;
            }
        }*/
    }
}

map<char, int> precedencia = {
    {'+', 1}, {'-', 1}, {'*', 2}, {'/', 2}, {'^', 3} // Asociativo a la derecha
};

bool asociativo_izquierda(char op)
{
    return op != '^';
}

// Verifica si un carácter es un operador
bool es_operador(char c)
{
    return precedencia.find(c) != precedencia.end();
}

// Convierte una expresión infija a notación postfija (RPN)
vector<string> shunting_yard(const string &expresion)
{
    stack<char> operadores;
    vector<string> salida;

    for (size_t i = 0; i < expresion.size(); ++i)
    {
        char token = expresion[i];

        if (isdigit(token))
        {
            string numero;
            while (i < expresion.size() && (isdigit(expresion[i]) || expresion[i] == '.'))
            {
                numero += expresion[i];
                ++i;
            }
            --i; // Ajustar el índice después del bucle
            salida.push_back(numero);
        }
        else if (es_operador(token))
        {
            while (!operadores.empty() && es_operador(operadores.top()) &&
                   ((asociativo_izquierda(token) && precedencia[token] <= precedencia[operadores.top()]) ||
                    (!asociativo_izquierda(token) && precedencia[token] < precedencia[operadores.top()])))
            {
                salida.push_back(string(1, operadores.top()));
                operadores.pop();
            }
            operadores.push(token);
        }
        else if (token == '(')
        {
            operadores.push(token);
        }
        else if (token == ')')
        {
            while (!operadores.empty() && operadores.top() != '(')
            {
                salida.push_back(string(1, operadores.top()));
                operadores.pop();
            }
            if (!operadores.empty())
                operadores.pop(); // Eliminar '('
        }
    }

    while (!operadores.empty())
    {
        salida.push_back(string(1, operadores.top()));
        operadores.pop();
    }

    return salida;
}

// Evalúa una expresión en notación postfija
float evaluar_postfija(const vector<string> &rpn)
{
    stack<float> pila;

    for (const string &token : rpn)
    {
        if (isdigit(token[0]) || (token.size() > 1 && token[0] == '-'))
        { // Número
            pila.push(stof(token));
        }
        else if (es_operador(token[0]))
        { // Operador
            float b = pila.top();
            pila.pop();
            float a = pila.top();
            pila.pop();

            switch (token[0])
            {
            case '+':
                pila.push(a + b);
                break;
            case '-':
                pila.push(a - b);
                break;
            case '*':
                pila.push(a * b);
                break;
            case '/':
                if (b == 0)
                {
                    cout << "Error: División por cero" << endl;
                    return 0; // Devuelve 0 como fallback
                }
                pila.push(a / b);
                break;
            case '^':
                pila.push(pow(a, b));
                break;
            }
        }
    }

    return pila.top();
}

// Función de prueba
void resolver_expresion(const string &expresion)
{
    vector<string> rpn = shunting_yard(expresion);

    cout << "Notación Postfija: ";
    for (const string &token : rpn)
    {
        cout << token << " ";
    }
    cout << endl;

    float resultado = evaluar_postfija(rpn);
    cout << "Resultado: " << resultado << endl;
}

////////////////////////////////////////////////////////////////////////////////

void procesarOperacion()
{
    cout << "\nProcesando operación...\n";

    // Variables para almacenar operandos y operador
    int num1 = 0, num2 = 0;
    char operador;

    // Obtener primer operando
    int token = GetToken();
    if (token == NUM_ENTERO)
    {
        num1 = entero;
    }
    else
    {
        cout << "Error: Se esperaba un número entero.\n";
        return;
    }

    // Obtener operador
    token = GetToken();
    if (token == MAS || token == MENOS || token == '*')
    {
        operador = c[0]; // El operador es un solo carácter
    }
    else
    {
        cout << "Error: Se esperaba un operador (+, -, *).\n";
        return;
    }

    // Obtener segundo operando
    token = GetToken();
    if (token == NUM_ENTERO)
    {
        num2 = entero;
    }
    else
    {
        cout << "Error: Se esperaba un número entero.\n";
        return;
    }

    // Calcular el resultado
    int resultado = 0;
    switch (operador)
    {
    case '+':
        resultado = num1 + num2;
        break;
    case '-':
        resultado = num1 - num2;
        break;
    case '*':
        resultado = num1 * num2;
        break;
    default:
        cout << "Error: Operador no soportado.\n";
        return;
    }

    // Mostrar el resultado
    cout << "Resultado: " << resultado << endl;

    // Verificar el punto y coma
    token = GetToken();
    if (token != PUNTOYCOMA)
    {
        cout << "Error: Se esperaba un ';' al final de la operación.\n";
        return;
    }
}

Variable *buscarVariable(const string &nombre)
{
    for (auto &var : tablaSimbolos)
    {
        if (var.nombre == nombre)
            return &var;
    }
    return nullptr;
}

void asignarVariable(const string &nombre, float valor)
{
    Variable *var = buscarVariable(nombre);
    if (var)
    {
        var->valor = valor;
    }
    else
    {
        cout << "Error: Variable no declarada: " << nombre << endl;
    }
}

int analisis_sintactico()
{
    int estado = 0;
    int entrada;
    int flag = 1;
    string nombreVar;
    while (1)
    {
        cout << estado << " ";
        entrada = GetToken();
        if (entrada == FINAL)
        {
            return flag;
        }
        switch (estado)
        {
        case 0:
            if (entrada == INICIO)
                estado = 1;
            else
                return ERROR;
            break;

        case 1:
            if (entrada == ENTERO || entrada == REAL)
                estado = 3;
            else if (entrada == VARIABLE)
                estado = 4;
            else if (entrada == INGRESAR || entrada == MOSTRAR)
                estado = 5;
            else if (entrada == CALCULAR)
                estado = 6; // Nuevo estado
            else if (entrada == FIN)
                estado = 2;
            else
                return ERROR;
            break;

        case 2:
            break;
        case 3: // Declaración de variable
            if (entrada == VARIABLE)
            {
                Variable nuevaVar;
                nuevaVar.nombre = c;
                nuevaVar.tipo = (estado == 3) ? ENTERO : REAL; // Tipo según token previo
                nuevaVar.valor = 0;                            // Inicializar en 0
                tablaSimbolos.push_back(nuevaVar);
                estado = 4; // Esperar `;`
            }
            else
            {
                return ERROR;
            }
            break;

        case 4: // Después de un VARIABLE
            if (entrada == IGUAL)
            {
                estado = 6; // Ir a procesar una expresión
            }
            else
            {
                return ERROR;
            }
            break;

        case 5: // Evaluar expresión
            if (entrada == NUM_ENTERO || entrada == NUM_REAL || entrada == VARIABLE)
            {
                float valor = (entrada == VARIABLE) ? buscarVariable(c)->valor : atof(c);
                asignarVariable(nombreVar, valor); // Usamos `nombreVar` aquí
                estado = 6;
            }
            else
            {
                return ERROR;
            }
            break;

        case 6: // Procesar una expresión matemática
        {
            string expresion(cadena + p); // Leer expresión desde la posición actual
            resolver_expresion(expresion);
            return OK; // Asume que la expresión es válida
        }
        break;

        case 7: // Manejar `imprimir`
            if (entrada == MENORMENOR)
            {
                entrada = GetToken();
                if (entrada == VARIABLE)
                {
                    Variable *var = buscarVariable(c);
                    if (var)
                    {
                        cout << "Valor de " << var->nombre << ": " << var->valor << endl;
                    }
                    else
                    {
                        cout << "Error: Variable no declarada: " << c << endl;
                        return ERROR;
                    }
                }
                estado = 8; // Esperar `;`
            }
            else
            {
                return ERROR;
            }
            break;

        case 8:
            if (entrada == PUNTOYCOMA)
            {
                estado = 1; // Volver al estado principal
            }
            else
            {
                return ERROR;
            }
            break;
        }
    }

    return 1;
}

int main()
{
    FILE *archivo;
    archivo = fopen("programa.txt", "r");
    if (!archivo)
    {
        cout << "Error: No se pudo abrir el archivo programa.txt" << endl;
        return EXIT_FAILURE;
    }

    int i = 0;
    while (feof(archivo) == 0)
    {
        cadena[i++] = fgetc(archivo);
    }
    cadena[i - 1] = '\0'; // Finaliza la cadena
    fclose(archivo);

    cout << cadena << endl;

    if (analisis_lexico())
    {
        if (analisis_sintactico())
        {
            cout << "Programa válido.\n";
        }
        else
        {
            cout << "Error de sintaxis.\n";
        }
    }
    else
    {
        cout << "Error léxico.\n";
    }

    // Prueba adicional: evaluación directa
    string expresion;
    cout << "Ingrese una expresión matemática infija: ";
    getline(cin, expresion);
    resolver_expresion(expresion);

    return EXIT_SUCCESS;
}
