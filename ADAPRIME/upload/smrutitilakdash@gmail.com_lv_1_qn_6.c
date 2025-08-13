#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>



int minKey(  int key[], int mstSet[],int V)
{
   int min = 9999, min_index,v;
 
   for ( v = 0; v < V; v++)
     if (mstSet[v] == 0 && key[v] < min)
         min = key[v], min_index = v;
 
   return min_index;
}
 
void printMST( int parent[],  int V, int graph[100][100])
{
    int ans=0,i;
   for ( i = 1; i < V; i++)
       ans+=graph[i][parent[i]];
       
       
      printf("%d",ans);
}
 
void primMST(int graph[100][100],int V)
{
    int parent[1000];
   int key[1000];
     int mstSet[1000],i;  
     for (  i = 0; i < V; i++)
        key[i] = 9999, mstSet[i] =0;

    key[0] = 0;     
     parent[0] = -1;  
  int count;
   int v,u;
     for ( count = 0; count < V-1; count++)
     {
        u = minKey(key, mstSet,V);
 
        mstSet[u] =1;
 
        for ( v = 0; v < V; v++)
 
          if (graph[u][v] && mstSet[v] ==0   && graph[u][v] <  key[v])
             parent[v]  = u, key[v] = graph[u][v];
     }
 printMST(parent, V, graph);
}
int main()
{
   
    int  a[100][100],n,v,i,j,l,k,t;
    
    
    
    for(i=0;i<100;i++)
        for(j=0;j<100;j++)
        a[i][j]=0;
        
        
    scanf("%d",&v);
    scanf("%d",&n);
    
    i=n;
    while(i--)
        {
        
        scanf("%d",&j);
        scanf("%d",&k);
        scanf("%d",&l);
            a[k-1][j-1]=l;
            a[j-1][k-1]=l;
        
    }
    
    
    primMST(a,v);
    
    
    
    return 0;
}