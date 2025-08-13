#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
long int h,l,t;
scanf("%d",&t);
while(t>0)
{
scanf("%d %d",&h,&l);
if(((4*h-l)%2)!=0)
printf("-1\n");
else
{
h=(4*h-l)/2;
printf("%d\n",h);
}
t--;
}
return 0;
}