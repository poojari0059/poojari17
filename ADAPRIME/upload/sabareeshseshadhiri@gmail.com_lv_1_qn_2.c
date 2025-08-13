#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
int flag,test,i,min;
float area;
scanf("%d",&test);
for(i=0;i<test;i++)
{
    scanf("%f %d",&area,&flag);
    min=((area+1-flag)*2);
    printf("%d\n ",min);
}
return 0;
}
