#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

static int numbers[] = {-1,0,0,1,0,2,3,4,0,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46};
void ans(int arr[], int n)
{
	int val = numbers[arr[0]];
	int i=0;
	for(i=1;i<n;i++)
	{
		val^=numbers[arr[i]];
	}
	if(val)
	printf("CAPTAIN AMERICA");
	else
	printf("IRONMAN");
}
int main()
{
int t;
scanf("%d",&t);
while(t--)
{
int n;
scanf("%d",&n);
int arr[n];
int i=0;
for(i=0;i<n;i++)
{
	scanf("%d",&arr[i]);
}
ans(arr,n);
printf("\n");	
}	
}