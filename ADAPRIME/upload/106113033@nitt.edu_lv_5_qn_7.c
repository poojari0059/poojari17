#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
	long long int t;
	scanf("%lld",&t);
	while(t--)
	{
		long long int n,i,j;
		scanf("%lld",&n);
		long long int a[n];
		for(i=0;i<n;i++)
		scanf("%lld",&a[i]);
		for(i=0;i<n-1;i++)
			for(j=0;j<n-i-1;j++)
				if(a[j]>a[j+1])
				{
					int temp=a[j];
					a[j]= a[j+1];
					a[j+1] = temp;
				}
		long long int s=0;
		for(i=0;i<n;i++)
		s+=a[i]*i;
		printf("%lld\n",s);
		
	}
	return 0;
	
}