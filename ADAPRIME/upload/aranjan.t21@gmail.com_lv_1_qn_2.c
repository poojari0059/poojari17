#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int main()
{
	int T,i;
	unsigned int I,B;
	float A;
	scanf("%u",&T);
	for(i=0;i<T;i++)
	{
		scanf("%f",&A);
		scanf("%u",&I);
		B=2*((A+1)-I);
		printf("%d",B);
	}
	return 0;
}