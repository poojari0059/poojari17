#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int graph[80][80],pred[80];
int V,e,c=0;
int mark[80],dist[80];
int minDistance(int dist[], int sptSet[])
{
   int min = 999, min_index,v;
  
   for (v = 0; v < V; v++)
     if (sptSet[v] == 0 && dist[v] <= min)
         min = dist[v], min_index = v;
  
   return min_index;
}
void dfs(int i)
{
	mark[i]=1;
	if(i==V-1)
	c=1;
	int j;
	for(j=0;j<V;j++)
	{
		if(graph[i][j] && !mark[j])
		dfs(j);
	}
}
void dijkstra(int src)
{
     int i;     
     int sptSet[V],count,v; 
     for (i = 0; i < V; i++)
        dist[i] = 9999, sptSet[i] = 0;
     dist[src] = 0;
     for (count = 0; count < V-1; count++)
     {
       int u = minDistance(dist, sptSet);  
       sptSet[u] = 1;
       for (v = 0; v < V; v++)
         if (!sptSet[v] && graph[u][v] && dist[u] != 9999
           
		                             && dist[u]+graph[u][v] < dist[v])
		                             {
		                             
            dist[v] = dist[u] + graph[u][v];
            pred[v]=u;}
     }
}
int main()
{
	int t,i,j;
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d %d\n",&V,&e);
		for(i=0;i<V;i++)
		{
			for(j=0;j<V;j++)
			graph[i][j]=0;
			
			mark[i]=0;
		}
		for(i=0;i<e;i++)
		{
			int a,b,c;
			scanf("%d %d %d",&a,&b,&c);
			graph[a-1][b-1]=c;
			graph[b-1][a-1]=c;
		}
		int cost = 0;
		dijkstra(0);
		cost+=dist[V-1];
		i= V-1;
		while(i!=0)
		{
			graph[i][pred[i]]=0;
			graph[pred[i]][i]=0;
		//	printf("%d %d\n",i,pred[i]);
			i = pred[i];
			
		}
		c=0;
		dfs(0);
		if(!c)
		printf("Not possible\n");
		else
		{
			dijkstra(0);
			cost+=dist[V-1];
			cost+=30;
			int time= 14*3600+59*60;
			int h= (time-cost)/3600;
			int m = (time-cost)%3600;
			int s = m%60;
			m=m/60;
			printf("%02d:%02d:%02d\n",h,m,s);
		}
	}
	return 0;
}