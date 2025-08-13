#include <stdio.h>

A=101,a,n,M,Z[101],C[101][101],G,d[101],i,j,U,u,E,s,b,B,r,z;
 D()
{
   for (i = 1; i < n; i++)
    d[i] = A;     
     for (i = 0; i < n-1; i++)
     { 	
       G =A; 
       for (; j < n; j++)
          if (!Z[j]&& d[j] <= G)
             G = d[j], u = j;
        Z[u] = 1;
        for (j = 0; j < n; j++)
         if (!Z[j] && C[u][j] && d[u] != A && d[u]+C[u][j] < d[j])
            d[j] = d[u] + C[u][j];
     }
     

}
 P()
{
	scanf("%d",&B);
	B= B;
}
 main()
{

	n=P(),r=P(),E=P(),M=P();	
	for(; i<r; i++)
		a=P(),b=P(),z=P(),C[a][b]=C[b][a]=z;
	D();
	 for (i = 1; i < n; i++)
      	if((2*d[i])<=(E*M))
      		s++;
	  printf("%d",s);
	  return 0;
	
}