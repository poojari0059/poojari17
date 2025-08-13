#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


unsigned int snoob(unsigned int x)
{
unsigned int rightOne,nextHigherOneBit, rightOnesPattern,next = 0;

if(x)
{

	rightOne = x & -(signed)x;

	nextHigherOneBit = x + rightOne;

	rightOnesPattern = x ^ nextHigherOneBit;
	rightOnesPattern = (rightOnesPattern)/rightOne;
	rightOnesPattern >>= 2;
	next = nextHigherOneBit | rightOnesPattern;
}

return next;
}

int main()
{
    int n,t;
    scanf("%d",&t);
    while(t--){
    scanf("%d",&n);
    
   printf("%d\n",snoob(n));
}
return 0;
}
