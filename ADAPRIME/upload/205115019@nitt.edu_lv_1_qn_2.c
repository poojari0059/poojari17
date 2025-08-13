#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>



int main()
{
	
	int t;
	scanf("%d",&t);
	while(t--)
	{
		
	float area;
	int i;
	scanf("%f %d",&area, &i);
	int b;
	b = 2*(area+1 - i);
	printf("%d\n",b);
	}
}