#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
	int t,a[1000],i,j,max,n;
	scanf("%d",&t);
	while(t--)
	{
		max=-10000000;
		scanf("%d",&n);
		for(i=0;i<n;i++)
		{
			scanf("%d",&a[i]);
		}
		for(i=0;i<n;i++)
		{
			int sum=0;
			for(j=0;j<n;j++)
			{
				sum=sum+(a[(i+j)%n]*j);
			}
			if(max<sum)
			 max =sum;
		}
		printf("%d\n",max);
	}
	return 0;
}