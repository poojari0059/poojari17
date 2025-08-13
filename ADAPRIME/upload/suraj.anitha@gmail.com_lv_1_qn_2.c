#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main ()
{

int t;
double a;
unsigned long int i,b;

scanf("%d",&t);

while (t>0)
{

scanf("%lf",&a);
scanf("%ld",&i);

b=(a+1-i)*2;

printf("%ld",b);
printf("\n");

t--;


}

return 0;

}