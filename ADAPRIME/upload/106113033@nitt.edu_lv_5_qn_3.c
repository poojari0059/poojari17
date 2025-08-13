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
		float a,b,c,d;
		scanf("%f %f %f %f",&a,&b,&c,&d);
		float t = a+d;
		float det= a*d-b*c;
		float de = (t*t)/4 - det;
		if(de<0)
		printf("NA\n");
		else
		{
			de = sqrt(de);
			int x = t/2 + de;
			int y = t/2-de;
			printf("%d %d\n",x,y);
		}
	}
	return 0;
}