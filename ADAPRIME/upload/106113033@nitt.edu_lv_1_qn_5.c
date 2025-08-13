#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

long long int t,i,mod =1000000007,j;
double n;
long long int a[102];
int main()
{
scanf("%lld",&t);
 a[1] = 1;
a[2] = 2;
a[3] = 4;
a[4] = 8;
for(i = 5;i<102;i++)
{
	for(j = 1;j<=4;j++)
	{
		a[i] = (a[i]+a[i-j])%mod;
	}
}
while(t--)
{
  scanf("%lf", &n);
  long long int p = n;
  if(n!=p)
  printf("0");
  else
  printf("%lld",a[p]%mod);
  if(t!=0)
  printf("\n");
}

return 0;
}