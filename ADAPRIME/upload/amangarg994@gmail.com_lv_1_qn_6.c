#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int minKey(int V,int key[], int  mstSet[])
{
int min = 2147483647, min_index;
int v;
for ( v = 0; v < V; v++)
	if (mstSet[v] ==0 && key[v] < min)
		min = key[v], min_index = v;

return min_index;
}

long long int printMST(int V,int parent[], int graph[V][V])
{
	int i;
	long long int sum=0;

for (i = 1; i < V; i++)
	{
	sum+=graph[i][parent[i]];
	}
	return sum;
	
}


int primMST(int V,int graph[V][V])
{
	int parent[V]; 
	int key[V]; 
	int mstSet[V]; 
    int v,i,u,count;
	long long int sum;
	
	for ( i = 0; i < V; i++)
		key[i] = 2147483647, mstSet[i] =0;

	
	key[0] = 0;	
	parent[0] = -1;

	for ( count = 0; count < V-1; count++)
	{
		 u = minKey(V,key, mstSet);
		mstSet[u] = 1;
		for ( v = 0; v < V; v++)

		if (graph[u][v] && mstSet[v] == 0 && graph[u][v] < key[v])
			parent[v] = u, key[v] = graph[u][v];
	}

	sum=printMST(V,parent, graph);
}


int main()
{
int V,R;
long long int sum=0;
int s,d,w,i,j;
scanf("%d%d",&V,&R);
int graph[V][V] ;
for(i=0;i<V;i++){
	for(j=0;j<V;j++){
		  graph[i][j]=0;
	}
	
}
for(i=1;i<=R;i++){
	scanf("%d%d%d",&s,&d,&w);
	graph[d-1][s-1]=graph[s-1][d-1]=w;
}


	sum=primMST(V,graph);
	printf("%d\n",sum);

	return 0;
}
