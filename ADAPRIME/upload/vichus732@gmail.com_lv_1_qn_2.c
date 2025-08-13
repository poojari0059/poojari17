#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int main()
{

int t;
scanf("%d",&t);
while(t--)
{
double area,interior;
scanf("%lf%lf",&area,&interior);
interior--;
area -= interior;
area *= 2;
printf("%.0lf\n",area);
}

}
