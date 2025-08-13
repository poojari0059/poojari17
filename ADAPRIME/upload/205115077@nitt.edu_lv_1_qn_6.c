#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int main()
{
	
		int i,j,n,r;
		scanf("%d%d",&n,&r);
		int a[n][n];
		for(i=0;i<n;++i)
		for(j=0;j<n;++j)
			a[i][j]=0;
			int s,d,c;
		for(i=0;i<r;i++)
		{
			scanf("%d%d%d",&s,&d,&c);
			a[s-1][d-1]=c;
		}
		unsigned long long int sum=0,min=0;
		for(i=0;i<n;i++)
		{
			min=1001;
			for(j=0;j<n;j++)
			{
				if(min>a[i][j]&&a[i][j]!=0)
					min=a[i][j];
			}
			if(min!=1001)
			sum+=min;
		}
			//printf("%llu\n",sum);
		int sumc=0;
	    for(i=0;i<n;i++)
		{
			min=1001;
			for(j=0;j<n;j++)
			{
				if(min>a[j][i]&&a[j][i]!=0)
					min=a[j][i];
			}
			if(min!=1001)
			sumc+=min;
		}
		if(sumc<sum)
		printf("%llu\n",sumc);
		else
		printf("%llu\n",sum);
return 0;	
}