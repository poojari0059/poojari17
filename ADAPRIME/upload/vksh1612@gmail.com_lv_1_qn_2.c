#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main(){
	int t;
	scanf("%d",&t);
	while(t--){
		int I,B;
		float A,result;
		scanf("%f %d",&A,&I);
		result = 2.0 * (A-I+1);
		printf("%0.f\n",(result));	
	}
	return 0;
}