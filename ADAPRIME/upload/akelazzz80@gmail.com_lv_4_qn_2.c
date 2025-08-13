#include <stdio.h>


int min1(int a,int b)
 {
 	if(a>b)
 	 return b;
 	return a; 
 }
 int ab1(int a)
 {
 	if(a>0)
 	 return a;
    return -a;	 
 }
int f(int arr[], int i, int s, int ts)
{
    
    if (i==0)
        return ab1((ts-s) - s);
 
 
    
    return min1(f(arr, i-1, s+arr[i-1], ts),
               f(arr, i-1, s, ts));
}
 

int findMin(int arr[], int n)
{
   
    int ts = 0,i;
    for (i=0; i<n; i++)
        ts += arr[i];
   int p=f(arr, n, 0, ts);
   
    return (ts-p)/2+p;
}
 

int main()
{
    int a[100],n,i,t ;
    scanf("%d",&t);
    while(t--)
    {
    scanf("%d",&n);
    for(i=0;i<n;i++)
    {
    	scanf("%d",&a[i]);
	}
    
    printf("%d\n", findMin(a, n));
    }
    return 0;
}