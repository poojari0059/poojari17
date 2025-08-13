#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
   long long int n,i,t,j,k;

   scanf("%lld",&t);
   while(t--)
   {
       scanf("%lld%lld",&i,&j);
       if(i==0 && j==0)
      printf("0\n");
      else if(j==0)
      printf("-1\n");
      else if(i>=j || j%2==1 || i*2>j || j>4*i)
      printf("-1\n");
      else if((j-(2*i))>=0 && (j-(2*i))%2==0)
	  {
	        printf("%lld\n",i-((j-(2*i))/2));	
	  } 
      else
       printf("-1\n");
   }
   return 0;
}