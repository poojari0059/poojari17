#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
    int t;
    float A,i,b;
    scanf("%d",&t);
    while(t--)
    {
       scanf("%f %f",&A,&i);
        b=2*(A+1-i);
        printf("%f\n",b);
    }
}
