#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
	int t,i;
	scanf("%d",&t);
	for(i=0;i<t;i++)
	{
		unsigned long long hd,lg,c,h;
		scanf("%llu %llu",&hd,&lg);
		if(hd==0) 
		{
			printf("0\n");
			continue;
		}
		if(hd>lg && lg%2!=0 )
		{
			printf("-1\n");
			continue;
		}
		if(lg/4==hd)
		{
			printf("0\n");
			continue;
		}
		if(lg/2==hd)
		{
			printf("%d\n",hd);
			continue;
		}		
		int f=0;
	    c=hd/2;
	    h=hd-c;
		while(1)
		{
			if(c<0 || c>hd || h<0 || h>hd)
			break;
			if((c*4+h*2) == lg) 
			{
				printf("%llu\n",h);
				f=1;
				break;
			}
			if((c*4+h*2) > lg)
			{
				c--;h++;
			}
			else if((c*4+h*2 )< lg) 
			{
				c++;h--;
			}
		} 
		if(f==0)
		printf("-1\n");
	}
	return 0;
}