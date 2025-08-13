#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main() {
int t,b, x;
float a[10000], i[10000];
scanf("%d", &t);
for(b=0; b<t; b++)
{
scanf("%f", &a[b]);
scanf("%f", &i[b]);
}
for(b=0; b<t; b++)
{
x=(int) 2*(a[b]+1-i[b]);

printf("%d\n", x);
}
return 0;
}