#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int cmp(const void * a, const void * b)
{
   return ( *(int*)b - *(int*)a );
}
int main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
		int m,n,i,j;
		scanf("%d %d", &m,&n);
		int a[m-1],b[n-1];
		for(i = 0;i<m-1;i++)
		{
			scanf("%d", &a[i]);
		}
		for(i = 0; i<n-1;i++)
		scanf("%d", &b[i]);
		qsort(a,m-1,sizeof(int), cmp);
		qsort(b,n-1, sizeof(int), cmp);
		int h=1,v=1;
		i=0;j=0;
		int ans =0;
		while(i<m-1 && j<n-1)
		{
			if(b[j]>a[i])
			{
			  ans+= b[j]*h;
			  v++;
			  j++;	
			}
			else
			{
			   ans+=a[i]*v;
			   h++;
			   i++;
			}
		}
		while(i<m-1)
		{
			ans+= a[i]*v;
			i++;
		}
		while(j<n-1)
		{
			ans+=b[j]*h;
			j++;
		}
		printf("%d\n",ans);
	}
	return 0;
}