#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

void sort(int arr[],int n)
{
	int i,j,tmp;
	for(i=0;i<n-1;i++)
	{
		for(j=i+1;j<n;j++)
		{
			if(arr[i]>arr[j])
			{
				tmp=arr[i];
				arr[i]=arr[j];
				arr[j]=tmp;
			}
		}
	}
}
int main()
{
int i,r,c,total=0;
scanf("%d %d",&r,&c);
int s[c],d[c],co[c];
for(i=0;i<c;i++)
{
	scanf("%d %d %d",&s[i],&s[i],&co[i]);
}
sort(s,c);
sort(d,c);
sort(co,c);
//for(i=0;i<c;i++)
//printf("%d ",co[i]);
for(i=0;i<r-1;i++)
{
	total=total+co[i];
}
printf("%d\n",total);
return 0;	
}