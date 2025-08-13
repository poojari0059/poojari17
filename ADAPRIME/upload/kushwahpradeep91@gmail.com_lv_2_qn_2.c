#include <stdio.h>

int INT_MAX=1000;
int minD(int n,int dist[], int sptSet[])
{
	int min = INT_MAX, min_index,v;

	for (v = 0; v < n; v++)
		if (sptSet[v] == 0 && dist[v] <= min)
			min = dist[v], min_index = v;

	return min_index;
}	

int print(int dist[], int n, int parent[],int s,int h)
{
	int src = 0,i,c=0;
	for(i=1;i<n;i++)
	{
		if((2*dist[i])<=(s*h))
		{
		     c++;
		    // d=0;
	    }
	}
	printf("%d\n",c);
	
}
void dij(int n,int graph[n][n], int src,int s,int h)
{
	int dist[n],i; 
	int sptSet[n];
	int parent[n];
	for ( i = 0; i < n; i++)
	{
		parent[0] = -1;
		dist[i] = INT_MAX;
		sptSet[i] = 0;
	}
	dist[src] = 0;
	int count;
	for (count = 0; count < n-1; count++)
	{
		int u = minD(n,dist, sptSet);
		sptSet[u] = 1;
		int v;
		for ( v = 0; v < n; v++)
			if (!sptSet[v] && graph[u][v] &&
				dist[u] + graph[u][v] < dist[v])
			{
				parent[v] = u;
				dist[v] = dist[u] + graph[u][v];
			} 
	}
	print(dist,n, parent,s,h);
}
int main()
{
	int n,r,s,h,i,j;
	scanf("%d%d%d%d",&n,&r,&s,&h);
	int graph[n][n];
	for(i=0;i<n;i++)
	{
		for(j=0;j<n;j++)
		graph[i][j]=0;
	}
	for(i=0;i<r;i++)
	{
		int di,dj,d;
		scanf("%d%d%d",&di,&dj,&d);
		graph[di][dj]=d;
		graph[dj][di]=d;
	}
	dij(n,graph, 0,s,h);
	return 0;
}
