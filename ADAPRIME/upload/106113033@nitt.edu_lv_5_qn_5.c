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
		int n,i;
		scanf("%d",&n);
		int bits= 0;
		int a = n;
		while(a)
		{
			if(a&1)
			bits++;
			a= a>>1;
		}
		for(i=n+1;;i++)
		{
			int b=0;
			int a=i;
			while(a)
		{
			if(a&1)
			b++;
			a= a>>1;
		}
		if(b==bits)
		break;
		}
		printf("%d\n",i);
	}
	return 0;
}