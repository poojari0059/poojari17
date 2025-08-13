#include <stdio.h>


struct A
{
 int a,b,s,I;	
};
int t,n,q,i,j;
int P()
{
	int a;
	scanf("%d",&a);
	return a;
}
void so(struct A c[])
{
	for(i=0; i<n-1; i++)
	for(j=0; j<n-i-1; j++)
	if(c[j].s<c[j+1].s)
	{
		struct A w;
		w=c[j];
		c[j]=c[j+1];
		c[j+1]=w;
	}
}
int main()
{
	struct A c[10001];	
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