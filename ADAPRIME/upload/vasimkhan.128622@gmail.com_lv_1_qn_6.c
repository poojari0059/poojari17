#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int a,b,u,v,n,r,i,j,ne=1;
int visited[101]={0},min,mincost=0,cost[101][101];
int main()
{
     scanf("%d %d",&n,&r);
    for(i=1;i<=n;i++)
       for(j=1;j<=n;j++)
        cost[i][j]=1001;
 
     int k,cos;
  for(k=1;k<=r;k++)
  {
    scanf("%d %d %d",&i,&j,&cos);
    cost[i][j]=cost[j][i]=cos;
    
  }
  visited[1]=1;
 
 while(ne<n)
 {
  for(i=1,min=1001;i<=n;i++)
   for(j=1;j<=n;j++)
    if(cost[i][j]<min)
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
  cost[a][b]=cost[b][a]=1001;
 }
 printf("%d\n",mincost);
 
 return 0;
}
/*
4 5
1 2 6
1 4 3
1 3 5
3 4 4
2 4 2
*/
