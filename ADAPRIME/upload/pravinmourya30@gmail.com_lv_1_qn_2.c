#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
	int t,flag,i;
	float a;
	scanf("%d",&t);
	while(t--)
	{
		scanf("%f%d",&a,&i);
		flag=2*(a-i+1);
		printf("%d\n",flag);
	}
	return 0;
}