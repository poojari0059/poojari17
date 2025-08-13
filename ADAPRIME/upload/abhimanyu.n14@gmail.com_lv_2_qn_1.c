#include <stdio.h>

int main( )
{	int i,j,n,t,arr[1000],brr[1000],asum=0,bsum=0,larg,pos,res[1000];
	scanf("%d",&t);
	while(t<1 || t>10)
	{	printf("\n Invalid number of testcases. Enter again.\n");
		scanf("%d",&t);
	}
	for(j=0;j<t;j++)
	{	scanf("%d",&n);
		while(n<0 || n>1000)
		{	printf("\n Invalid number of boxes. Enter again.\n");
			scanf("%d",&n);
		}
		for(i=0;i<n;i++)
		{	scanf("%d",&arr[i]);
			while(n<0 || n>1000)
			{	printf("\n Invalid number . Enter again.\n");
				scanf("%d",&arr[i]);
			}
		}
		for(i=0;i<n;i++)
		{	scanf("%d",&brr[i]);
			while(n<0 || n>1000)
			{	printf("\n Invalid number . Enter again.\n");
				scanf("%d",&brr[i]);
			}
		}
		while(n!= 0	)
		{	larg	= arr[0];
			pos	= 0;
			for(i=1;i<n;i++)
			{	if(arr[i]>larg)
				{	larg	= arr[i];
					pos		= i;
				}
			}
			asum+=larg;
			for(i=pos;i<n-1;i++)
			{	arr[pos]	= arr[pos+1];	}
			for(i=pos;i<n-1;i++)
			{	brr[pos]	= brr[pos+1];	}
			n--;
			if(n==0)
			break;
			larg	= brr[0];
			pos	= 0;
			for(i=1;i<n;i++)
			{	if(brr[i]>larg)
				{	larg	= brr[i];
					pos		= i;
				}
			}
			bsum+=larg;
			for(i=pos;i<n-1;i++)
			{	brr[pos]	= brr[pos+1];	}
			for(i=pos;i<n-1;i++)
			{	arr[pos]	= arr[pos+1];	}
			n--;
		}
		if(asum>bsum)
		{	res[j]	= 0;	}
		else if(bsum>asum)
		{	res[j]	= 1;	}
		else if(asum == bsum)
		{	res[j]	= 2;	}
	}
	for(j=0;j<t;j++)
	{	if(res[j]==0)
		{	printf("KOGA\n");	}
		else if(res[j]==1)
		{	printf("RYUHO\n");	}
		else if(res[j]==2)	
		{	printf("TIE\n");	}
	}	
	return 0;
}