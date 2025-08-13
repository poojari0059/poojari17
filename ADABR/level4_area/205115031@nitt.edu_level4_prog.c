
                  #include <stdio.h>

                  int main(){

                  	int a = 2;

                  	int i;

                  	for(i=1; i<=300; i++)

                  		printf("%d\n", 
            (((i*17)%19)^((i*13)%187))
                      );

                      return 0;

                  }

            