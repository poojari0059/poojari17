#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

//xxxx<stdio.h>
int *sort(int a[],int n)
{
	int i,j,t;
	for (i = 1 ; i < n ; i++)                            
       {    
for (j = 0 ; j < n-i ; j++)                         
          {                                                    
              if (a[j] <= a[j+1])                              
              { 
                     
                t = a[j];                                      
                a[j] = a[j+1];                                 
                a[j+1] = t;                                    
              }                                                
              else continue ;                                     
          }                                                    
       }
       return a;
}

int minimumCostOfBreaking(int *X, int *Y, int m, int n)
{
    int res = 0;
 
  X= sort(X,m);
 
  
    Y = sort(Y,n);
       
    int hzntl = 1, vert = 1;
 
  
    int i, j = 0;
    i=0;
    while (i < m && j < n)
    {
        if (X[i] > Y[j])
        {
            res += X[i] * vert;
 
           
            hzntl++;
            i++;
        }
        else
        {
            res += Y[j] * hzntl;
 
          
            vert++;
            j++;
        }
    }
 
  
    int total = 0;
    while (i < m)
        total += X[i++];
    res += total * vert;
 
  
    total = 0;
    while (j < n)
        total += Y[j++];
    res += total * hzntl;
 
    return res;
}
int main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
	
    int m , n ;
    scanf("%d%d",&m,&n);
    int X[m-1] ;
    int Y[n-1] ;
    int i=0;
    
      while(i<m-1)
      {
      	scanf("%d",&X[i++]);
	  }
	  i=0;
      while(i<n-1)
      {
      	scanf("%d",&Y[i++]);
	  }
    printf("%d\n",minimumCostOfBreaking(X, Y, m-1, n-1));
     }
    return 0;
}