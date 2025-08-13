#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

long long a[100005],n,i,j;
long long max(long long a,long long b)
{
	if(a>b)
	return a;
	else
	return b;
}
long long maxSumCircularArray() {
        if (n==0) {
            return 0;
        }
        if (n == 1) {
            return a[0];
        }
        long long with = a[1];
        long long without = 0;
        for (i = 2; i < n; i++) {
            long long newWith = without + a[i];
            without = with;
            with = max(with, newWith);
        }

        long long with1 = a[n - 2];
        long long without1 = 0;
        for (i = n - 3; i >= 0; i--) {
            long long newWith1 = without1 + a[i];
            without1 = with1;
            with1 = max(with1, newWith1);
        }
        return max(with, with1);
    }
int main()
{
  long long t;
	scanf("%lld",&t);
	while(t--)
	{
		long long i;
		scanf("%lld",&n);
		for(i=0;i<n;i++)
		scanf("%lld",&a[i]);
        printf("%lld", maxSumCircularArray());
        if(t!=0)
        printf("\n");
    }
  return 0;
}