#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{float A;int I,t;
scanf("%d",&t);
int i;
for(i=0;i<t;i++)
{scanf("%f %d",&A,&I);
int b=2*(A+1-I);
printf("%d\n",b);}

return 0;}