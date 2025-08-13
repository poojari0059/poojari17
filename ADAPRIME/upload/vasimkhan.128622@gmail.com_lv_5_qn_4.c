#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


unsigned long long int count(unsigned int n)
{
  unsigned long long int count = 0;
  while(n)
  {
    count += n & 1;
    n >>= 1;
  }
  return count;
}
 
/* Program to test function countSetBits */
int main()
{
    int t,n,i;
    scanf("%d",&t);
    while(t--){
    scanf("%d",&n);
    long long int ans=0;
    while(n--)
    {
              scanf("%d",&i);
              ans+=count(i); 
    }
    printf("%lld\n",ans);
    }
  
    return 0;
}
