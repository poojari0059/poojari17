#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int i,j,k,a,b,r,s,d,c,u,v,n,ne=1;
int min,mincost=0,cost[101][101]={{0}},parent[101];
int find(int);
int uni(int,int);
int main()
{
	

	
	scanf("%d%d",&n,&r);



	for(i=1;i<=r;i++)
	{
		scanf("%d%d%d",&s,&d,&c);
		cost[s][d]=c;
	}
	for(i=1;i<=n;i++)
	{
		for(j=1;j<=n;j++)
		{
			if(cost[i][j]==0)
				cost[i][j]=1001;
			
			}	
		
	}

	while(ne < n)
	{
		for(i=1,min=1001;i<=n;i++)
		{
			for(j=1;j <= n;j++)
			{
				if(cost[i][j] < min)
				{
					min=cost[i][j];
					a=u=i;
					b=v=j;
				}
			}
		}
		u=find(u);
		v=find(v);
		if(uni(u,v))
		{
	
		ne++;
			mincost +=min;
		}
		cost[a][b]=cost[b][a]=1001;
	}
	printf("%d",mincost);
	return 0;
}
int find(int i)
{
	while(parent[i])
	i=parent[i];
	return i;
}
int uni(int i,int j)
{
	if(i!=j)
	{
		parent[j]=i;
		return 1;
	}
	return 0;
}