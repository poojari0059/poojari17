#include <stdio.h>


int minD(int n,int dist[], int sptSet[])
{
	int min = 1000, min_index,v;

	for (v = 0; v < n; v++)
		if (sptSet[v] == 0 && dist[v] <= min)
			min = dist[v], min_index = v;

	return min_index;
}	
void dij(int n,int g[n][n], int src,int s,int h)
{
	int dist[n],i, sptSet[n], p[n],c=0;
	for ( i = 0; i < n; i++)
	{
		p[0] = -1;
		dist[i] = 1000;
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
			if (!sptSet[v] && g[u][v] &&
				dist[u] + g[u][v] < dist[v])
			{
				p[v] = u;
				dist[v] = dist[u] + g[u][v];
			} 
	}
  src = 0;
	for(i=1;i<n;i++)
		if((2*dist[i])<=(s*h))	
		     c++;
		     
		     
	printf("%d\n",c);
}
int main()
{
	int n,r,s,h,i,j;
	scanf("%d%d%d%d",&n,&r,&s,&h);
	int g[n][n];
	for(i=0;i<n;i++)
	{
		for(j=0;j<n;j++)
		g[i][j]=0;
	}
	while(r--)
	{
		int di,dj,d;
		scanf("%d%d%d",&di,&dj,&d);
		g[di][dj]=d;
		g[dj][di]=d;
	}
	dij(n,g,0,s,h);
	return 0;
}

