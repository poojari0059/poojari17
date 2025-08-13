#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int countWaysUtil(int n, int m)
{
	long int res[n];
	res[0] = 1; res[1] = 1;
	int i;
	for ( i=2; i<n; i++)
	{
	res[i] = 0;
	int j;
	for ( j=1; j<=m && j<=i; j++)
		res[i] += res[i-j];
	}
	return res[n-1]%1000000007;
}
int countWays(int s, int m)
{
	return countWaysUtil(s+1, m);
}
int main ()
{
    int t;
    scanf("%d",&t);
    while(t--)
    {
	int s;
	scanf("%d",&s);

	int  m = 4;
	printf("%ld\n", countWays(s, m));
    }
	return 0;
}