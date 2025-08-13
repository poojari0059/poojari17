#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
   int t,i;
   scanf("%d",&t);
   while(t--)
   {
   	float x[3],y[3];
   	for(i=0;i<3;i++)
   	{
   		scanf("%f %f",&x[i],&y[i]);
   	}
   	int a = (x[0]*(y[1]-y[2]) + x[1]*(y[2]-y[0])+ x[2]*(y[0]-y[1]));
   	if(!a)
   	{
   		printf("NA\n");
   	}
   	else
    {
    	float a= sqrt((x[2]-x[1])*(x[2]-x[1]) + (y[2]-y[1])*(y[2]-y[1]));
    	float b= sqrt((x[2]-x[0])*(x[2]-x[0]) + (y[2]-y[0])*(y[2]-y[0]));
    	float c= sqrt((x[0]-x[1])*(x[0]-x[1]) + (y[0]-y[1])*(y[0]-y[1]));
    	int ax = ((a*x[0] + b*x[1]+c*x[2])/(a+b+c));
    	int ay = ((a*y[0] + b*y[1]+c*y[2])/(a+b+c));
    	printf("%d %d\n",ax,ay);
    }
   }
   return 0;
}