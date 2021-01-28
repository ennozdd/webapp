#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>


int main(int argc, char * argv[]){
    char payload[100];
    char filename[25];
    setuid(0);
    if(argc < 2){
        printf("%s\n", "Usage ./wrapper <username>.");
        exit(1);
    }

    for (int i = 0; i < strlen(argv[1]); ++i){
        if(argv[1][i] == '!' || argv[1][i] == '@' || argv[1][i] == '#' || argv[1][i] == '$'
        || argv[1][i] == '%' || argv[1][i] == '^' || argv[1][i] == '&' || argv[1][i] == '*'
        || argv[1][i] == '(' || argv[1][i] == ')' || argv[1][i] == '{'
        || argv[1][i] == '}' || argv[1][i] == '[' || argv[1][i] == ']' || argv[1][i] == ':'
        || argv[1][i] == ';' || argv[1][i] == '"' || argv[1][i] == '\'' || argv[1][i] == '<'
        || argv[1][i] == '>' || argv[1][i] == '.' || argv[1][i] == '/' || argv[1][i] == '?'
        || argv[1][i] == '~' || argv[1][i] == '`' ){
           printf("Illegal string\n");
           exit(1);
        }
    }
    if( strlen(argv[1]) > 25){
        printf("%s\n", "Username length must be less than 26");
        exit(1);
    }

    strcat(filename, "/opt/openvpn/client/");
    strcat(filename, argv[1]);
    strcat(filename, ".ovpn");

    if( access( filename,  F_OK) == 0 ){
        printf("%s\n" ,"File already exists.");
        exit(1);
    }
    

    strcpy(payload, "/usr/bin/echo  '1\n");
    strcat(payload,argv[1]);
    strcat(payload,"\n1\n' | /opt/openvpn/openvpn-install.sh");


    system(payload);
}
