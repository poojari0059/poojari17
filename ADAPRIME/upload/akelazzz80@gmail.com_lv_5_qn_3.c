#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main(){
	int test_case,i,j;
	scanf("%d",&test_case);
	while(test_case--){
		int matrix[2][2];
		for(i=0;i<2;i++)
		for(j=0;j<2;j++)
		scanf("%d",&matrix[i][j]);
		int a,b,c;
		a=1;b=-(matrix[0][0]+matrix[1][1]);
		c=matrix[0][0]*matrix[1][1]-matrix[0][1]*matrix[1][0];
		int alfa,bita;
		
		if((b*b-4*c)<0){
			printf("NA\n");
		 } 	 
		else{
		
		    alfa=((-b+sqrt(b*b-4*c))/2.0);
		    bita=((-b-sqrt(b*b-4*c))/2.0);
		    printf("%d %d\n",alfa, bita);
	       }
	}
	return 0;
}
