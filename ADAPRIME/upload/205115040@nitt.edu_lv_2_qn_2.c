#include <stdio.h>

int v,i,c,u,min,V,g[100][100],e,m,h,d[100],s[100],p,q,l,r;  


int main()
{
   scanf("%d%d%d%d",&V,&r,&e,&m);
   for(i=0;i<r;i++)
   {
   	scanf("%d%d%d",&p,&q,&l);
   	g[p][q]=l;
   	g[q][p]=l;
   }
    for (i = 0; i < V; i++)
        d[i] = 101, s[i] = 0;
     
     d[0] = 0;
     for (c = 0; c < V-1; c++)
     {
     
	 	
       min =101;
  
       for (v = 0; v < V; v++)
          if (s[v] == 0 && d[v] <= min)
             min = d[v], u = v;
  


       s[u] = 1;

       for (v = 0; v < V; v++)
         if (!s[v] && g[u][v] && d[u] != 101 && d[u]+g[u][v] < d[v])
            d[v] = d[u] + g[u][v];
     }

    for (i = 1; i < V; i++)
      {
      
      	if((2*d[i])<=(e*m))
      	{
      		h++;
		}
	  }
	  printf("%d\n",h);
  
    return 0;
}