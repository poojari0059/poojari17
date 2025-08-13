#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
	int t,a,b,i;
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d%d",&a,&b);
		int count=0;
		for(i=a+1;i<b;i++)
		{
			int temp=i,flag=0;
			while(temp>0)
			{
				int rem=temp%10;
				if(rem==3)
				{
					flag=1;
					break;
				}
				temp=temp/10;
			}
			if(flag==0)
			{
				count++;
			}
		}
		printf("%d\n",count);
	}
return 0;
}