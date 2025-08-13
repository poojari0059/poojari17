#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
int i,t;
scanf("%d",&t);
for(i=0;i<t;i++)
{
if(i!=0)
printf("\n");
long long int a,b;
scanf("%lld %lld",&a,&b);
long long int x=2*a-(b/2);
if((x<0) || (x>a) ||  (b%2!=0))
printf("-1");
else
printf("%lld",x);
}
return 0;
}
