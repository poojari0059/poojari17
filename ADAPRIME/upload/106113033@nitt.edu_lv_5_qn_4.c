#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
   int t;
   scanf("%d",&t);
   while(t--)
   {
   	int n,i;
   	scanf("%d",&n);
   	int a[n];
   	for(i=0;i<n;i++)
   	scanf("%d",&a[i]);
   	int c=0;
   	for(i=0;i<n;i++)
   	{
   	  while(a[i])
   	  {
   		if(a[i]&1)
   		c++;
   		a[i]=a[i]>>1;
   	  }
   	}
   	printf("%d\n",c);
   }
   
   return 0;
}
