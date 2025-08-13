#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main( )
{	int u,v,ne=1;
	int visited[10]= {0},min,mincost=0;
	int n,r,i,j,t1,t2,t3;
	scanf("%d%d",&n,&r);
	if(n<2 || n>100)
	{	printf("\n Invalid number of cities.");
		exit(0);
	}
	if(r<1 || r>((n*(n-1))/2))
	{	printf("\n Invalid number of roads.");
		exit(0);
	}
	int cost[100][100];
	for(i=1 ; i<=n ; i++)
	{	for(j=1 ; j<=n ; j++)
		{	cost[i][j]	= 999;	}
	}
	for(i=0 ; i<r ; i++)
	{	scanf("%d%d%d",&t1,&t2,&t3);
		while(t1<1 || t1>n)
		{	printf("\n Source in not within number of cities. Enter again.\n");
			scanf("%d%d%d",&t1,&t2,&t3);
		}
		while(t2<1 || t2>n)
		{	printf("\n Destination in not within number of cities. Enter again.\n");
			scanf("%d%d%d",&t1,&t2,&t3);
		}
		while(t3<1 || t3>1000)
		{	printf("\n Cost is too high. Enter again.\n");
			scanf("%d%d%d",&t1,&t2,&t3);
		}
		cost[t1][t2]		= t3;
		cost[t2][t1]		= t3;
	}
	visited[1]=1;
	while(ne<n) 
	{	for (i=1,min=999;i<=n;i++)
		{	for (j=1;j<=n;j++)
			{	if(cost[i][j]<min)
	    		{	if(visited[i]!=0) 
					{	min=cost[i][j];
						u=i;
						v=j;
					}
				}
			}
		}
		if(visited[u]==0 || visited[v]==0) 
		{	ne++;
			mincost+=min;
			visited[v]=1;
		}
		cost[u][v]=cost[v][u]=999;
	}
	printf("%d",mincost);
	return 0;
}