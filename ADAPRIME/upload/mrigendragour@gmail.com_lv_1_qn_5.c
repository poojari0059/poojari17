#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
	int t;
	int len,n;
	unsigned long long int count;
	int x,y,z,w,i,temp;
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d",&n);
		x=1;y=2;z=4;w=8;
		if(n==1)
		{
			printf("%d\n",x);
			continue;
		}
		else if(n==2)
		{
			printf("%d\n",y);
			continue;
		}
		else if(n==3)
		{
			printf("%d\n",z);
			continue;
		}
		else if(n==4)
		{
			printf("%d\n",w);
			continue;
		}
		else
		{
			for(i=1;i<=n-4;i++)
			{
				count=x+y+z+w;
				x=y;
				y=z;
				z=w;
				w=count;
			}
			printf("%llu\n",count);
		}
	}
	return 0;
}