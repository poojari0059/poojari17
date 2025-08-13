#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
	int t;
	long long int head,legs,cow=0;
	int flag;
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d%d",&head,&legs);
		flag=0;
		if(head*2==legs)
		{
			flag=1;
			break;
		}
		else if(head*4==legs)
		{
			flag=0;
			break;
		}
		else
		{
			cow=head/4;
			while((legs-cow)>=0)
			{
				if(cow*4+(head-cow)*2==legs)
				{
				 flag=2;
				 break;
			}
			cow++;
			}
			
		}
		if(flag==1)
			printf("%lld\n",head);
		else if(flag==2)
			printf("%lld\n",(head-cow));
		else
			printf("-1\n");
	}
	return 0;
}