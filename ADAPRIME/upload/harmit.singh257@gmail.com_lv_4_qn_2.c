#include <stdio.h>

int a[1000];
main()
{
int w,n,i=0,p,q,j,k,t;
scanf("%d",&w);
while (i<w)
{
p=0;q=0;
scanf("%d",&n);
j=0;
while(j<n)
{scanf("%d",&a[j]);
j+=1;}k=n;j=1;	
while(k>1)
		{j=1;
while(j<k)
		{	if(a[j-1]<a[j])
			{
			t=a[j-1];
			a[j-1]=a[j];
			a[j]=t;
			}
j+=1;}
k-=1;
}
j=0;
while(j<n)
{
if(p<q)
	p+=a[j];
	else
	q+=a[j];
j+=1;
}
if(p>q)
printf("%d",p);
else
printf("%d",q);
i+=1;
}
return 0;
}