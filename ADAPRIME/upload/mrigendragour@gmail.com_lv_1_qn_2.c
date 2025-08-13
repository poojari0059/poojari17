#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>



int main()
{
	int t;
	long long int i,b;
         float a;
         scanf("%d",&t);
	while(t--)
	{
		scanf("%f%lld",&a,&i);
		b=((a+1)-i)*2;
		printf("%d\n",b);
	}
	return 0;
}