#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

main()
{
int t,k;
long int i[20],o;
float a[20],ti;
scanf("%d",&t);
for(k=1;k<=t;k++)
{
scanf("%f%ld",&a[k],&i[k]);
}
for(k=1;k<=t;k++)
{
ti=2*(a[k]+1-i[k]);
o=(long)ti;
if(ti-floor(ti)>0.5)
printf("%ld",o+1);
else
printf("%ld",o);
t--;
}
return 0;
}
