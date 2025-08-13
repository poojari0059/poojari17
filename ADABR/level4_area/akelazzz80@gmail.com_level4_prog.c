
                  #include <stdio.h>

                  int main(){

                  	int a = 2;

                  	int i;

                  	for(i=1; i<=300; i++)

                  		printf("%d\n", 
            (i*a)%500, ((a & 0x3)?(a++):1)
                      );

                      return 0;

                  }

            