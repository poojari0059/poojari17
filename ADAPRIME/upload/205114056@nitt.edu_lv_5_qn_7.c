#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int max(int a,int b)
{
	return a>b?a:b;
}
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
int maxSum(int arr[], int n)
{
	// Compute sum of all array elements
	int i,cum_sum = 0;
	for ( i=0; i<n; i++)
		cum_sum += arr[i];

	// Compute sum of i*arr[i] for initial
	// configuration.
	int curr_val = 0;
	for (i=0; i<n; i++)
		curr_val += i*arr[i];

	// Initialize result
	int res = curr_val;

	// Compute values for other iterations
	for (i=1; i<n; i++)
	{
		// Compute next value using previous value in
		// O(1) time
		int next_val = curr_val - (cum_sum - arr[i-1])
					+ arr[i-1] * (n-1);

		// Update current value
		curr_val = next_val;

		// Update result if required
		res = max(res, next_val);
	}

	return res;
}
 main()
{
	int t;	
	scanf("%d",&t);
	while(t--)
	{
		 int i,n,arr[100001],sum=0;
		scanf("%d",&n);
		for(i=0; i<n; i++)
		{
			scanf("%d",&arr[i]);
			
		}
		
		printf("%d\n",maxSum(arr,n));
	}
	return 0;
}