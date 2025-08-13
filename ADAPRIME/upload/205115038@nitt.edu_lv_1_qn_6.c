#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


struct node
{
	int s,d,c;
};
int cmp(const void *a,const void *b)
{
	
	return (((struct node*)a)->c>((struct node*)b)->c);
}
int main()
{
	int n,r,i=0,hash[10000]={0},k=0,j,cost=0;
	struct node arr[10000];
	
	scanf("%d%d",&n,&r);
	while(i!=r)
	{
		scanf("%d%d%d",&arr[i].s,&arr[i].d,&arr[i].c);
		i++;
	}
	qsort(arr,r,sizeof(struct node),cmp);
	hash[arr[j].d]=1;
	hash[arr[j].s]=1;
	k=2;
	cost+=arr[j].c;
	j=1;
	while(k!=n)
	{
		j=1;
		while(j!=n)
		{
			if(hash[arr[j].s]==1&&hash[arr[j].d]==0)
			{
				hash[arr[j].d]=1;
				k++;
				cost+=arr[j].c;
				break;
			}
			else if(hash[arr[j].s]==0&&hash[arr[j].d]==1)
			{
				hash[arr[j].s]=1;
				k++;
				cost+=arr[j].c;
				break;
			}
			j++;
		}
	}
	printf("%d\n",cost);
	return 0;
}

