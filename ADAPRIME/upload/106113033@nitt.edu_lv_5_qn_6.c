#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

long long count(long long n)
{
    if (n < 3)
        return n;
    if (n >= 3 && n < 10)
       return n-1;
    long long po = 1;
    while (n/po > 9)
        po = po*10;

    long long msd = n/po;

    if (msd != 3)
      return count(msd)*count(po - 1) + count(msd) + count(n%po);
    else
      return count(msd*po - 1);
}
int main()
{
	long long int t;
	scanf("%lld",&t);
	while(t--)
	{
		long long int a,b;
		scanf("%lld %lld",&a,&b);	
		printf("%lld\n",count(b-1)-count(a));
	
	}
	return 0;
}