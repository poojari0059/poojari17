#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int s(int x)
{
  int r,n,r1,next=0;
  if(x)
  {
    r = x & -(signed)x;
    n  = x + r;
    r1 = x ^ n ;
    r1 = (r1)/r;
    r1 >>= 2;
    next = n  | r1;
  }
  return next;
}
int main()
{
	int t,n;
	scanf("%d",&t);
  while(t--)
  {
     scanf("%d",&n);
     printf("%d\n",s(n));
   }
  return 0;
}