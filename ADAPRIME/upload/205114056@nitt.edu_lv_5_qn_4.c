#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

 
 long long int What_A_Max(long long int arr[],long long  int n)
{
  long long int INC = arr[0];
 long long  int EX = 0;
 long long  int EX_new;
long long   int i;
 
  for (i = 1; i < n; i++)
  {
    
     EX_new = (INC > EX)? INC: EX;
     INC = EX + arr[i];
     EX = EX_new;
  }
   return ((INC > EX)? INC : EX);
}
int ZigZag(int n)
{
	int sum=0;
	while(n>0)
	{
		if(n%2)
		sum+=1;
		n=n/2;
	}
return sum;
}
 main()
{
	int t;	
	scanf("%d",&t);
	while(t--)
	{
		long long int i,n,arr[100001],sum=0;
		scanf("%lld",&n);
		for(i=0; i<n; i++)
		{
			scanf("%lld",&arr[i]);
			sum+=ZigZag(arr[i]);
		}
		
		printf("%lld\n",sum);
	}
}