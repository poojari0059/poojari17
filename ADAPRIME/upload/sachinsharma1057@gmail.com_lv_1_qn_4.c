#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

void sorta(int arr[],int n)
{
	int i,j;
	for(i=0;i<n;++i)
	{
		int max=i;
		for(j=i+1;j<n;++j)
		{
			if(arr[max] < arr[j])
			max=j;
		}
		int temp=arr[max];
		arr[max]=arr[i];
		arr[i]=temp;
	}
}
int main()
{
	int a[101],t,b[101],i,j,m,n;
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d%d",&m,&n);
		for(i=0;i<m-1;++i)
		scanf("%d",&a[i]);
		for(i=0;i<n-1;++i)
		scanf("%d",&b[i]);
		sorta(a,m-1);
		sorta(b,n-1);
		int v=0,h=0;
		i=0;
		j=0;
		int cost=0;
		while(i < m-1 && j < n-1)
		{
			if(a[i] > b[j])
			{
				cost=cost+(h+1)*a[i];
				++v;
				++i;
			}
			else
			{
				cost=cost+(v+1)*b[j];
				++h;
				++j;
			}
		}
		while(i < m-1)
		{
			cost=cost+(h+1)*a[i];
			++h;
			++i;
		}
		while(j < n-1)
		{
			cost=cost+(v+1)*b[j];
			++v;
			++j;
		}
		printf("%d\n",cost);
	}
	return 0;
}