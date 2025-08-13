#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int a,b,u,v,c,n,i,j,ne=1,val;
 
int visited[10],min,mincost=0,cost[100][100];
 
int main()
 
{
	
	for(i=0;i<10;i++)
visited[i]=0;

  scanf("%d%d",&n,&c);
  while(c)
 {
scanf("%d%d%d",&i,&j,&val);
if(val==0)
 cost[i][j]=cost[j][i]=999;
 else
 cost[i][j]=cost[j][i]=val;
  c--;
}





for(i=1;i<=n;i++)
{
	for(j=0;j<=n;j++)
	{
		if(cost[i][j]==0)
		cost[i][j]=cost[j][i]=999;
	}
}
	visited[1]=1;
	
		while(ne < n)
{
 		for(i=1,min=999;i<=n;i++)
 
		for(j=1;j<=n;j++)
 
		if(cost[i][j]< min)
 
		if(visited[i]!=0)
 
		{
 
			min=cost[i][j];
 
			a=u=i;
 
			b=v=j;
 
		}
 
		if(visited[u]==0 || visited[v]==0)
 
		{
         ne++;
 
			mincost+=min;
 
			visited[b]=1;
 
		}
 
		cost[a][b]=cost[b][a]=999;
 
	}
 
	printf("%d",mincost);
 
return 0;
 
}
 
 


