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
		float a;
		int s;
		scanf("%f%d",&a,&s);
	    int	r=2*(a+1-s);
	    printf("%d\n",r);	
	}
	return 0;
}