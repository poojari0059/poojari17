#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>




int FindMaxSum(int arr[], int n,int i)
{
int incl = arr[i-1];
int excl = 0;
int excl_new;


for (; i < n; i++)
{
	excl_new = (incl > excl)? incl: excl;

	incl = excl + arr[i];
	excl = excl_new;
}
return ((incl > excl)? incl : excl);
}
int main()
{
  int t,n;
  scanf("%d",&t);
  while(t--){  
         int i,n;
         int a,b;
         scanf("%d",&n);
         int arr[n];
         for(i=0;i<n;i++)
           scanf("%d",&arr[i]);
         int max=0;
         if(n<=3){ 
           for(i=0;i<n;i++)
             if(max<arr[i])
               max=arr[i];
             printf("%d\n",max);
         }
         else{
           a=FindMaxSum(arr,n-1,1);
           b=FindMaxSum(arr,n,2);
         //printf("%d %d\n", a,b);
      printf("%d\n",(a>b)?a:b);
      }
}
return 0;
}
