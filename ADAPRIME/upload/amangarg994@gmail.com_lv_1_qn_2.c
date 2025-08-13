#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main(){
	float a;
	int i,b,t;
	scanf("%d",&t);
	while(t--){
		scanf("%f%d",&a,&i);
		b=(a+1-i)*2;
		printf("%d\n",b);
		
	}
	return 0;
}