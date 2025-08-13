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
		unsigned long long int h,l,res,two=2;
		scanf("%llu %llu",&h,&l);
		res=(l-h-h);
		if(res%two!=0 || h*4 < l)
		{
			printf("-1\n");
		}
		else
		{
			res=h-(res)/two;
			printf("%llu\n",res);
		}
	}
}