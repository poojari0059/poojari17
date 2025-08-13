#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int c(int n)
{
    int count = 0;
    while (n)
    {
      n &= (n-1) ;
      count++;
    }
    return count;
}
 
int p,n,t,i,sum;
int main()
{
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d",&n);
		sum=0;
		for(i=0;i<n;i++)
		{
			scanf("%d",&p);
			sum=sum+c(p);
		}
		printf("%d\n",sum);
	}
    return 0;
}