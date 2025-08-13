#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
int arr[4]={1,2,4,8};
int i,j,t,n;
scanf("%d",&t);
while(t--)
{
    scanf("%d",&n);
if(n <= 4)
{
printf("%d\n",arr[n-1]);
continue;
}
for(i=5;i<=n;++i)
{
     int sum=0;
for(j=0;j<4;++j)
sum=(sum+arr[j])%1000000007;
for(j=0;j<3;++j)
{
arr[j]=arr[j+1];
}
arr[j]=sum;
}
printf("%d\n",arr[3]);
}
return 0;
}