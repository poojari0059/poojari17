#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
 	long int a,b,c,d,i,x1; double x; long int Ar[1000];

	scanf("%d\n",&a);
	
	for(i=0;i<a;i++)
	{
	scanf("%d %d",&b,&c);
	x=(4*b-c)/2.0; 
	x1=(4*b-c)/2;
		if((x1==x)&&x>0)
		Ar[i]=x1;
		else
		Ar[i]=-1;
	}

	for(i=0;i<a;i++)
	printf("%d\n",Ar[i]);
return 0;}
