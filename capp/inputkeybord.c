#include <stdio.h>
#include <stdlib.h>

int main(int argc, char *argv[]){
        char *str;
        str=(char *)malloc(sizeof(char)*100);
        fgets(str,100,stdin);
        printf("STDIN: %s", str);
        free(str);

        return(0);
}
