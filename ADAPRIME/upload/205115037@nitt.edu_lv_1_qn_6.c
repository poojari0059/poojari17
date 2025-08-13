#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int minKey(int V,int key[], int mstSet[])
{
   int min = 10001, min_index;
      int v=0;
   for ( v = 0; v < V; v++)
     if (mstSet[v] == 0 && key[v] < min)
         min = key[v], min_index = v;
   return min_index;
}
int primMST(int V, int graph[V][V])
{
     int parent[V]; 
     int key[V];   
     int mstSet[V];  
     int i=0;
     for ( i = 0; i < V; i++)
        key[i] = 10001, mstSet[i] = 0;
 
     key[0] = 0;    
     parent[0] = -1;  
      int count=0;
     for ( count = 0; count < V-1; count++)
     {
        int u = minKey(V,key, mstSet);
        mstSet[u] = 1;
        int v=0;
        for ( v = 0; v < V; v++)
       {
 
          if (graph[u][v] && mstSet[v] == 0 && graph[u][v] <  key[v])
             parent[v]  = u, key[v] = graph[u][v];
             
       }
    }
     int sum=0,v=0;
     while(v<V)
     {
     	//printf("\tkey ->%d ",graph[v][parent[v]]);
     sum+=graph[v][parent[v]];
     v++;
      }
    return sum;
}
int main()
{
            int n,r;
            scanf("%d%d",&n,&r);
            int i=0,j=0;
            int graph[n][n];
            for(i=0;i<n;++i)
            {
			
            for(j=0;j<n;++j)
            {
		     	
            graph[i][j]=0;
           }
    }
     
         while(r--)
         {
         	int s,d,c;
         	scanf("%d%d%d",&s,&d,&c);
         	graph[s-1][d-1]=c;
         	graph[d-1][s-1]=c;
		 }
		 
   int min= primMST(n,graph);
    printf("%d",min);
    return 0;
}