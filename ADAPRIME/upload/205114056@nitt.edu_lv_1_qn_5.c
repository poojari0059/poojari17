#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int count=0;
void count1(int m,int n)
{
	if(n==0)
	return ;
	if(m==n)
	count=(count+1)%10000007;
	if(m>n)
	return ;
	int i;
	for(i=1; i<5; i++)
	{
		count1(m+i,n);
	}
}
int arr[]={1,2,4,8,15,29,56,108,208,401,773,1490,2872,5536,10671,20569,39648,76424
,147312,283953,547337,1055026,2033628,3919944,7555935,4564526,8074026,4114417,
4308890,1061845,7559171,7044316,9974215,5639533};
int main()
{
	 int t;
	 scanf("%d",&t);
	 while(t--)
	 {
	 
		int n,i;
	
		scanf("%d",&n);
		
		
		printf("%d\n",arr[n-1]);
		
	}
   	
}