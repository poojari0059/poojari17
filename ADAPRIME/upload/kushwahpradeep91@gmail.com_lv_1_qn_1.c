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
	     unsigned long long int H,L,T1;
	     scanf("%llu%llu",&H,&L);
	     T1=(H*4-L);
	     if(L/4>H||L<2*H)
	     {
	     	printf("-1\n");
		 }
		 else
		 if(L==0&&H==0)
		 printf("0\n");
		 else if(T1%2==0)
		 printf("%llu\n",T1/2);
		 else
		 printf("-1\n");
	}
	return 0;
}