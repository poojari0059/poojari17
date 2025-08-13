#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

long double  hen(long double h, long double l)
{
	long double i=0,c;
	//int c;
	for(i=0;i<h;i++)
	{
		c=h-i;
		if((c*2) + (i*4)==l)
		{
			//printf("%d  ",c);
			return c;
		}
	}
	return -1;
}
int main()
{
	long double i,h,l,r,t;
	//int a[100];
	scanf("%ld",&t);
	for(i=0;i<t;i++)
	{
		scanf("%ld%ld",&h,&l);
		//printf("%d %d",h,l);
		r=hen(h,l);
		//a[i]=r;
		printf("\n%ld",r);
	}
	return 0;
}