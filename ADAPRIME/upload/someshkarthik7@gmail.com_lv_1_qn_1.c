#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main( )
{	int t,i;
	scanf("%d",&t);
	while(t<1 || t>1000)
	{	printf("\n Invalid number of testcases.Enter again.\n");
		scanf("%d",&t);
	}
	unsigned long long h,l,n;
	float x;
	int arr[t],s=0;
	for(i=0;i<t;i++)
	{	scanf("%d%d",&h,&l);
		while( (h<1 || h>1000000000000000000ULL) || (l<1 || l>1000000000000000000ULL) )
		{	printf("\n Invalid number of heads or legs.Enter again.\n");
			scanf("%d%d",&h,&l);
		}
		x	= (float) ((4*h)-l)/2;
		if(x-(int)x == 0)
		{	n	= x;	}
		else
		{	n	= -1;	}
		arr[s++]	= n;	
	}	
	for(i=0;i<t;i++)
	printf("\n%d",arr[i]);
	return 0;
}