#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int main()
{
	int t;
	 long long int head,legs,hens,cow;
	int flag;
	scanf("%d",&t);
	while(t--)
	{
		scanf("%lld",&head);
		scanf("%lld",&legs);
		flag=0;
		if(legs>head &&(legs%2==0))
		{
		
		cow=(legs-(head*2))/2;
		hens=head-cow;
		if((cow*4+hens*2)==legs)
			flag=1;
	}
		if((flag==1))
			printf("%lld\n",hens);
		else
		printf("-1\n");
		
		
		
}
return 0;
}