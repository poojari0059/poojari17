#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main(void) {int t,i,c;float a,b;scanf("%d",&t);
  while(t--)
  {scanf("%f %d",&a,&i);b=2*(a+1-i);c=(int)b;printf("%d\n",c);
  }
  return 0;}