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
   long long int i;
  double a;
scanf("%lf%ld",&a,&i);
long result=(2*a-2*i+2);
printf("%d\n",result);
}
return 0;
}