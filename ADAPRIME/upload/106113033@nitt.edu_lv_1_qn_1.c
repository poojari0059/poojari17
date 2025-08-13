#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

long long int t,ans,h,l;

int main()
{
scanf("%lld",&t);
while(t--)
{
  scanf("%lld %lld", &h, &l);
  if((4*h-l)%2 == 0 && l<=4*h && l>=2*h)
  ans = (4*h -l)/2;
  else
  ans = -1; 
 printf("%lld\n",ans);
}

return 0;
}