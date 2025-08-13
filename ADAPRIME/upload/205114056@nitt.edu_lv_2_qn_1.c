#include <stdio.h>

struct A
{
 int a,b,s,I;	
};
struct A w,c[10001];
int t,n,q,i,j,a;
P()
{
	scanf("%d",&a);
	return a;
}

 main()
{
		
	t=P();
	while(t--)
	{		n=P();
	
	for(i=0; i<n; i++)
	c[i].a=P();
	for(i=0; i<n; i++)
	{
		c[i].b=P();
		c[i].I=i;
		c[i].s=c[i].a+c[i].b;
	}	
    for(i=0; i<n-1; i++)
	for(j=0; j<n-i-1; j++)
	if(c[j].s<c[j+1].s)
	{
		w=c[j];
		c[j]=c[j+1];
		c[j+1]=w;
	}
    q=0;
    for(i=0; i<n; i++)
    {
    	if(i&1)
    	q=q-c[i].b;
    	else
    	q=q+c[i].a;
	}
	if(q>0)
	puts("KOGA");
	else if(q<0)
	puts("RYUHO");
	else
	puts("TIE");
}
}