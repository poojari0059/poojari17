#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
	long long int t,i,p1,p;
	float a,a1;
	scanf("%lld",&t);
	while(t--)
	{
		scanf("%f %lld",&a,&i);
		p1=(2*i)+6;
		a1=2*(i+1);
		p=p1-(2*(a1-a));
		printf("%lld\n",p);
	}
	return 0;
}

