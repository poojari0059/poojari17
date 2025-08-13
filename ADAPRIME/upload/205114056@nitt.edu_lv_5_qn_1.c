#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

long long int max(long long int a,long long int b)
{
	return a>b?a:b;
}
long long int What_A_Max2(long long int arr[],long long  int n)
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
long long int What_A_Max(long long int arr[],long long  int n)
{
  long long int INC = arr[0];
 long long  int EX = 0;
 long long  int EX_new;
long long   int i;
 
  for (i = 1; i < n-1; i++)
  {
    
     EX_new = (INC > EX)? INC: EX;
     INC = EX + arr[i];
     EX = EX_new;
  }
   return ((INC > EX)? INC : EX);
}
long long int What_A_Max1(long long int arr[],long long  int n)
{
  long long int INC = arr[1];
 long long  int EX = 0;
 long long  int EX_new;
long long   int i;
 
  for (i = 2; i < n; i++)
  {
    
     EX_new = (INC > EX)? INC: EX;
     INC = EX + arr[i];
     EX = EX_new;
  }
   return ((INC > EX)? INC : EX);
}
 main()
{
	int t;	
	scanf("%d",&t);
	while(t--)
	{
		long long int i,n,arr[100001];
		scanf("%lld",&n);
		for(i=0; i<n; i++)
		scanf("%lld",&arr[i]);
		if(n<=4)
		printf("%lld\n",What_A_Max2(arr,n));
		else{
			
		n=max(What_A_Max(arr,n),What_A_Max1(arr,n));
		printf("%lld\n",n);
	   }
	   
	}
}