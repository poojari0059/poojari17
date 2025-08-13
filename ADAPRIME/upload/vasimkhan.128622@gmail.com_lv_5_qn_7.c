#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>



int maxSum(int arr[], int n)
{
    int arrSum = 0;  
    int currVal = 0; 
    int i,j; 
    for ( i=0; i<n; i++)
    {
        arrSum = arrSum + arr[i];
        currVal = currVal+(i*arr[i]);
    }
 
    int maxVal = currVal;
 
    for ( j=1; j<n; j++)
    {
        currVal = currVal + arrSum-n*arr[n-j];
        if (currVal > maxVal)
            maxVal = currVal;
    }
   return maxVal;
}
 int main(void)
{
    int t;
    scanf("%d",&t);
    while(t--)
    {
      int i,n;
      scanf("%d",&n);
      int arr[n];
      for(i=0;i<n;i++)
        scanf("%d",&arr[i]);
       printf("%d\n",maxSum(arr, n));
    }
   
    return 0;
}
