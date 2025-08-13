#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int main()
{
  int t,i;
  float a;
  scanf("%d",&t);
  while(t--)
{
scanf("%f %d",&a,&i);
float x=(a+1-i)*2;
int y=(int)x;
printf("%d\n",y);
}
return 0;
}