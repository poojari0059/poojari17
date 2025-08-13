#include <stdio.h>


void swap(int a,int b)
{
	int c=a;
	a=b;
	b=c;
}
int main()
{
int n,r,s,t,i,j,min;
scanf("%d%d%d%d",&n,&r,&s,&t);
int a[100][3];
for(i=0;i<r;i++)
	scanf("%d%d%d",&a[i][0],&a[i][1],&a[i][2]);
for(i=0;i<n;i++)
{
	min=a[i][2];
    int	x=i;
	for(j=i+1;j<n;++j)
	{
		if(a[j][2]<min)
		{
			min=a[j][2];
			x=j;
		}
	}
	if(x!=i)
	{
		swap(a[i][2],a[x][2]);
	}
}

int sum=0,c=0;
i=0;
while(sum<s*t)
{
	sum+=a[i][2];
	c++;
	i++;
}
printf("%d",c);
return 0;
}