#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

main()
{
long int a;
double b;
int c,n,i;
scanf("%d",&n);
for(i=1;i<=n;i++)
{ 
   scanf("%lf %ld",&b,&a);
   c=(2*(b+1-a));
   printf("%d",c);
 }
return 0;
}





