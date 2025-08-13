#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>



int graph[100][100] ,INT_MAX=100000000;
int hash[100],jk=0,flag=0,distance,V=98; 
int minDistance(int dist[], int sptSet[])
{
    int min = INT_MAX, min_index;
     int v;
    for ( v = 1; v <=V; v++)
        if (sptSet[v] == 0 && dist[v] <= min)
            min = dist[v], min_index = v;
 
    return min_index;
}
void printPath(int parent[], int j)
{
   
    if (parent[j]==-1)
        return;
    
    printPath(parent, parent[j]);
    hash[jk]=j;
    jk++;
  
}
 
int printSolution(int dist[], int n, int parent[],int desti)
{
    int src = 0,i;
  
        if(dist[desti]==INT_MAX)
         flag=1;
        else 
        {
		 distance=distance+dist[desti];
         printPath(parent, desti);
        }
    
}
 
void dijkstra( int src,int desti)
{
    int dist[V]; 
	int sptSet[V];
 
    int parent[V],i,count;
 
    for (i = 1; i <=V; i++)
    {
        parent[0] = -1;
        dist[i] = INT_MAX;
        sptSet[i] = 0;
    }
 
    dist[src] = 0;
 
    for ( count = 1; count < V; count++)
    {
        int u = minDistance(dist, sptSet),v;
 
        sptSet[u] = 1;
 
        for (v = 1; v <= V; v++)
 
            if (!sptSet[v] && graph[u][v] &&
                dist[u] + graph[u][v] < dist[v])
            {
                parent[v]  = u;
                dist[v] = dist[u] + graph[u][v];
            }  
    }
 
    printSolution(dist, V, parent,desti);
}
 
int main()
{
    int i,j,t,p,q,r,desti,n,z=66;
    scanf("%d",&t);
    while(t--)
    {
    	
    	distance=0;
    	flag=0;
    	jk=0;
       scanf("%d%d",&desti,&n);
       if(desti==0)
        desti=1;
       V=66;
       for(i=0;i<V;i++)
       {
       	  hash[i]=0;
       	for(j=0;j<V;j++)
       	{
       		
       		graph[i][j]=0;
		   }
	   }
	   z=0;
	   for(i=0;i<n;i++)
	   {
	   	scanf("%d%d%d",&p,&q,&r);
	   	 if(z<p)
	   	  z=p;
	   	 if(z<q)
		  z=q; 
	   	graph[p][q]=r;
	 	graph[q][p]=r;
	   }	
	   V=66;
	   
	 /*   if(n==1||z==1)
       {
       		printf("Not possible\n");
       		continue;
	   }*/
      dijkstra(1,desti);
    
      for(i=0;i<jk;i++)
      {
     
    	 graph[hash[i]][hash[i+1]]=0;
    graph[hash[i+1]][hash[i]]=0;
	  }
	  
	jk=0;
	dijkstra(1,desti);
	if(flag==1)
	{
		printf("Not possible\n");
	}
	else
	{
	int d,d1,d2,p1;
		distance=distance+30;
		if(distance<=49560)
		{
		
		
		d=distance/3600;
		d1=distance%3600;
        p1=d1/60;
		d2=d1%60;
	       
		if(d2>0)
		{
			p1++;
			d2=60-d2;
		}
		if(p1>59)
		{
			d++;
			p1=59;
		}
		else
		{
			p1=59-p1;
		}
		
			d=14-d;
		
		printf("%d:%d:%d\n",d,p1,d2);
	    }
	    else
	    {
		printf("Not possible\n");
	   }
	}
	
    }
    return 0;
}