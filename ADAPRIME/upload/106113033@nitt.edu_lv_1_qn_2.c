#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

long long int t,b;
double a,i;
int main()
{
scanf("%lld",&t);
while(t--)
{
  scanf("%lf %lf", &a, &i);
  b = (a+1-i)*2;
 printf("%lld\n",b);
}

return 0;
}