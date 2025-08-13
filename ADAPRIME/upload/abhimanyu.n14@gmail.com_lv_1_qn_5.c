#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int f(int n)
{	if(n == 1)
	{	return 1;	}
	else if(n == 2)
	{	return 2;	}
	else if(n == 3)
	{	return 4;	}
	else if(n == 4)
	{	return 8;	}
	else if(n == 5)
	{	return 16;	}
	else
	{	return (f(n-1)+f(n-2)+f(n-3)+f(n-4));	}
}
int main()
{	int n,t;
	scanf("%d",&t);
	if(t<1 || t>1000)
	{	printf("\n Invalid number of tsetcases.");
		exit(0);
	}
	int i,arr[t],s=0;
	for(i=0;i<t;i++)
	{	scanf("%d",&n);
		while(n<1 || n>100)
		{	printf("Invalid number.Enter again..");
			scanf("%d",&n);
		}
		arr[s++]	= f(n)%1000000007;
	}
	for(i=0;i<t;i++)
	{	printf("%d\n",arr[i]);	}
	return 0;	
}