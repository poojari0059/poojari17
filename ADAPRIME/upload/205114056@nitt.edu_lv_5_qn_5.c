#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

void solve(int n)
{
    	int temp,ones;
		int temp2;
		int bit=0,bit2=0;
		temp=n;
		temp2=n;
		while(temp%2!=1)
		{
			temp/=2;
			bit++;
		}
		bit2=bit;
		while(temp%2!=0)
		{
			temp2-=1<<bit2;
			temp/=2;
			bit2++;
		}
		temp2+=(1<<bit2);
		ones=bit2-bit-1;
		int ex=(1<<ones)-1;
		temp2+=ex;
		printf("%d\n",temp2);
}
 int main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
	  int X1;
	  scanf("%d",&X1);	  
	  solve(X1);
    }
    return 0;
}