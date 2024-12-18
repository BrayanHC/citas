#include <iostream>
#include <string.h>
#include <stdlib.h>
#include <fstream>

using namespace std;

//----------------------------------------------------------
// DEFINICIONES
//----------------------------------------------------------
//PALABRAS RESERVADAS
#define INICIO         101
#define FIN		        102

#define ENTERO         104

#define REAL           105

#define NUM_ENTERO     106
#define NUM_REAL       107

//SIMBOLOS
#define ABREPAR        204 //   (
#define CIERRAPAR      205 //   )
#define PUNTOYCOMA     206 //   ;
#define IGUAL          207 //   =
#define MAS            208 //   +
#define MENOS          209 //   -
#define MENORMENOR     214 //   <<
#define MAYORMAYOR     215 //   >>
#define IGUALIGUAL     216 //   ==
#define MENORIGUAL     217 //   <=
#define MAYORIGUAL     218 //   >=
#define DIFERENTE      219 //   !=
#define YY             220 //   &&
#define OO             221 //   ||
#define MENOR          223 //   <
#define MAYOR          224 //   >
#define MASMAS         225 //   ++
#define MENOSMENOS     226 //   --
#define MASIGUAL       227 //   +=
#define INGRESAR       330 //
#define MOSTRAR        331 //


//AUXILIARES
#define CADENA         304
#define FINAL          305
#define ERROR          306
#define VARIABLE       307
#define OK             308

//---------------------------------------------------------------
//Declaracion e inicializacion de variables globales
//---------------------------------------------------------------

int p=0;
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

tabla tsimb[]=
{	 INICIO      , "inicio",
	 FIN         , "fin",
	 ENTERO      , "entero",
	 INGRESAR      , "ingresar",
	 MOSTRAR      , "mostrar",
	 REAL        , "real",
    ABREPAR     , "(",
    CIERRAPAR   , ")",
    PUNTOYCOMA  , ";",
    IGUALIGUAL  , "==",
    IGUAL       , "=",
    MAS         , "+",
    MENOS       , "-",
    MENORMENOR  , "<<",
    MAYORMAYOR  , ">>",
    MENORIGUAL  , "<=",
    MAYORIGUAL  , ">=",
    DIFERENTE   , "!=",
    YY          , "&&",
    OO          , "||",
    MENOR       , "<",
    MAYOR       , ">" ,
    MASMAS      , "++" ,
    MENOSMENOS  , "--" ,
    MASIGUAL    , "+=" ,
	 FINAL	    , "\0"
};

//---------------------------------------------------------------
//Funcion para optener un token
//---------------------------------------------------------------

int GetToken(){
	while(1){
		if(cadena[p]=='"'){
			p++;
			int i=0;
         while(cadena[p]!='"'){
				if(cadena[p]=='\0'){
					return ERROR;
				}
				texto[i]=cadena[p];
            i++;
            p++;
         }
			texto[i]='\0';
			p++;
			return CADENA;
		}
		if(isalpha(cadena[p])){
			int i=0;
			while(isalpha(cadena[p]) || isdigit(cadena[p])){
				c[i]=cadena[p];
				i++;
				p++;
			}
			c[i]='\0';
			for(i=0;tsimb[i].complex!=FINAL;i++){
				if(strcmp(tsimb[i].aplex,c)==0)
					return tsimb[i].complex;
			}
			return VARIABLE;
		}
		if(isdigit(cadena[p])){
			int i=0;
			while(isdigit(cadena[p])){
				c[i]=cadena[p];
				i++;
				p++;
			}
			if(cadena[p]=='.' && isdigit(cadena[p+1])){
				c[i]=cadena[p];
				i++;
				p++;
				while(isdigit(cadena[p])){
					c[i]=cadena[p];
					i++;
					p++;
				}
				real=atof(c);
				return NUM_REAL;
			}
			entero=atoi(c);
			return NUM_ENTERO;
      }
      char t=cadena[p];//<=
		if(t=='=' || t=='<' || t=='>' || t=='!' || t=='&' || t=='|' || t=='+' || t=='-'){
			char tmpx[3];
			tmpx[0]=t;
         if(cadena[p+1]=='=' || cadena[p+1]=='<'|| cadena[p+1]=='>' || cadena[p+1]=='&' || cadena[p+1]=='|'|| cadena[p+1]=='+'|| cadena[p+1]=='-'){
         	tmpx[1]=cadena[p+1];
            tmpx[2]='\0';
            p++;
            p++;
            strcpy(c,tmpx);
         }
         else{
         	tmpx[1]='\0';
         	p++;
         	strcpy(c,tmpx);
			}
			for(int i=0;tsimb[i].complex!=FINAL;i++){
				if(strcmp(tmpx,tsimb[i].aplex)==0)
					return tsimb[i].complex;
			}
		}
		else{
			char tmpx[3];
			tmpx[0]=t;
			tmpx[1]='\0';
			for(int i=0;tsimb[i].complex!=FINAL;i++){
				if(strcmp(tmpx,tsimb[i].aplex)==0){
					p++;
					return tsimb[i].complex;
				}
			}
			c[0]=t;
			c[1]='\0';
		}
		switch(cadena[p])
		{
			case ' ': p++; ;break;
			case '\t': p++; ;break;
			case '\n': p++; ;break;
			case '\0':  return FINAL;
			default: p++; return ERROR;
		}
	}
}

