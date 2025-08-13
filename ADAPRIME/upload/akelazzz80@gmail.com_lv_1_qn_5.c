#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int count;
void count1( int m, int n )
{
	if (n == 0)
		return ;
	if(m==n)
	{
	    count=(count+1)%10000007;
	}
	if (m > n)
		return ;
		int i;
    for(i=1; i<=4; i++)
    {
        count1(m+i,n);
    }
    
}

// Driver program to test above function
int main()
{
   int t;
   scanf("%d",&t);
   while(t--)
   {
    int n;
    scanf("%d",&n);
     count1( 0, n);
         printf("%d\n",count);
         count=0;
	
	}
	return 0;
}
