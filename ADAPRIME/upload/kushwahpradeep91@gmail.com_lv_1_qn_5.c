#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


void paint(int n, int i,long long int *c)
{
static int arr[1000];
//static int c=0;
if (n == 0)
{
	(*c)++;
}
else if(n > 0)
{
	int k; 
	for (k = 1; k <=4; k++)
	{
	arr[i]= k;
	paint(n-k, i+1,c);
	}
}
}
int main()
{
	int t;
	scanf("%d",&t);
	while(t--){
  int n;
  scanf("%d",&n);
  long long int c=0;
  paint(n,0,&c);
  printf("%lld\n",c%1000000007);
}
return 0;
}
