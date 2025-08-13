#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

void primMST(int graph[100][100]);
int minKey(int key[], int mstSet[]);
int printMST(int parent[], int n, int graph[100][100]);
void primMST(int graph[100][100]);
int V=0;
int minKey(int key[], int mstSet[])
{
    int v;
   int min = 10000, min_index;
   for (v = 0; v < V; v++)
     if (mstSet[v] == 0 && key[v] < min)
         min = key[v], min_index = v;
   return min_index;
}
int printMST(int parent[], int n, int graph[100][100])
{
    int i,sum=0;
   for (i = 1; i < V; i++)
        sum+=graph[i][parent[i]];
      return sum;
}
void primMST(int graph[100][100])
{
     int parent[V],v,i; 
     int key[V],count; 
     int mstSet[V]; 
     for (i = 0; i < V; i++)
        key[i] = 10000, mstSet[i] = 0;
     key[0] = 0;     
     parent[0] = -1; 
     for (count = 0; count < V-1; count++)
     {
        int u = minKey(key, mstSet);
        mstSet[u] = 1;
        for (v = 0; v < V; v++)
          if (graph[u][v] && mstSet[v] == 0 && graph[u][v] <  key[v])
             parent[v]  = u, key[v] = graph[u][v];
     }
     printf("%d",printMST(parent, V, graph));
}
int main()
{
    int i,j,r,s,d,c;
    int graph[100][100];
    scanf("%d %d",&i,&r);
     V=i;
    for(i=0;i<V;i++)
    {
        for(j=0;j<V;j++)
        graph[i][j]=0;
    }
     while(r--)
    {
         scanf("%d %d %d",&s,&d,&c);
         graph[s-1][d-1]=c;
         graph[d-1][s-1]=c;
    }
    primMST(graph);
    return 0;
}