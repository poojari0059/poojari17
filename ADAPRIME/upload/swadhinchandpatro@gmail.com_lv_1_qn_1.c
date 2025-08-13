#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main(void) {
int t;
long long int H,L,x;
scanf("%d",&t);
  while(t--)
  {
      scanf("%lld %lld",&H,&L);
      if(L<2*H || 4*H<L)
printf("%d\n",-1);
else if((4*H-L)%2==0)
{x=(4*H-L)/2;printf("%lld\n",x);}
      
  }
  return 0;
}