int analisis_lexico(){
	p=0;
	int token;
	int flag=1;
	while(1){
		token=GetToken();
		if(token==FINAL){
			return flag;
		}
		if(token==ERROR)
		{
			cout<<"Error!!! token no reconocido "<<" ' "<<c<<" ' "<<"\n";
			flag=0;
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

int analisis_sintactico(){
    int estado = 0;
    int entrada;
    int flag = 1;
    int valor1, valor2;
    string operacion = "";

    while(1){
        entrada = GetToken();
        if(entrada == FINAL){
            return flag;
        }

        switch(estado){
            case 0:
                if(entrada == INICIO)
                    estado = 1;
                else    
                    return ERROR;
            break;

            case 1:
                if(entrada == ENTERO || entrada == REAL) 
                    estado = 3; // Leer declaraciones de tipo
                else if(entrada == VARIABLE) 
                    estado = 4; // Leer variables
                else if(entrada == INGRESAR || entrada == MOSTRAR) 
                    estado = 5; // Leer instrucciones
                else if(entrada == FIN)
                    estado = 2;
                else
                    return ERROR;
            break;

            case 3: // Declaraciones
                if(entrada == NUM_ENTERO) {
                    valor1 = entero; // Almacenar primer valor
                    estado = 6; // Cambiar a estado para manejar la suma
                } else if(entrada == NUM_REAL) {
                    real = real; // Almacenar valor real
                    estado = 6;
                } else {
                    return ERROR;
                }
            break;

            case 6: // Estado para manejar la suma
                if(entrada == MAS) { // Detectamos el operador "+"
                    entrada = GetToken();
                    if(entrada == NUM_ENTERO) {
                        valor2 = entero; // Segundo valor numérico
                        cout << "Resultado de la suma: " << valor1 + valor2 << endl; // Mostrar el resultado de la suma
                    } else if(entrada == NUM_REAL) {
                        valor2 = real;
                        cout << "Resultado de la suma: " << valor1 + valor2 << endl;
                    } else {
                        return ERROR; // Error si no es un número
                    }
                }
            break;

            case 2:
                break;
        }
    }
    
    return 1;
}



int main(){
	//strcpy(cadena,"< >= %.  	\"hola sistemas\" 12x var12x 12 234.456 vary12 entero && %% < <= ==+ - ");
   FILE *archivo;
   archivo = fopen("programa.txt","r");
	int i=0;
   while (feof(archivo) == 0){
			cadena[i++]=fgetc(archivo);
   }
   cadena[i-1]='\0';
	cout<<cadena;
	if(analisis_lexico()){
		analisis_sintactico();
	}
	system("pause");
	return EXIT_SUCCESS;
}