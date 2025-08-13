#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
int i,j,t;
int p=1000000007;
scanf("%d",&t);
int a[1001]={0};
a[1]=1;
a[2]=2;
a[3]=4;
a[4]=8;
for(i=5;i<=1000;i++)
{
	a[i]=(a[i-1]+a[i-2])%p;
	a[i]=(a[i]+a[i-3])%p;
	a[i]=(a[i]+a[i-4])%p;
}
for(i=0;i<t;i++)
{
	int n;
	scanf("%d",&n);
	printf("%d\n",a[n]);
}
return 0;
}